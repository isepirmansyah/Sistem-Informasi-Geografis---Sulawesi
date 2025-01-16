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
        Schema::create('thematic_data', function (Blueprint $table) {
            $table->id();
            $table->foreignId('province_id')->constrained()->onDelete('cascade');
            $table->decimal('area', 10, 2);
            $table->integer('population');
            $table->integer('year');
            $table->integer('population_density');
            $table->decimal('unemployment_rate', 5, 2);
            $table->decimal('human_development_index', 5, 2);
            $table->decimal('per_capita_income', 10, 2);
            $table->integer('poor_population');
            $table->integer('schools');
            $table->integer('hospitals');
            $table->integer('health_centers');
            $table->timestamps();
        });

        // Insert initial data
        DB::table('thematic_data')->insert([
            ['id' => 1, 'province_id' => 1, 'area' => 12215.44, 'population' => 1227794, 'year' => 2024, 'population_density' => 100, 'unemployment_rate' => 3.13, 'human_development_index' => 71.23, 'per_capita_income' => 42.35, 'poor_population' => 178, 'schools' => 3463, 'hospitals' => 38, 'health_centers' => 93, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 2, 'province_id' => 2, 'area' => 15377.00, 'population' => 2659543, 'year' => 2024, 'population_density' => 172, 'unemployment_rate' => 5.98, 'human_development_index' => 75.03, 'per_capita_income' => 64.13, 'poor_population' => 187, 'schools' => 6836, 'hospitals' => 112, 'health_centers' => 198, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3, 'province_id' => 3, 'area' => 46717.00, 'population' => 9460344, 'year' => 2024, 'population_density' => 151, 'unemployment_rate' => 4.19, 'human_development_index' => 74.05, 'per_capita_income' => 69.70, 'poor_population' => 736, 'schools' => 11592, 'hospitals' => 123, 'health_centers' => 469, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 4, 'province_id' => 4, 'area' => 38067.70, 'population' => 2785517, 'year' => 2024, 'population_density' => 73, 'unemployment_rate' => 3.09, 'human_development_index' => 73.48, 'per_capita_income' => 64.09, 'poor_population' => 320, 'schools' => 3545, 'hospitals' => 44, 'health_centers' => 293, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 5, 'province_id' => 5, 'area' => 61841.29, 'population' => 3154499, 'year' => 2024, 'population_density' => 51, 'unemployment_rate' => 2.94, 'human_development_index' => 71.56, 'per_capita_income' => 112.46, 'poor_population' => 380, 'schools' => 7836, 'hospitals' => 42, 'health_centers' => 215, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 6, 'province_id' => 6, 'area' => 16594.75, 'population' => 1460753, 'year' => 2024, 'population_density' => 88, 'unemployment_rate' => 2.68, 'human_development_index' => 68.20, 'per_capita_income' => 39.53, 'poor_population' => 162, 'schools' => 3610, 'hospitals' => 15, 'health_centers' => 98, 'created_at' => now(), 'updated_at' => now()],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('thematic_data');
    }
};
