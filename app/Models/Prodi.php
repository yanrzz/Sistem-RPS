<?php

namespace App\Models;
use App\Models\Kurikulum;

use Illuminate\Database\Eloquent\Model;

class Prodi extends Model
{
    protected $fillable = ['nama_prodi'];
    
    public function kurikulum(){
    return $this->hasMany(Kurikulum::class);
    }
}