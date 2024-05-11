<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = ['kode_produk', 'nama_produk', 'sku', 'sub_kategori_id', 'produk_unit_id', 'harga_umum', 'harga_reseller', 'harga_subdis', 'harga_distributor', 'deksripsi_produk'];

    /**
     * The attributes that should be cast.
     *
     * @var string[]
     */
    protected $casts = ['kode_produk' => 'string', 'nama_produk' => 'string', 'sku' => 'string', 'harga_umum' => 'integer', 'harga_reseller' => 'integer', 'harga_subdis' => 'integer', 'harga_distributor' => 'integer', 'deksripsi_produk' => 'string', 'created_at' => 'datetime:d/m/Y H:i', 'updated_at' => 'datetime:d/m/Y H:i'];

    
	
	public function sub_category()
	{
		return $this->belongsTo(\App\Models\SubCategory::class);
	}	
	public function product_unit()
	{
		return $this->belongsTo(\App\Models\ProductUnit::class);
	}
}
