<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reaction extends Model
{
    use HasFactory;

    const LIKE = 1;
    const DISLIKE = 2;

    protected $fillable = [
        'value',
        'user_id',
        'reactionable_id',
        'reactoinable_type',
    ];

    public function reactionable () {
        return $this->morphTo();
    }

    public function user() {
        return $this->belongsTo('App\Models\User');
    }

}
