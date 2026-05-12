@extends('layout.app')

@section('content')
<h3>Edit Kurikulum</h3>

<form action="/kurikulum/{{ $data->id }}" method="POST">
@csrf @method('PUT')

<label>Prodi</label>
<select name="prodi_id">
@foreach($prodi as $p)
<option value="{{ $p->id }}" {{ $data->prodi_id == $p->id ? 'selected' : '' }}>
    {{ $p->nama_prodi }}
</option>
@endforeach
</select>
<br><br>

<label>Nama Kurikulum</label>
<input type="text" name="nama_kurikulum" value="{{ $data->nama_kurikulum }}">
<br><br>

<label>Tahun</label>
<input type="number" name="tahun" value="{{ $data->tahun }}">
<br><br>

<label>Status</label>
<select name="status">
    <option value="aktif" {{ $data->status == 'aktif' ? 'selected' : '' }}>Aktif</option>
    <option value="nonaktif" {{ $data->status == 'nonaktif' ? 'selected' : '' }}>Nonaktif</option>
</select>
<br><br>

<button type="submit" class="btn btn-success">Update</button>

</form>
@endsection