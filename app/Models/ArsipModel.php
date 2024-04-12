<?php

namespace App\Models;

use CodeIgniter\Model;

class ArsipModel extends Model
{
    protected $table            = 'arsip';
    protected $allowedFields = [ 'number','kode', 'nama','type','date', 'record','pic'];

	public function getData($id = false)
	{
		if ($id === false) {
			return $this->table('arsip')
				->get()
				->getResultArray();
		} else {
			return $this->table('arsip')
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
	public function pegawai()
    {
        return $this->belongsTo(PegawaiModel::class);
    }
}
