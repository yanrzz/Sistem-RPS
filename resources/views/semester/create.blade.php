@extends('layout.app')

@section('content')

<h2>Tambah Semester</h2>

<form action="/semester" method="POST">
    @csrf
    <label>Nama Semester:</label><br>
    <input type="text" name="nama_semester" required>
    <br><br>
    <button type="submit">Simpan</button>
</form>

@endsection
