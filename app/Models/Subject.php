<?php

namespace App\Models;

use App\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Subject extends Model
{
    /** @use HasFactory<\Database\Factories\SubjectFactory> */
    use HasFactory, UuidTrait;

    protected $fillable = [
        'userId'
    ];

    protected $uuidColumn = 'subjectId';

    Public function teacher():BelongsTo
    {
        return $this->belongsTo(Teacher::class);
    }


    Public function student(): BelongsToMany
    {
        return $this->belongsToMany(Student::class);
    }
}
