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
        Schema::create('setting_apps', function (Blueprint $table) {
            $table->id();
            $table->string('nama_aplikasi');
            $table->string('nama_perusahaan');
            $table->text('deskripsi_perusahaan');
            $table->string('no_telpon');
            $table->string('email');
            $table->text('alamat');
            $table->string('logo', 200);
            $table->string('favicon', 200);
            $table->string('facebook');
            $table->string('instagram');
            $table->string('tiktok');
            $table->string('x');
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
        Schema::dropIfExists('setting_apps');
    }
};
