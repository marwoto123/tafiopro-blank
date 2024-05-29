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
                ],
            ],
        ];
    }

}
