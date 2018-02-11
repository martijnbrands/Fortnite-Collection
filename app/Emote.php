<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Emote extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'rarity',
        'vbucks',
        'thumbnail',
        'video'
    ];

    public function getThumbnailAttribute($file)
    {
        return "/images/emotes/" . $file;
    }
}
