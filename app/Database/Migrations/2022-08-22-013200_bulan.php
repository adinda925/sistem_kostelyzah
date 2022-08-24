<?php

namespace App\Database\Migrations;

class Bulan extends \CodeIgniter\Database\Migration
{

    public function up()
    {
        // $this->db->disableForeignKeyChecks();
        $this->forge->addField([
            'id_bulan' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ],
            'bulan' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
            ],
        ]);

        $this->forge->addKey('id_bulan', TRUE);
        $this->forge->createTable('bulan');
        // $this->db->enableForeignKeyChecks();
    }

    public function down()
    {
        $this->forge->dropTable('bulan');
    }
}
