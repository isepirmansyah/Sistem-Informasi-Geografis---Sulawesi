<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    protected $fillable = ['name', 'alt_name', 'latitude', 'longitude', 'image'];

    public function thematicData()
    {
        return $this->hasMany(ThematicData::class);
    }
}
