<?php

namespace App\Database\Migrations;

class Kamar extends \CodeIgniter\Database\Migration
{

    public function up()
    {
        $this->forge->addField([
            'id_kamar' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ],
            'no_kamar' => [
                'type' => 'TEXT',
            ],
            'fasilitas' => [
                'type' => 'TEXT',
            ],
            'biaya' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'foto' => [
                'type' => 'TEXT',
            ],
            'id_kategori' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'created_by' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'created_date' => [
                'type' => 'DATETIME',
            ],
            'updated_by' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => TRUE,
            ],
            'updated_date' => [
                'type' => 'DATETIME',
                'null' => TRUE,
            ]
        ]);

        $this->forge->addKey('id_kamar', TRUE);
        $this->forge->createTable('kamar');
    }

    public function down()
    {
        $this->forge->dropTable('kamar');
    }
}
