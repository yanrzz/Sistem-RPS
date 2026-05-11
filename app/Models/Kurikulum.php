<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kurikulum extends Model
{ 
   
   protected $fillable = [
    'prodi_id',
    'nama_kurikulum',
    'tahun',
    'status'
];


    public function prodi(){
    return $this->belongsTo(Prodi::class);
}

public function angkatan(){
    return $this->hasMany(Angkatan::class);
}
}