<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\SettingApp;

class SettingAppSeeder extends Seeder
{
    public function run()
    {
        SettingApp::create([
            'nama_aplikasi' => 'Aplikasi Management Client',
            'nama_perusahaan' => 'Kimoon',
            'deskripsi_perusahaan' => '',
            'no_telpon' => '083874731480',
            'email' => 'admin@gmail.com',
            'alamat' => 'Perum SAI Residance',
            'logo' => '',
            'favicon' => '',
            'facebook' => '',
            'instagram' => '',
            'tiktok' => '',
            'x' => '',
        ]);
    }
}
