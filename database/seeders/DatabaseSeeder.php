<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        // form::create([
        //     'nama1' => 'wwn',
        //     'nama2' => 'Wawan',
        //     'phone1' => '08151413123',
        //     'phone2' => '08123514124',
        //     'jabatan1' => 'headend',
        //     'jabatan2' => 'headend',
        //     'instansi1' => 'telkom',
        //     'instansi2' => 'emtek',
        //     'alamat1' => 'Jl. merdeka selatan',
        //     'alamat2' => 'Jl. Sudirman',
        //     'ttd1' => 'wwn1.png',
        //     'ttd2' => 'Wawan1.png',
        //     'keterangan' => 'dipinjamkan ke pihak emtek',
        // ]);
        // form::create([
        //     'nama1' => 'danen',
        //     'nama2' => 'yanto',
        //     'phone1' => '08151413123',
        //     'phone2' => '08151413123',
        //     'jabatan1' => 'headend',
        //     'jabatan2' => 'headend',
        //     'instansi1' => 'emtek',
        //     'instansi2' => 'telkom',
        //     'alamat1' => 'Jl. merdeka selatan',
        //     'alamat2' => 'Jl. Sudirman',
        //     'ttd1' => 'danen2.png',
        //     'ttd2' => 'yanto2.png',
        //     'keterangan' => 'diberikan ke pihak telkom',
        // ]);
        // // pihak::create([
        // //     'nama' => 'Samsul',
        // //     'jabatan' => 'headend',
        // //     'alamat' => 'Sudirman',
        // //     'ttd' => 'samsul.png',
        // // ]);
        // // barang::create([
        // //     'nama_barang' => 'decoder',
        // //     'label' => 'Histori',
        // //     'sn' => 'BANXMS',
        // //     'ua' => '6620953',
        // //     'pemilik' => 'telkom',
        // // ]);
        // barang::create([
        //     'pihak_id' => '1',
        //     'nama_barang' => 'decoder ccna',
        //     'merek' => 'harmonic',
        //     'sn' => 'BALJOWP',
        //     'kondisi' => 'decoder-ccna.jpg',
        //     'pemilik' => 'telkom',
        // ]);
        // barang::create([
        //     'pihak_id' => '1',
        //     'nama_barang' => 'encoder cisco',
        //     'merek' => 'harmonic',
        //     'sn' => 'BANXIBR',
        //     'kondisi' => 'encoder-cisco.jpg',
        //     'pemilik' => 'telkom',
        // ]);
        // barang::create([
        //     'pihak_id' => '2',
        //     'nama_barang' => 'decoder ccna',
        //     'merek' => 'harmonic',
        //     'sn' => 'BALJOWP',
        //     'kondisi' => 'decoder-ccna.jpg',
        //     'pemilik' => 'telkom',
        // ]);
        // barang::create([
        //     'pihak_id' => '2',
        //     'nama_barang' => 'encoder cisco',
        //     'merek' => 'harmonic',
        //     'sn' => 'BANXIBR',
        //     'kondisi' => 'encoder-cisco.jpg',
        //     'pemilik' => 'telkom',
        // ]);
        user::create([
            'name' => 'user',
            'email' => 'user@gmail.com',
            'password' => bcrypt('user123'),
            'level' => 'user',
        ]);
        user::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin123'),
            'level' => 'admin',
        ]);
    }
}
