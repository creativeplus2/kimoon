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
            'nama_perusahaan' => 'Kimoon.id',
            'deskripsi_perusahaan' => '',
            'no_telpon' => '+62 811 9151575',
            'email' => 'hello@kimoon.id',
            'alamat' => 'Virginia Arcade blok B2 no 1, BSD,
            Tangerang Selatan
            Indonesia',
            'logo' => '',
            'favicon' => '',
            'facebook' => '',
            'instagram' => '',
            'tiktok' => '',
            'x' => '',
            'xendit_secret_key' =>'xnd_development_l5mmfkTgLJakXb0GXUWCNxd1MeVd9P7xH10IyetJmiiljOdUiXPJGAsFhnay',
        ]);
    }
}
