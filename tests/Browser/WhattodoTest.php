<?php

namespace Tests\Browser;
use Tafio\Models\User;
use Tafio\Models\Halaman;

use Tests\DuskTestCase;
use Tests\TemplateTest;

use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class WhattodoTest extends DuskTestCase
{
use TemplateTest;

public function setUp()
    {
        parent::setUp();

        $halamans=Halaman::whereNull('route')->get();
// dd($halamans);
$isian=['text'=>['isi'=>'abcdef','update'=>'abcdef123'],
        'textarea'=>['isi'=>'abcdef','update'=>'abcdef123'],
        'number'=>['isi'=>'99','update'=>'88'],
        ];

$i=0;
foreach($halamans as $halaman)
{
  $this->halaman[$i]=['nama'=>$halaman->nama,
                    'model'=>$halaman->model,
                    'table'=>$halaman->table,
                    'tambah'=>$halaman->tambah,
                    'edit'=>$halaman->edit,
                    'hapus'=>$halaman->hapus,
                    'alamat'=>$halaman->nama];

                foreach($halaman->field as $field)
{
  if(!empty($field->type))
  $this->halaman[$i]['field'][]=['nama'=>$field->nama]+$isian[$field->type];
}
$i++;


}
// dd(ww]);
    }



}
