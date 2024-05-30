<?php

namespace App\Tafio\blog\src\Halaman\content;

use Tafio\core\src\Library\Resource;
use Tafio\core\src\Library\Field\text;
use Tafio\core\src\Library\Field\select;
use Tafio\core\src\Library\Halaman\crud;
use Tafio\core\src\Library\Field\noForm;
use App\Tafio\blog\src\Models\jurusan;


class mahasiswa extends Resource
{
    public function config()
    {
        $this->halaman = (new crud)->make();

        $this->fields = [
            (new text)->make('nama')->search()->validate("required"),
            (new text)->make('jurusan_id')->judul('jurusan_id')->validate("required"),
            // (new noForm)->make('jurusan')->judul('jurusan')->displayFront(),
         
            (new select)->make('jurusan')->judul('jurusan')->options(jurusan::get()->pluck('jurusan','id')->all()),
            

        ];
    }
}
