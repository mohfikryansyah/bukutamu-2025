<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Password;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'name' => 'admin',
                'email' => 'admin@bpkh15gorontalo.com',
                'role' => 'admin',
                'password' => Password::hash('123adm!N'),
                'id_divisi' => null,
                'status' => 'offline',
            ],
            [
                'name' => 'pimpinan',
                'email' => 'kabalai@bpkh15gorontalo.com',
                'role' => 'pimpinan',
                'password' => Password::hash('123adm!N'),
                'id_divisi' => 4,
                'status' => 'offline',
            
            ],
            [
                'name' => 'Tata Usaha',
                'email' => 'kasubag_tu@bpkh15gorontalo.com',
                'role' => 'kepala divisi',
                'password' => Password::hash('123adm!N'),
                'id_divisi' => 1,
                'status' => 'offline',
            
            ],
            [
                'name' => 'ISDHL',
                'email' => 'kasubag_sdhtl@bpkh15gorontalo.com',
                'role' => 'kepala divisi',
                'password' => Password::hash('123adm!N'),
                'id_divisi' => 2,
                'status' => 'offline',
            
            ],
            [
                'name' => 'PKH',
                'email' => 'kasubag_pkh@bpkh15gorontalo.com',
                'role' => 'kepala divisi',
                'password' => Password::hash('123adm!N'),
                'id_divisi' => 3,
                'status' => 'offline',
            
            ],
        ];

        // Masukkan data ke dalam tabel pengunjungs
        DB::table('users')->insert($data);
    }
}
