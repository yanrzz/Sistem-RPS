<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Kurikulum;

class Matakuliah extends Model
{
    
    protected $fillable = ['angkatan_id', 'semester_id', 'jenis_mk', 'kode_mk', 'nama_mk', 'sks', 'link_rps'];

    public function angkatan(){
        return $this->belongsTo(Angkatan::class);
    }

    public function semester(){
        return $this->belongsTo(Semester::class);
    }
}