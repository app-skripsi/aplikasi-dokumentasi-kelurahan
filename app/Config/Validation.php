<?php

namespace Config;

use CodeIgniter\Validation\CreditCardRules;
use CodeIgniter\Validation\FileRules;
use CodeIgniter\Validation\FormatRules;
use CodeIgniter\Validation\Rules;

class Validation
{
	//--------------------------------------------------------------------
	// Setup
	//--------------------------------------------------------------------

	/**
	 * Stores the classes that contain the
	 * rules that are available.
	 *
	 * @var string[]
	 */
	public $ruleSets = [
		Rules::class,
		FormatRules::class,
		FileRules::class,
		CreditCardRules::class,
	];

	/**
	 * Specifies the views that are used to display the
	 * errors.
	 *
	 * @var array<string, string>
	 */
	public $templates = [
		'list' => 'CodeIgniter\Validation\Views\list',
		'single' => 'CodeIgniter\Validation\Views\single',
	];

	//--------------------------------------------------------------------
	// Rules
	//--------------------------------------------------------------------


	public $arsip = [
		'kode_arsip' => 'required',
		'nama_arsip' => 'required',
		'jenis_id' => 'required',
		'tanggal_pembuatan' => 'required',
		'lokasi_arsip' => 'required',
	];

	public $arsip_errors = [
		'kode_arsip' => [
			'required' => 'kode_arsip perlu di isi'
		],

		'nama_arsip' => [
			'required' => 'nama_arsip perlu di isi'
		],
		'jenis_id' => [
			'required' => 'jenis_id perlu di isi'
		],
		'tanggal_pembuatan' => [
			'required' => 'tanggal_pembuatan perlu di isi'
		],
		'lokasi_arsip' => [
			'required' => 'lokasi_arsip perlu di isi'
		],
		'pegawai_id' => [
			'required' => 'pegawai_id perlu di isi'
		]
	];


	public $dokumen = [
		'nama_dokumen' => 'required',
		'tipe_dokumen' => 'required',
		'jenis_id' => 'required',
		'lokasi_dokumen' => 'required',
		'tanggal_upload' => 'required',

	];

	public $dokumen_errors = [
		'nama_dokumen' => [
			'required' => 'nama_dokumen perlu di isi'
		],
		'tipe_dokumen' => [
			'required' => 'tipe_dokumen perlu di isi'
		],
		'jenis_id' => [
			'required' => 'jenis_id perlu di isi'
		],
		'lokasi_dokumen' => [
			'required' => 'lokasi_dokumen perlu di isi'
		],
		'tanggal_upload' => [
			'required' => 'tanggal_upload perlu di isi'
		]
	];
}
