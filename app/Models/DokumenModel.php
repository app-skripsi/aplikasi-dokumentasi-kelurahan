<?php

namespace App\Models;

use CodeIgniter\Model;

class DokumenModel extends Model
{
    protected $table            = 'dokumen';
    protected $allowedFields = ['number','kode', 'nama','type','date', 'record','pic'];

	public function getData($id = false)
	{
		if ($id === false) {
			return $this->table('dokumen')
				->get()
				->getResultArray();
		} else {
			return $this->table('dokumen')
				->where('dokumen.id', $id)
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
