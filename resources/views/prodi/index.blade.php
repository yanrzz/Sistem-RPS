@extends('layout.app')

@section('content')
<div class="top-action-bar">
    <div class="search-bar-wrapper">
        <form action="/prodi" method="GET">
            <span class="search-icon"><i class="fas fa-search"></i></span>
            <input type="text" name="search" placeholder="Cari nama prodi..." value="{{ $search ?? '' }}" autocomplete="off">
            <button type="submit">Cari</button>
        </form>
        @if($search)
            <a href="/prodi" class="btn-clear-search"><i class="fas fa-times"></i> Reset</a>
        @endif
    </div>
    <a href="/prodi/create" class="btn btn-primary">+ Tambah Prodi</a>
</div>

@if($search)
    <div class="search-result-info">
        Menampilkan <strong>{{ $data->count() }}</strong> hasil untuk "<strong>{{ $search }}</strong>"
    </div>
@endif

@if($data->count() > 0)
<table border="1">
<tr>
    <th>Nama Prodi</th>
    <th>Aksi</th>
</tr>

@foreach($data as $d)
<tr>
    <td>{{ $d->nama_prodi }}</td>
    <td>
        <a href="/prodi/{{ $d->id }}/edit" class="btn btn-warning">Edit</a>
        <form action="/prodi/{{ $d->id }}" method="POST" style="display:inline;">
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