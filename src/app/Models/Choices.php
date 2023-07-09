<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Choices extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'question_id', 'text','is_correct'];
}
