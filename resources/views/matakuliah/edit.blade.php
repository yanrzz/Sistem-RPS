@extends('layout.app')

@section('content')
<form action="/matakuliah/{{ $data->id }}" method="POST" enctype="multipart/form-data">
@csrf @method('PUT')

<div style="margin-top: 15px;">
    <label>Pilih Angkatan</label>
    <select name="angkatan_id" required>
    @foreach($angkatan as $a)
    <option value="{{ $a->id }}" {{ $data->angkatan_id == $a->id ? 'selected' : '' }}>
        {{ $a->kurikulum->prodi->nama_prodi ?? 'Prodi ?' }} - {{ $a->kurikulum->nama_kurikulum ?? 'Kurikulum ?' }} - Angkatan {{ $a->tahun_angkatan }}
    </option>
    @endforeach
    </select>
</div>

<div style="margin-top: 15px;">
    <label>Pilih Semester</label>
    <select name="semester_id" required>
    @foreach($semesters as $s)
    <option value="{{ $s->id }}" {{ $data->semester_id == $s->id ? 'selected' : '' }}>
        {{ $s->nama_semester }}
    </option>
    @endforeach
    </select>
</div>

<div style="margin-top: 15px;">
    <label>Jenis Mata Kuliah</label>
    <select name="jenis_mk" required>
        <option value="wajib" {{ $data->jenis_mk == 'wajib' ? 'selected' : '' }}>Wajib</option>
        <option value="peminatan" {{ $data->jenis_mk == 'peminatan' ? 'selected' : '' }}>Wajib Peminatan</option>
    </select>
</div>

<div style="margin-top: 15px;">
    <label>Kode MK</label><br>
    <input type="text" name="kode_mk" value="{{ $data->kode_mk }}" required>
</div>
<div style="margin-top: 15px;">
    <label>Nama MK</label><br>
    <input type="text" name="nama_mk" value="{{ $data->nama_mk }}" required>
</div>

<div style="margin-top: 15px;">
    <label>SKS</label><br>
    <input type="number" name="sks" value="{{ $data->sks }}" required>
</div>

<div style="margin-top: 15px;">
    <label>Link RPS</label><br>
    <input type="text" name="link_rps" value="{{ $data->link_rps }}" placeholder="https://drive.google.com/..." style="width: 100%; max-width: 400px;">
</div>

<br><br>
<button type="submit" class="btn btn-success">Update</button>

</form>
@endsection