<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Data extends Seeder
{
    public function run()
	{
		$users = [
			[
				'id'		=> 1,
				'nama_user'	=> 'Adelia Natasya',
				'username'	=> 'adel001',
				'password'	=> 'adel001',
				'level'		=> 1
			],

			[
				'id'		=> 2,
				'nama_user'	=> 'Natasya',
				'username'	=> 'adel002',
				'password'	=> 'adel002',
				'level'		=> 2
			],
		];

		$this->db->table('users')->insertBatch($users);

		$jenis = [
			['nama' => 'Kependudukan'],
			['nama' => 'Administrasi'],
			['nama' => 'Perencanaan dan Pembangunan'],
			['nama' => 'Keuangan'],
			['nama' => 'Pertanahan'],
			['nama' => 'Pelayanan Publik'],
			['nama' => 'Legal'],
			['nama' => 'Kegiatan Sosial'],
		];
		$this->db->table('jenis')->insertBatch($jenis);
	}
}
