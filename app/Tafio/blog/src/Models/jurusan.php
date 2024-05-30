<?php

namespace App\Tafio\blog\src\Models;

use Tafio\core\src\Models\company;
use Illuminate\Database\Eloquent\Model;



class jurusan extends Model
{
    protected $table = 'mahasiswas';
    protected $fillable = ['nama', 'company_id'];

    public function company()
    {
        return $this->belongsTo(company::class);
    }
  
}
