<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('setting_apps', function (Blueprint $table) {
            $table->json('about')->after('x');
            $table->json('membertable')->after('x');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('setting_apps', function (Blueprint $table) {
            $table->dropColumn('about');
            $table->dropColumn('membertable');
        });
    }
};
