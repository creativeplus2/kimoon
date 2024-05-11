<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = ['kode_member', 'nama_member', 'email', 'no_telpon', 'type_user', 'provinsi_id', 'kabkot_id', 'kecamatan_id', 'kelurahan_id', 'zip_code', 'alamat_member', 'no_ktp', 'photo_ktp', 'password', 'status_member'];

    /**
     * The attributes that should be cast.
     *
     * @var string[]
     */
    protected $casts = ['kode_member' => 'string', 'nama_member' => 'string', 'email' => 'string', 'no_telpon' => 'string', 'zip_code' => 'string', 'alamat_member' => 'string', 'no_ktp' => 'string', 'photo_ktp' => 'string', 'password' => 'string', 'created_at' => 'datetime:d/m/Y H:i', 'updated_at' => 'datetime:d/m/Y H:i'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var string[]
    */
    protected $hidden = ['password'];
	
	public function province()
	{
		return $this->belongsTo(\App\Models\Province::class);
	}	
	public function kabkot()
	{
		return $this->belongsTo(\App\Models\Kabkot::class);
	}	
	public function kecamatan()
	{
		return $this->belongsTo(\App\Models\Kecamatan::class);
	}	
	public function kelurahan()
	{
		return $this->belongsTo(\App\Models\Kelurahan::class);
	}
}
