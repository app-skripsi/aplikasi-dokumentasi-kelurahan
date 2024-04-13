<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ArsipMigration extends Migration
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
            'kode_arsip' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'nama_arsip' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'jenis_arsip' => [
                'type' => 'ENUM',
                'constraint' => ['Surat', 'Kontrak', 'Laporan', 'Dokumen Pribadi', 'Dokumen Kepegawaian', 'Dokumen Perizinan', 'Arsip Historis', 'Dokumen Legal', 'Dokumen Proyek', 'Dokumen Pendukung Administrasi', 'Dokumen Pendidikan'],
            ],
            'tanggal_pembuatan' => [
                'type' => 'DATE',
                'null' => true,
            ],
            'lokasi_arsip' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ]
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('arsip');
    }

    public function down()
    {
        $this->forge->dropTable('arsip');
    }
}
