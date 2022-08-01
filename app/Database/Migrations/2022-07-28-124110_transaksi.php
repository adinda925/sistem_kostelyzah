<?php

namespace App\Database\Migrations;

use PHPUnit\Framework\Constraint\Constraint;

class Transaksi extends \CodeIgniter\Database\Migration
{

    public function up()
    {
        // $this->db->disableForeignKeyChecks();
        $this->forge->addField([
            'id_tagihan' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ],
            'id_kamar' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
            ],
            'id_user' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
            ],
            'nama' => [
                'type' => 'TEXT',
                'constraint' => 100,
            ],
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'no_wa' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'no_kamar' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'biaya' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'tgl_masuk' => [
                'type' => 'date',
            ],
            'order_id' => [
                'type' => 'char',
                'constraint' => 20,
            ],
            'payment_type' => [
                'type' => 'varchar',
                'constraint' => 50,
            ],
            'payment_method' => [
                'type' => 'enum',
                'constraint' => "'C','M'",
            ],
            'created_by' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => TRUE,
            ],
            'created_date' => [
                'type' => 'DATETIME',
                'null' => TRUE,
            ],
            'transaction_time' => [
                'type' => 'DATETIME',
                'null' => TRUE,
            ],
            'transaction_status' => [
                'type' => 'varchar',
                'constraint' => 50,
            ],
            'pdf_url' => [
                'type' => 'VARCHAR',
                'constraint' => 256,
            ],
            'va_number' => [
                'type' => 'char',
                'constraint' => 50,
            ],
            'bank' => [
                'type' => 'varchar',
                'constraint' => 50,
            ],
        ]);

        $this->forge->addKey('id_tagihan', TRUE);
        $this->forge->addForeignKey('id_kamar', 'kamar', 'id_kamar');
        $this->forge->addForeignKey('id_user', 'user', 'id_user');
        $this->forge->createTable('transaksi');
        // $this->db->enableForeignKeyChecks();
    }

    public function down()
    {
        $this->forge->dropTable('transaksi');
    }
}
