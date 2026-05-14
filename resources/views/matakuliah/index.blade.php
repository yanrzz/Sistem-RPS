@extends('layout.app')

@section('content')
<div class="top-action-bar">
    <div class="search-bar-wrapper">
        <form action="/matakuliah" method="GET">
            <span class="search-icon"><i class="fas fa-search"></i></span>
            <input type="text" name="search" placeholder="Cari kode, nama, prodi, semester..." value="{{ $search ?? '' }}" autocomplete="off">
            <button type="submit">Cari</button>
        </form>
        @if($search)
            <a href="/matakuliah" class="btn-clear-search"><i class="fas fa-times"></i> Reset</a>
        @endif
    </div>
    <a href="/matakuliah/create" class="btn btn-primary">+ Tambah Mata Kuliah</a>
</div>

@if($search)
    <div class="search-result-info">
        Menampilkan <strong>{{ $data->count() }}</strong> hasil untuk "<strong>{{ $search }}</strong>"
    </div>
@endif

<style>
    .tabs {
        display: flex;
        flex-wrap: wrap;
        border-bottom: 2px solid #e0e0e0;
        margin-bottom: 20px;
        margin-top: 20px;
    }
    .tab-button {
        background-color: #f8f9fa;
        border: 1px solid #e0e0e0;
        border-bottom: none;
        padding: 10px 20px;
        cursor: pointer;
        font-weight: bold;
        color: #555;
        margin-right: 5px;
        border-radius: 4px 4px 0 0;
        transition: all 0.3s;
        text-decoration: none;
        display: inline-block;
    }
    .tab-button:hover {
        background-color: #e9ecef;
        text-decoration: none;
        color: #333;
    }
    .tab-button.active {
        background-color: #fff;
        color: #004a8c;
        border-top: 3px solid #f2a900;
        border-bottom: 2px solid #fff;
        margin-bottom: -2px;
    }
    .pagination-wrapper {
        margin-top: 20px;
    }
</style>

<div class="tabs">
    @foreach($kurikulums as $kurik)
        @php
            $prodi_name = strtoupper($kurik->prodi->nama_prodi ?? 'PRODI');
            $words = explode(' ', $prodi_name);
            $singkatan = '';
            if (count($words) > 1) {
                foreach ($words as $w) {
                    if (strtolower($w) != 'dan') {
                        $singkatan .= substr($w, 0, 1);
                    }
                }
            } else {
                $singkatan = substr($prodi_name, 0, 3);
            }
        @endphp
        <a href="?kurikulum={{ $kurik->id }}" class="tab-button {{ (!$search && $kurikulum_id == $kurik->id) ? 'active' : '' }}">
            {{ $singkatan }} - Kurikulum {{ $kurik->nama_kurikulum }}
        </a>
    @endforeach
</div>

@if($data->count() > 0)
<table border="1">
<tr>
    <th>Prodi / Kurikulum / Angkatan</th>
    <th>Kode</th>
    <th>Nama</th>
    <th>SKS</th>
    <th>Semester</th>
    <th>Link</th>
    <th>Aksi</th>
</tr>

@foreach($data as $d)
<tr>
    <td>
        {{ $d->angkatan->kurikulum->prodi->nama_prodi ?? '-' }} <br>
        <small>{{ $d->angkatan->kurikulum->nama_kurikulum ?? '-' }} ({{ $d->angkatan->tahun_angkatan ?? '-' }})</small>
    </td>
    <td>{{ $d->kode_mk }}</td>
    <td>{{ $d->nama_mk }}</td>
    <td>{{ $d->sks }}</td>
    <td>{{ $d->semester->nama_semester ?? '-' }}</td>
    <td>
        @if($d->link_rps)
        <a href="{{ $d->link_rps }}" target="_blank" title="Buka Link">
            <i class="fas fa-link"></i>
        </a>
        @endif
    </td>
    <td>
        <a href="/matakuliah/{{ $d->id }}/edit" class="btn btn-warning">Edit</a>

        <form action="/matakuliah/{{ $d->id }}" method="POST" style="display:inline;">
            @csrf @method('DELETE')
            <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
        </form>
    </td>
</tr>
@endforeach
</table>

<div class="pagination-wrapper">
    {{ $data->links() }}
</div>
@else
<div class="no-results">
    <div class="no-results-icon">🔍</div>
    <p>Tidak ada data ditemukan</p>
    @if($search)
        <p class="no-results-hint">Coba ubah kata kunci pencarian Anda</p>
    @endif
</div>
@endif
@endsection