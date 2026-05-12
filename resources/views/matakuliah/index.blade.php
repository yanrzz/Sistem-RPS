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