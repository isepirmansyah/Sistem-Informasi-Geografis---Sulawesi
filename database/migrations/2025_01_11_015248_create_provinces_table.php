<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('provinces', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('alt_name');
            $table->decimal('latitude', 10, 7);
            $table->decimal('longitude', 10, 7);
            $table->timestamps();
        });

        // Insert initial data
        DB::table('provinces')->insert([
            ['id' => 1, 'name' => 'SULAWESI UTARA', 'alt_name' => 'SULAWESI UTARA', 'latitude' => '-1.6555700', 'longitude' => '124.0901500', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 2, 'name' => 'SULAWESI TENGAH', 'alt_name' => 'SULAWESI TENGAH', 'latitude' => '-1.6937800', 'longitude' => '120.8088600', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3, 'name' => 'SULAWESI SELATAN', 'alt_name' => 'SULAWESI SELATAN', 'latitude' => '-3.6446700', 'longitude' => '119.9471900', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 4, 'name' => 'SULAWESI TENGGARA', 'alt_name' => 'SULAWESI TENGGARA', 'latitude' => '-3.5491200', 'longitude' => '121.7279600', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 5, 'name' => 'GORONTALO', 'alt_name' => 'GORONTALO', 'latitude' => '-1.7186200', 'longitude' => '122.4555900', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 6, 'name' => 'SULAWESI BARAT', 'alt_name' => 'SULAWESI BARAT', 'latitude' => '0.7186200', 'longitude' => '122.4555900', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('provinces');
    }
};
