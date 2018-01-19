<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Category extends Model
{
    use Sluggable;

    // У одной категории могут быть много ПОСТОВ
    public function posts() {
        return $this->hasMany(Post::class);
    }

    // Seo url
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
