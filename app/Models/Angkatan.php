<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Angkatan extends Model
{
  
protected $fillable = [
    'kurikulum_id',
    'tahun_angkatan'
];
public function kurikulum(){
    return $this->belongsTo(Kurikulum::class);
}

public function matakuliah(){
    return $this->hasMany(Matakuliah::class);
}
}