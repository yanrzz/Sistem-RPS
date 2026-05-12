@extends('layout.app')

@section('content')

<h2>Data Semester</h2>

<div class="top-action-bar">
    <div class="search-bar-wrapper">
        <form action="/semester" method="GET">
            <span class="search-icon"><i class="fas fa-search"></i></span>
            <input type="text" name="search" placeholder="Cari semester..." value="{{ $search ?? '' }}" autocomplete="off">
            <button type="submit">Cari</button>
        </form>
        @if($search)
            <a href="/semester" class="btn-clear-search"><i class="fas fa-times"></i> Reset</a>
        @endif
    </div>
    <a href="/semester/create" class="btn btn-primary">Tambah Data</a>
</div>

@if($search)
    <div class="search-result-info">
        Menampilkan <strong>{{ $data->count() }}</strong> hasil untuk "<strong>{{ $search }}</strong>"
    </div>
@endif

@if($data->count() > 0)
<table border="1" cellpadding="10">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Semester</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($data as $i => $d)
        <tr>
            <td>{{ $i+1 }}</td>
            <td>{{ $d->nama_semester }}</td>
            <td>
                <a href="/semester/{{ $d->id }}/edit" class="btn btn-warning">Edit</a>
                <form action="/semester/{{ $d->id }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
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
