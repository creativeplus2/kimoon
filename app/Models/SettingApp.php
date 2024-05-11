<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SettingApp extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'nama_aplikasi', 'nama_perusahaan', 'deskripsi_perusahaan', 'no_telpon', 'email',
        'alamat', 'logo', 'favicon', 'facebook', 'instagram', 'tiktok', 'x'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var string[]
     */
}
