<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin IdeHelperContrat
 */
class Contrat extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function chauffeur()
    {
        return $this->belongsTo(Chauffeur::class);
    }

}
