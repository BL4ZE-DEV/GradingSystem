<?php

namespace App\Models;

use App\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Teacher extends Model
{
    /** @use HasFactory<\Database\Factories\TeacherFactory> */
    use HasFactory,UuidTrait;


    protected $fillable = [
        'userId'
    ];

    protected $hidden = [
        'id',
        'created_at',
        'updated_at'
    ];

    protected $uuidColumn = 'teacherId';

    public function subject():HasOne
    {
        return $this->hasOne(Subject::class, 'teacherId');
    }
}
