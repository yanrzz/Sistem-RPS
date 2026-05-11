<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Semester extends Model
{
    protected $fillable = ['nama_semester'];

    public function matakuliahs()
    {
        return $this->hasMany(Matakuliah::class);
    }
}
