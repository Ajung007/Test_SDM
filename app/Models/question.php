<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class question extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['kategoris_id', 'pertanyaan'];

    public function category()
    {
        return $this->belongsTo(Kategori::class);
    }

    public function questionOptions()
    {
        return $this->hasMany(answer::class);
    }

}