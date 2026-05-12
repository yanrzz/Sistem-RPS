@extends('layout.app')

@section('content')

<h2>Edit Semester</h2>

<form action="/semester/{{ $data->id }}" method="POST">
    @csrf
    @method('PUT')
    <label>Nama Semester:</label><br>
    <input type="text" name="nama_semester" value="{{ $data->nama_semester }}" required>
    <br><br>
    <button type="submit" class="btn btn-success">Update</button>
</form>

@endsection
