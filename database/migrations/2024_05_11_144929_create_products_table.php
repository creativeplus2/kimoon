<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('kode_produk', 50);
			$table->string('nama_produk', 150);
			$table->string('sku', 150);
			$table->foreignId('sub_kategori_id')->nullable()->constrained('sub_categories')->restrictOnUpdate()->nullOnDelete();
			$table->foreignId('produk_unit_id')->nullable()->constrained('product_units')->restrictOnUpdate()->nullOnDelete();
			$table->integer('harga_umum');
			$table->integer('harga_reseller');
			$table->integer('harga_subdis');
			$table->integer('harga_distributor');
			$table->text('deksripsi_produk');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};
