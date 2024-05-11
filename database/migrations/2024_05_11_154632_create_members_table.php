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
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->string('kode_member', 255);
			$table->string('nama_member', 255);
			$table->string('email')->unique();
			$table->string('no_telpon', 15);
			$table->enum('type_user', ['Seller', 'Subdis', 'Distributor']);
			$table->foreignId('provinsi_id')->nullable()->constrained('provinces')->restrictOnUpdate()->nullOnDelete();
			$table->foreignId('kabkot_id')->nullable()->constrained('kabkots')->restrictOnUpdate()->nullOnDelete();
			$table->foreignId('kecamatan_id')->nullable()->constrained('kecamatans')->restrictOnUpdate()->nullOnDelete();
			$table->foreignId('kelurahan_id')->nullable()->constrained('kelurahans')->restrictOnUpdate()->nullOnDelete();
			$table->string('zip_code', 6);
			$table->text('alamat_member');
			$table->string('no_ktp', 100);
			$table->string('photo_ktp');
			$table->string('password');
			$table->enum('status_member', ['Pending', 'Approved', 'Rejected']);
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
        Schema::dropIfExists('members');
    }
};
