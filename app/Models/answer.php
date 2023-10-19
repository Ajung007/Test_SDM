<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class answer extends Model
{
    use HasFactory;
    protected $fillable = ['questions_id', 'jawaban'];

    public function question()
    {
        return $this->belongsTo(question::class);
    }
}