<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Chauffeur extends Model
{
    use HasFactory;
    protected $guarded = [];

    /**
     * @return HasOne
     */
    public function vehicule(): HasOne
    {
        return $this->hasOne(Vehicule::class);
    }

    /**
     * @return HasMany
     */
    public function locations(): HasMany
    {
        return $this -> hasMany(Location::class);
    }
}
