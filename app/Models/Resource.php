<?php

namespace App\Models;


class Resource extends Model
{
    protected $fillable = [
        'episode_id','resource','type','resolution','ranking'
    ];

    public function episode(){
        return $this->belongsTo(Episode::class,'episode_id');
    }
}
