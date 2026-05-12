@extends('layout.app')

@section('content')
<form action="/prodi" method="POST">
@csrf

<input type="text" name="nama_prodi" placeholder="Nama Prodi">
<button type="submit" class="btn btn-success">Simpan</button>

</form>
@endsection