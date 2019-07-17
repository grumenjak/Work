<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;


class Post extends Model
{
    protected $guarded = ['id'];

    //$post->user
    //dohvati usera koji je kreirao post
    public function user(){
        return $this->belongsto(User::class);
    }

    //https://github.com/cviebrock/eloquent-sluggable
    //Updating your Eloquent Models

    use Sluggable;

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
