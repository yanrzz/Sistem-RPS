@extends('layout.app')

@section('content')
<div class="top-action-bar">
    <div class="search-bar-wrapper">
        <form action="/angkatan" method="GET">
            <span class="search-icon"><i class="fas fa-search"></i></span>
            <input type="text" name="search" placeholder="Cari angkatan, kurikulum..." value="{{ $search ?? '' }}" autocomplete="off">
            <button type="submit">Cari</button>
        </form>
        @if($search)
            <a href="/angkatan" class="btn-clear-search"><i class="fas fa-times"></i> Reset</a>
        @endif
    </div>
    <a href="/angkatan/create">+ Tambah Angkatan</a>
</div>

@if($search)
    <div class="search-result-info">
        Menampilkan <strong>{{ $data->count() }}</strong> hasil untuk "<strong>{{ $search }}</strong>"
    </div>
@endif

@if($data->count() > 0)
<table border="1">
<tr>
    <th>Kurikulum</th>
    <th>Tahun</th>
    <th>Aksi</th>
</tr>

@foreach($data as $d)
<tr>
    <td>{{ $d->kurikulum->nama_kurikulum }}</td>
    <td>{{ $d->tahun_angkatan }}</td>
    <td>
        <a href="/angkatan/{{ $d->id }}/edit">Edit</a>

        <form action="/angkatan/{{ $d->id }}" method="POST" style="display:inline;">
            @csrf @method('DELETE')
            <button type="submit">Hapus</button>
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