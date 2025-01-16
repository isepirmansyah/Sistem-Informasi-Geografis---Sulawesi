<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ThematicData extends Model
{
    protected $fillable = [
        'province_id', 'area', 'population', 'year', 'population_density',
        'unemployment_rate', 'human_development_index', 'per_capita_income',
        'poor_population', 'schools', 'hospitals', 'health_centers'
    ];

    public function province()
    {
        return $this->belongsTo(Province::class);
    }
}