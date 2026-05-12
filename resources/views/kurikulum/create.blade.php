@extends('layout.app')

@section('content')
<h3>Tambah Kurikulum</h3>

<form action="/kurikulum" method="POST">
@csrf

<label>Prodi</label>
<select name="prodi_id" required>
    @foreach($prodi as $p)
        <option value="{{ $p->id }}">{{ $p->nama_prodi }}</option>
    @endforeach
</select>

<br><br>

<label>Nama Kurikulum</label>
<input type="text" name="nama_kurikulum" required>

<br><br>

<label>Tahun</label>
<input type="number" name="tahun" required>

<br><br>

<label>Status</label>
<select name="status">
    <option value="aktif">Aktif</option>
    <option value="nonaktif">Nonaktif</option>
</select>

<br><br>

<button type="submit" class="btn btn-success">Simpan</button>

</form>
@endsection