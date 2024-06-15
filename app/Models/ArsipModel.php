<?php

namespace App\Models;

use CodeIgniter\Model;

class ArsipModel extends Model
{
    protected $table            = 'arsip';

	public function getData($id = false)
	{
		if ($id === false) {
			return $this->table('arsip')
				->join('jenis', 'jenis.id = arsip.jenis_id')
				->get()
				->getResultArray();
		} else {
			return $this->table('arsip')
				->join('jenis', 'jenis.id = arsip.jenis_id')
				->where('arsip.id', $id)
				->get()
				->getRowArray();
		}
	}
	public function insertData($data)
	{
		return $this->db->table($this->table)->insert($data);
	}

	public function updateData($data, $id)
	{
		return $this->db->table($this->table)->update($data, ['id' => $id]);
	}
	public function deleteData($id)
	{
		return $this->db->table($this->table)->delete(['id' => $id]);
	}
}
