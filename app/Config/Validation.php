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
    public $Registrasi = [
        'name' => [
            'rules' => 'required',
            
        ],
        'email' => [
            'rules' => 'required|valid_email|is_unique[users.email]',
            
        ],
        'password' => [
            'rules' => 'required|min_length[5]|max_length[12]',
            
        ],
        'cpassword' => [
            'rules' => 'required|min_length[5]|max_length[12]|matches[password]',
        ],
    ];

    public $Registrasi_errors = [
        'name' => ['required' => 'Nama harus diisi !'],
        'email' => [
            'required' => 'Email harus diisi !',
            'valid_email' => 'Masukan alamat email yang benar !',
            'is_unique' => 'Alamat sudah terdaftar sebelumnya !'
        ],
        'password' => [
            'required' => 'Password harus diisi !',
            'min_length' => 'Password minimal 5 huruf !',
            'max_length' => 'Password maximal 12  huruf !'
        ],
        'cpassword' => [
            'required' => 'Confirm Password harus diisi !',
            'min_length' => 'Password minimal 5 huruf !',
            'max_length' => 'Password maximal 12  huruf !',
            'matches' => 'Password tidak sama !'
        ]
    ];
    public $SignIn = [
        'name' => [
                'rules' => 'required|is_not_unique[users.name]',
                
            ],
            'password' => [
                'rules' => 'required',           
            ],
        ];
    public $SignIn_errors = [
        'name' => [
            'required' => 'Nama harus diisi !',
            'is_not_unique' => 'Nama belum terdaftar !',
        ],
        'password' => [
            'required' => 'Password harus diisi !'
        ] 
    ];    

    public $TambahGejala = [
        "nama_gejala" => [
            'rules' => 'required|is_unique[tbl_gejala.nama_gejala]']
        ];

    public $TambahGejala_errors = [
        'nama_gejala' => [
            'required' => 'Nama Gejala Harus Diisi',
            'is_unique' => 'Nama gejala sudah terdaftar sebelumnya!'
        ],
    ];


    public $TambahKerusakan = [
        "nama_kerusakan" => [
            'rules' => 'required|is_unique[tbl_kerusakan.nama_kerusakan]'],
        "probabilitas" =>['rules' => 'required'],
        "solusi" =>['rules'=> 'required'],
        "gambar" => ['rules'=>'uploaded[gambar]|is_image[gambar]'], 
        ];

        public $TambahKerusakan_errors = [
            'nama_kerusakan' => [
                'required' => 'Nama Kerusakan Harus Diisi!',
                'is_unique' => 'Nama kerusakan sudah terdaftar sebelumnya!'
            ],
            'probabilitas' => [
                'required' => 'Nilai Probabilitas Harus Diisi!',
            ],
            'solusi' => [
                'required' => 'Keterangan Solusi Harus Diisi!',
            ],
            'gambar' => [
                'uploaded' => 'Gambar Harus Diisi!',
                'is_image' => 'Hanya Dapat Menerima Upload File Gambar!',
            ],
            
        ];

        public $UpdateKerusakan = [
            "nama_kerusakan" => ['rules' => 'required'],
            "probabilitas" =>['rules' => 'required'],
            "solusi" =>['rules'=> 'required'],
            ];

        public $UpdateKerusakan_errors = [
            'nama_kerusakan' => [
                 'required' => 'Nama Kerusakan Harus Diisi!',
              ],
               'probabilitas' => [
                   'required' => 'Nilai Probabilitas Harus Diisi!',
               ],
              'solusi' => [
                  'required' => 'Keterangan Solusi Harus Diisi!',
               ],       
         ];
         public $tambahPengetahuan = [
            "id_gejala"=>['rules'=>'required'],
            "id_kerusakan"=>['rules'=>'required'],
            "probabilitas" =>['rules' => 'required'],
        ];
        public $tambahPengetahuan_errors = [
            'id_gejala' => [
                'required' => 'Gejala Harus Diisi!',
             ],
             'id_kerusakan' => [
                'required' => 'Kerusakan Harus Diisi!',
             ],
             'probabilitas' => [
                'required' => 'Nilai Probabilitas Harus Diisi!',
             ],
            
        ]; 
}