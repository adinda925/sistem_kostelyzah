<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Validation\CreditCardRules;
use CodeIgniter\Validation\FileRules;
use CodeIgniter\Validation\FormatRules;
use CodeIgniter\Validation\Rules;

class Validation extends BaseConfig
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
    public $register = [
        'nama' => [
            'rules' => 'required|is_unique[user.nama,id_user,{id_user}]',
        ],
        'no_wa' => [
            'rules' => 'required|numeric|min_length[10]|is_unique[user.no_wa,id_user,{id_user}]',
        ],
        'username' => [
            'rules' => 'required|min_length[5]|is_unique[user.username,id_user,{id_user}]',
        ],
        'email' => [
            'rules' => 'required|valid_email|is_unique[user.email,id_user,{id_user}]',
        ],
        'password' => [
            'rules' => 'required',
        ],
        'repeatPassword' => [
            'rules' => 'required|matches[password]',
        ],
    ];

    public $register_errors = [
        'nama' => [
            'required' => '{field} Harus Diisi',
            'is_unique' => '{field} Sudah Terdaftar',
        ],
        'no_wa' => [
            'required' => '{field} Harus Diisi',
            'is_unique' => '{field} Sudah Terdaftar',
            'numeric' => '{field} Berupa Angka',
            'min_length' => '{field} Minimal 10 Karakter'
        ],
        'username' => [
            'required' => '{field} Harus Diisi',
            'min_length' => '{field} Minimal 5 Karakter',
            'is_unique' => '{field} Sudah Terdaftar',
        ],
        'email' => [
            'required' => '{field} Harus Diisi',
            'is_unique' => '{field} Sudah Terdaftar',
        ],
        'password' => [
            'required' => '{field} Harus Diisi',
        ],
        'repeatPassword' => [
            'required' => '{field} Harus Diisi',
            'matches' => '{field} Tidak Sesuai Dengan Password'
        ],
    ];

    public $login = [
        'username' => [
            'rules' => 'required|min_length[5]',
        ],
        'password' => [
            'rules' => 'required',
        ],
    ];

    public $login_errors = [
        'username' => [
            'required' => '{field} Harus Diisi',
            'min_length' => '{field} Minimal 5 Karakter',
        ],
        'password' => [
            'required' => '{field} Harus Diisi',
        ],
    ];

    public $kamar = [
        'no_kamar' => [
            'rules' => 'required',
        ],
        'biaya' => [
            'rules' => 'required|is_natural',
        ],
        'foto' => [
            'rules' => 'uploaded[foto]',
        ],
        'fasilitas' => [
            'rules' => 'required',
        ],
        'jumlah' => [
            'rules' => 'required',
        ]

    ];

    public $kamar_errors = [
        'no_kamar' => [
            'required' => '{field} Harus diisi',

        ],
        'biaya' => [
            'required' => '{field} Harus diisi',
            'is_natural' => '{field} Tidak Boleh Negatif',
        ],
        'foto' => [
            'uploaded' => '{field} Harus di upload',
        ],
        'fasilitas' => [
            'required' => '{field} Harus diisi',
        ],
        'jumlah' => [
            'required' => '{field} Harus diisi',
        ]

    ];

    public $kamarupdate = [
        'no_kamar' => [
            'rules' => 'required',
        ],
        'biaya' => [
            'rules' => 'required|is_natural',
        ],
        'fasilitas' => [
            'rules' => 'required',
        ],
        'jumlah' => [
            'rules' => 'required',
        ]
    ];

    public $transaksi = [
        'id_kamar' => [
            'rules' => 'required',
        ],
        'id_user' => [
            'rules' => 'required',
        ],
        'nama' => [
            'rules' => 'required',
        ],
        'email' => [
            'rules' => 'required',
        ],
        'no_wa' => [
            'rules' => 'required',
        ],
        'no_kamar' => [
            'rules' => 'required',
        ],
        'biaya' => [
            'rules' => 'required|is_natural',
        ],

    ];
}
