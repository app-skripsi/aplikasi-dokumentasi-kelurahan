<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class JenisMigration extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'nama' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ]
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('jenis');
    }

    public function down()
    {
        $this->forge->dropTable('jenis');
    }
}
