<?php

namespace App\Models;

use CodeIgniter\Model;

class PegawaiModel extends Model
{
    protected $table            = 'pegawai';
    protected $allowedFields = ['nama', 'nip','jabatan'];

	public function getData($id = false)
	{
		if ($id === false) {
			return $this->table('pegawai')
				->get()
				->getResultArray();
		} else {
			return $this->table('pegawai')
				->where('pegawai.id', $id)
				->get()
				->getRowArray();
		}
	}
	public function insertData($data)
	{
		return $this->db->table($this->table)->insert($data);
	}

	public function updateData($id, $data)
	{
		$query = $this->db->table($this->table)
						->where('id', $id)
						->update($data);
		var_dump($query);

		return $this->db->table($this->table)
						->where('id', $id)
						->update($data);
	}


	public function deleteData($id)
	{
		return $this->db->table($this->table)->delete(['id' => $id]);
	}
}
