@extends('layout.app')

@section('content')
<form action="/angkatan/{{ $data->id }}" method="POST">
@csrf @method('PUT')

<select name="kurikulum_id">
@foreach($kurikulum as $k)
<option value="{{ $k->id }}" {{ $data->kurikulum_id == $k->id ? 'selected' : '' }}>
    {{ $k->nama_kurikulum }}
</option>
@endforeach
</select>

<input type="number" name="tahun_angkatan" value="{{ $data->tahun_angkatan }}">

<button type="submit">Update</button>

</form>
@endsection