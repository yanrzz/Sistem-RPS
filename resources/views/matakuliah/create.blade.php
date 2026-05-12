@extends('layout.app')

@section('content')
<h3>Tambah Mata Kuliah</h3>

<form action="/matakuliah" method="POST">
@csrf

<label>Pilih Angkatan</label>
<br>
<select name="angkatan_id" required>
    <option value="">-- Pilih Angkatan --</option>
    @foreach($angkatan as $a)
        <option value="{{ $a->id }}">
            {{ $a->kurikulum->prodi->nama_prodi ?? 'Prodi ?' }} - {{ $a->kurikulum->nama_kurikulum ?? 'Kurikulum ?' }} - Angkatan {{ $a->tahun_angkatan }}
        </option>
    @endforeach
</select>

<br><br>

<label>Pilih Semester</label>
<br>
<select name="semester_id" required>
    <option value="">-- Pilih Semester --</option>
    @foreach($semesters as $s)
        <option value="{{ $s->id }}">
            {{ $s->nama_semester }}
        </option>
    @endforeach
</select>

<br><br>

<label>Jenis Mata Kuliah</label>
<br>
<select name="jenis_mk" required>
    <option value="wajib">Wajib</option>
    <option value="peminatan">Wajib Peminatan</option>
</select>

<br><br>

<label>Kode MK</label>
<br>
<input type="text" name="kode_mk" required>

<br><br>

<label>Nama MK</label>
<br>
<input type="text" name="nama_mk" required>

<br><br>

<label>SKS</label>
<br>
<input type="number" name="sks" required>

<br><br>

<label>Link RPS</label>
<br>
<input type="text" name="link_rps" placeholder="https://drive.google.com/...">

<br><br>

<button type="submit" class="btn btn-success">Simpan</button>

</form>
@endsection