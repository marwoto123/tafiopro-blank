<?php

namespace App\Tafio\blog\src\Models;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    protected $table = 'mahasiswa';
    protected $fillable = ['nama', 'company_id'];

    public function company()
    {
        return $this->belongsTo(company::class);
    }
}
