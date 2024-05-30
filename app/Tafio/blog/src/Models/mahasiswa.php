<?php

namespace App\Tafio\blog\src\Models;

use Tafio\core\src\Models\company;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Kyslik\ColumnSortable\Sortable;

class mahasiswa extends Model
{
    protected $table = 'mahasiswas';
    protected $guarded = [];
    protected static function booted(): void
    {
        static::addGlobalScope('company', function (Builder $builder) {
            $builder->where($builder->qualifyColumn('company_id'), session('company'));
        });
    }

    // protected $fillable = ['nama', 'jurusan_id', 'company_id'];





    public function company()
    {
        return $this->belongsTo(company::class);
    }
    public function jurusan()
    {
        return $this->belongsTo(jurusan::class);
    }
}
// belongsTo