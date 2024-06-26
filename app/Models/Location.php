<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @mixin IdeHelperLocation
 */
class Location extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function chauffeur()
    {
        return $this -> belongsTo(Chauffeur::class);
    }

    public function vehicule() : BelongsTo
    {
        return $this -> belongsTo(Vehicule::class);
    }


}
