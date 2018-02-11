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

    public function getThumbAttribute()
    {
        return "/images/emotes/" . $this->thumbnail;
    }

    public static function getEnumValues($name)
    {
        $instance = new static; // create an instance of the model to be able to get the table name
        $type = \DB::select( \DB::raw('SHOW COLUMNS FROM '. \DB::getTablePrefix() . $instance->getTable() .' WHERE Field = "' . $name . '"') )[0]->Type;
        preg_match('/^enum\((.*)\)$/', $type, $matches);
        $enum = array();
        foreach(explode(',', $matches[1]) as $value){
            $v = trim( $value, "'" );
            $enum[] = $v;
        }
        return $enum;
    }
}
