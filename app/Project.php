<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{

    protected $fillable = [
        'title', 'description'
    ];

    public function blogs(){

        return $this->hasMany(Blog::class);
    }

    public function addBlog($blog){

        $this->blogs()->create($blog);
    }
}
