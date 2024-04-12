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
            'jenis_dokumen' => [
                'type' => 'ENUM',
                'constraint' => ['Surat', 'Kontrak', 'Laporan', 'Dokumen Pribadi', 'Dokumen Kepegawaian', 'Dokumen Perizinan', 'Arsip Historis', 'Dokumen Legal', 'Dokumen Proyek', 'Dokumen Pendukung Administrasi', 'Dokumen Pendidikan', 'Lainnya'],
            ],
            'lokasi_dokumen' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'tanggal_upload' => [
                'type' => 'DATE',
            ],
            'pegawai_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('pegawai_id', 'pegawai', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('dokumen');
    }

    public function down()
    {
        $this->forge->dropTable('dokumen');
    }
}
