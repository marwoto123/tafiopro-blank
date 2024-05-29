<?php

namespace App\Tafio\blog\src\Models;

use Illuminate\Database\Eloquent\Model;
use Tafio\core\src\Halaman\core\company;

class category extends Model
{
    protected $table = 'categories';
    protected $fillable = ['nama', 'company_id'];

    public function company()
    {
        return $this->belongsTo(company::class);
    }
}
