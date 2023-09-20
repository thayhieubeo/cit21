<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableMenu extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 255,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'ten_menu' => [
                'type'       => 'TEXT',
            ],
            'meta' => [
                'type'       => 'TEXT',
            ],
            'loai' => [
                'type'           => 'INT',
                'constraint'     => 255,
            ],
            'partner' => [
                'type'           => 'INT',
                'constraint'     => 255,
                'null' => true
            ],            
            'nhom' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'null' => true
            ],
            'link' => [
                'type'       => 'TEXT',
                'null' => true
            ]

        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('menu');
    }

    public function down()
    {
        $this->forge->dropTable('menu');
    }
}
