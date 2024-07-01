<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class DokumenMigration extends Migration
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
            'nama_dokumen' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'tipe_dokumen' => [
                'type' => 'ENUM',
                'constraint' => ['Public', 'Private', 'Confidential'],
                'default' => 'Public',
            ],
            'download_file' => [
                'type'=> 'VARCHAR',
                'constraint' => 255,
            ],
            'jenis_id' => [
                'type'          => 'INT',
                'constraint'    => 5,
                'unsigned'      => true,
            ],
            'lokasi_dokumen' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'tanggal_upload' => [
                'type' => 'DATE',
            ]
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('jenis_id','jenis','id','cascade','cascade');
        $this->forge->createTable('dokumen');
    }

    public function down()
    {
        $this->forge->dropTable('dokumen');
    }
}
