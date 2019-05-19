<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Post;
use App\User;

class Comment extends Model
{
	/**
    * Define an inverse one-to-many relationship with App\Post.
    * @return \App\Post
    */

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    /**
    * Define an inverse one-to-many relationship with App\User.
    * @return \App\User
    */
   
    public function user()
    {
        return $this->belongsTo(User::class);
    }

     /**
    * Get all Comments
    * @return array
    */
    public function getAllComments()
    {
    	return $this->get();
    }
}