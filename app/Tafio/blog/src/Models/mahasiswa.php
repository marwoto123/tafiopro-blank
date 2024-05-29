<?php

namespace App\Tafio\blog\src\Models;

use Tafio\core\src\Models\company;
use Illuminate\Database\Eloquent\Model;



class mahasiswa extends Model
{
    protected $table = 'mahasiswas';
    protected $fillable = ['nama', 'nim', 'jurusan', 'company_id'];

    public function company()
    {
        return $this->belongsTo(company::class);
    }
    public function categorie()
    {
        return $this->belongsTo(category::class);
    }
}
