<?php

namespace App\Tafio\blog\src\Models;

use Tafio\core\src\Models\company;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Kyslik\ColumnSortable\Sortable;

class mahasiswa extends Model
{
    protected $table = 'mahasiswas';
    protected $fillable = ['nama', 'jurusan_id', 'company_id'];





    public function company()
    {
        return $this->belongsTo(company::class);
    }
    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class);
    }
}
// belongsTo