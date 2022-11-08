<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resource extends Model
{
    use HasFactory;

    protected $fillable = [
        'url',
        'resourseable_id',
        'resourseable_type',
    ];

    public function resourceable () {
        return $this->morphTo();
    }
}
