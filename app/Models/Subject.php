<?php

namespace App\Models;

use App\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Subject extends Model
{
    /** @use HasFactory<\Database\Factories\SubjectFactory> */
    use HasFactory, UuidTrait;

    protected $uuidcolumn = 'subjectId';

    Public function teacher():BelongsTo
    {
        return $this->belongsTo(Teacher::class);
    }
}
