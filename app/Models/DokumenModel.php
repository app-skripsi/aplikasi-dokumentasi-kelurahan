<?php

namespace App\Models;

use CodeIgniter\Model;

class DokumenModel extends Model
{
    protected $table            = 'dokumen';

	public function getData($id = false)
	{
		if ($id === false) {
			return $this->table('dokumen')
				->join('jenis', 'jenis.id = dokumen.jenis_id')
				->get()
				->getResultArray();
		} else {
			return $this->table('dokumen')
				->join('jenis', 'jenis.id = dokumen.jenis_id')
				->where('dokumen.id', $id)
				->get()
				->getRowArray();
		}
	}

	public function getAllDokumen()
    {
        return $this->select('dokumen.*, jenis.nama as nama_jenis')
                    ->join('jenis', 'jenis.id = dokumen.jenis_id')
                    ->findAll();
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
