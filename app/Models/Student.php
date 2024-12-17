<?php

namespace App\Models;

use App\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Student extends Model
{
    /** @use HasFactory<\Database\Factories\StudentFactory> */
    use HasFactory, UuidTrait;
    
    protected $uuidColumn= 'studentId';

    protected $hidden = [
        'id',
        'created_at',
        'updated_at'
    ];


    public function subject(): BelongsToMany 
    {
        return $this->belongsToMany(subject::class);
    }
}
