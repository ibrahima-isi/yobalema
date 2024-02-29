<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin IdeHelperRoleUser
 */
class RoleUser extends Model
{
    use HasFactory;

    protected $table = 'role_users';

    protected $guarded = [];

    public function user()
    {
        return $this->hasMany(User::class);
    }
}
