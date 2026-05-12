@extends('layout.app')

@section('content')
<form action="/prodi/{{ $data->id }}" method="POST">
@csrf @method('PUT')

<input type="text" name="nama_prodi" value="{{ $data->nama_prodi }}">
<button type="submit" class="btn btn-success">Update</button>

</form>
@endsection