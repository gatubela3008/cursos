<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Description extends Model
{
    use HasFactory;

    protected $fillable = [
        'url',
        'resourseable_id',
        'resourseable_type',
    ];

    public function lesson()
    {
        return $this->belongsTo('App\Models\Lesson');
    }
}
