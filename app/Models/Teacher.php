<?php

namespace App\Models;

use App\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Teacher extends Model
{
    /** @use HasFactory<\Database\Factories\TeacherFactory> */
    use HasFactory,UuidTrait;


    protected $fillable = [
        'userId'
    ];

    protected $uuidColumn = 'teacherId';

    public function subject():HasMany
    {
        return $this->hasMany(Subject::class, 'teacherId');
    }
}
