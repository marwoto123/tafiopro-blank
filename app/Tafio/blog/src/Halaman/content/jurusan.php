<?php

namespace App\Tafio\blog\src\Halaman\content;

use Tafio\core\src\Library\Field\noForm;
use Tafio\core\src\Library\Resource;
use Tafio\core\src\Library\Field\text;
use Tafio\core\src\Library\Halaman\crud;

class jurusan extends Resource
{
    public function config()
    {
        $this->halaman = (new crud)->make()->judul('Jurusan') ;

        $this->fields = [
            (new text)->make("jurusan")->validate("required"),
            (new noForm)->make("id")->judul('tabel_Jurusan_id'),
         

        ];
    }
}
