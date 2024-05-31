<?php
namespace App\Tafio\blog\src;

use Tafio\core\src\Library\Resource_setting;

class setting extends Resource_setting
{
    public function navigation()
    {
        return [
            'blog' => [
                'icon' => 'factory',
                'submenu' => [
                    [
                        'nama' => 'category',
                        'alamat' => 'blog/content/category',
                    ],
                ],
            ],
            'Mahs' => [
                'icon' => 'account-box',
                'submenu' => [
                    [
                        'nama' => 'Mahasiswa',
                        'alamat' => 'blog/content/mahasiswa',
                    ],
                    [
                        'nama' => 'Jurusan',
                        'alamat' => 'blog/content/jurusan',
                    ],
                ],
            ],
            'What To Do' => [
                'icon' => 'google-pages',
                'submenu' => [
                    [
                        'nama' => 'Catatan',
                        'alamat' => 'blog/content/catatan',
                    ],
                    [
                        'nama' => 'Kategori',
                        'alamat' => 'blog/content/kategori',
                    ],
                ],
            ],
        ];
    }

}
