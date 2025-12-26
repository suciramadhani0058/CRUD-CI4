<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Barang extends Migration
{
    public function up()
    {
        $this->forge->addField([
        'id' => [
            'type'           => 'INT',
            'constraint'     => 11,
            'unsigned'       => true,
            'auto_increment' => true,
        ],

        'nama_barang' => [
            'type'       => 'VARCHAR',
            'constraint' => 255,
        ],

        'harga' => [
            'type'       => 'INT',
            'constraint' => 11,
        ],

        'stok' => [
            'type'       => 'INT',
            'constraint' => 11,
                 ],

                'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
                             ],

                'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
                             ],

        
        ]);

        $this->forge->addKey('id',true);
        $this->forge->createTable('barang');
    }

    public function down()
    {
        $this->forge->dropTable('barang');
    }
}
