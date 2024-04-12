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
        'list'   => 'CodeIgniter\Validation\Views\list',
        'single' => 'CodeIgniter\Validation\Views\single',
    ];

    //--------------------------------------------------------------------
    // Rules
    //--------------------------------------------------------------------



    public $pegawai = [
		'nama'        => 'required',
		'nip'   		=> 'required',
		'jabatan'   		=> 'required',
	];

	public $pegawai_errors = [
		'nama'    			=> [
			'required'			=> 'nama perlu di isi'
		],

		'nip'   		        => [
			'required'			=> 'nip perlu di isi'
        ],
        'jabatan'   		        => [
			'required'			=> 'jabatan perlu di isi'
		],
	];


    public $arsip = [
		'number'        => 'required',
		'kode'   		=> 'required',
		'nama'   		=> 'required',
		'type'   		=> 'required',
		'date'   		=> 'required',
		'record'   		=> 'required',
		'pic'   	    => 'required',
	];

	public $arsip_errors = [
		'number'    			=> [
			'required'			=> 'number perlu di isi'
		],

		'kode'   		        => [
			'required'			=> 'kode perlu di isi'
        ],
        'nama'   		        => [
			'required'			=> 'nama perlu di isi'
		],
        'type'   		        => [
			'required'			=> 'type perlu di isi'
		],
        'date'   		        => [
			'required'			=> 'date perlu di isi'
		],
        'record'   		        => [
			'required'			=> 'record perlu di isi'
		],
        'pic'   		        => [
			'required'			=> 'pic perlu di isi'
		],
	];


    public $dokumen = [
		'number'        => 'required',
		'kode'   		=> 'required',
		'nama'   		=> 'required',
		'type'   		=> 'required',
		'date'   		=> 'required',
		'record'   		=> 'required',
		'pic'   	    => 'required',
	];

	public $dokumen_errors = [
        'number'    			=> [
			'required'			=> 'number perlu di isi'
		],

		'kode'   		        => [
			'required'			=> 'kode perlu di isi'
        ],
        'nama'   		        => [
			'required'			=> 'nama perlu di isi'
		],
        'type'   		        => [
			'required'			=> 'type perlu di isi'
		],
        'date'   		        => [
			'required'			=> 'date perlu di isi'
		],
        'record'   		        => [
			'required'			=> 'record perlu di isi'
		],
        'pic'   		        => [
			'required'			=> 'pic perlu di isi'
		],
	];
}
