<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableGroupAndProduct extends Migration
{
    public function up()
    {
        

        // Create loai table
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'ten' => [
                'type' => 'TEXT',
            ],
            'loai' => [
                'type'           => 'INT',
                'constraint'     => 11,
            ],
            'image' => [
                'type'       => 'TEXT',
                'null' => true
            ]
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('loai_sp');

        // Create group table
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'ten' => [
                'type' => 'TEXT',
            ],
            'meta' => [
                'type' => 'TEXT',
            ]
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('group');

        //create product table
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 255,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'ten_san_pham' => [
                'type'       => 'TEXT',
            ],
            'meta' => [
                'type'       => 'TEXT',
            ],
            'loai' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned' => true
            ],
            'image' => [
                'type'       => 'TEXT',
                'null' => true
            ],
            'price' => [
                'type'       => 'VARCHAR',
                'constraint'     => '255',
                'null' => true
            ],
            'groups' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'null' => true
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
            'oder' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'null' => true
            ],            
            'view' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'null' => true
            ],
            'thongtin' => [
                'type'       => 'TEXT',
                'null' => true
            ]

        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('loai', 'loai_sp', 'id');
        $this->forge->createTable('product');
    }

    public function down()
    {
        $this->forge->dropTable('loai_sp');
        $this->forge->dropTable('group');
        $this->forge->dropTable('product');
    }
}
