<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Questions extends Model
{
    use HasFactory;
    protected $fillable = ['image', 'text','supplement','quiz_id'];

    public function choices()
    {
        return $this->hasMany(choices::class,'question_id');
    }
}
