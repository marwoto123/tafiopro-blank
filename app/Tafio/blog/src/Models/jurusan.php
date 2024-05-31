<?php

namespace App\Tafio\blog\src\Models;

use Tafio\core\src\Models\company;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;


class jurusan extends Model
{   use sortable;
    protected $table = 'jurusans';
    protected $guarded = [];
    // protected $fillable = ['id','jurusan','company_id'];

    public function company()
    {
        return $this->belongsTo(company::class);
    }
    public function mahasiswa()
    {
        return $this->hasMany(mahasiswa::class);
    }
  
}
// hasMany