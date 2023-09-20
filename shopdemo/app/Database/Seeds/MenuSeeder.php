<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class MenuSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'ten_menu'=>'TRANG CHỦ',
                'meta'=> 'trang-chu',
                'loai'=>1,
                'link'=>'?UI='
            ],
            [
                'ten_menu'=>'Blog',
                'meta'=> 'blog',
                'loai'=>1,
                'link'=>'?UI='
            ]

        ];
        $this -> db ->table('menu')->insertBatch($data);
    }
}
