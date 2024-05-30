<?php

namespace App\Tafio\blog\src\Models;

use Tafio\core\src\Models\company;
use Illuminate\Database\Eloquent\Model;



class jurusan extends Model
{
    protected $table = 'jurusans';
    protected $fillable = ['id','jurusan','company_id'];

    public function company()
    {
        return $this->belongsTo(company::class);
    }
    public function mahasiswa()
    {
        return $this->hasMany(Mahasiswa::class);
    }
  
}
// hasMany