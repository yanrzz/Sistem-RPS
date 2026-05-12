@extends('layout.app')

@section('content')
<h3>Tambah Angkatan</h3>

<form action="/angkatan" method="POST">
@csrf

<label>Pilih Kurikulum</label>
<br>
<select name="kurikulum_id" required>
    <option value="">-- Pilih Kurikulum --</option>
    @foreach($kurikulum as $k)
        <option value="{{ $k->id }}">
            {{ $k->nama_kurikulum }} - {{ $k->tahun }}
        </option>
    @endforeach
</select>

<br><br>

<label>Tahun Angkatan</label>
<br>
<input type="number" name="tahun_angkatan" placeholder="Contoh: 2024" required>

<br><br>

<button type="submit" class="btn btn-success">Simpan</button>

</form>
@endsection