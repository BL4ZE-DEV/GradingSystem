<?php

namespace App\Models;

use App\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grades extends Model
{
    /** @use HasFactory<\Database\Factories\GradesFactory> */
    use HasFactory, UuidTrait;

    protected $uuidcolumn= 'gradeId';
}