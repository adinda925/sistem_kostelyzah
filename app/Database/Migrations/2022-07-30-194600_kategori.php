<?php

namespace App\Database\Migrations;

class Kategori extends \CodeIgniter\Database\Migration
{

    public function up()
    {
        // $this->db->disableForeignKeyChecks();
        $this->forge->addField([
            'id_kategori' => [
                'type' => 'INT',
                'constraint' => 2,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ],
            'kategori' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
            ],
        ]);

        $this->forge->addKey('id_kategori', TRUE);
        $this->forge->createTable('kategori');
        // $this->db->enableForeignKeyChecks();
    }

    public function down()
    {
        $this->forge->dropTable('kategori');
    }
}
