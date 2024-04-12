<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class PegawaiMigration extends Migration
{
    public function up()
	{
		$this->forge->addField([
			'id'          => [
				'type'           => 'INT',
				'constraint'     => 11,
				'unsigned'       => TRUE,
				'auto_increment' => TRUE
			],
			'nama'          => [
				'type'           => 'VARCHAR',
				'constraint'     => '50',
			],
			'nip'               => [
				'type'           => 'VARCHAR',
				'constraint'     => '50',
			],
			'jabatan'               => [
                'type' => 'ENUM',
                'constraint' => ['Kepala Kelurahan', 'Sekretaris Kelurahan', 'Kepala Bagian Pemerintahan', 'Staf Administrasi Kelurahan']
			]
		]);
		$this->forge->addKey('id', TRUE);
		$this->forge->createTable('pegawai', TRUE);
	}

	public function down()
	{
		$this->forge->dropTable('pegawai');
	}
}
