<?php

namespace App\Models;

use App\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Role extends Model
{
    /** @use HasFactory<\Database\Factories\RoleFactory> */
    use HasFactory, UuidTrait;

    protected $uuidColumn = 'roleId';


    public function user(): HasMany
    {
        return $this->hasMany(User::class, 'userId');
    }
}
