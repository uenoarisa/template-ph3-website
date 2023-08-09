<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Questions extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $fillable = ['text','supplement','quiz_id'];
    protected $attributes = [
        'image' => '画像なし'
    ];

    public function choices()
    {
        return $this->hasMany(choices::class,'question_id');
    }
}
