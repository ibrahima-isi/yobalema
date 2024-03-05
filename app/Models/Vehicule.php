<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @mixin IdeHelperVehicule
 */
class Vehicule extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function chauffeur(): BelongsTo
    {
        return $this->belongsTo(Chauffeur::class);
    }


}
