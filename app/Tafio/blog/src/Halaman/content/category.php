<?php

namespace App\Tafio\blog\src\Halaman\content;

use Tafio\core\src\Library\Resource;
use Tafio\core\src\Library\Field\text;
use Tafio\core\src\Library\Halaman\crud;

class category extends Resource
{
    public function config()
    {
        $this->halaman = (new crud)->make()->route('index', 'edit', 'create');

        $this->fields = [
            (new text)->make('nama')->validate("required"),
        ];
    }
}
