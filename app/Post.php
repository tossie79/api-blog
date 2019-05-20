<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Comment;
use App\User;

class Post extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id', 'user_id', 'title'];
    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden   = ['created_at', 'updated_at'];

      
    /**
     * Define a one-to-many relationship with App\Comment
     * @return \App\Comment
     */
    public function comments()
    {
        return $this->hasMany(Comment::class);
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
    * Get all Posts
    * @return array
    */
    public function getAllPosts()
    {
    	return $this->get();
    }
    
    /**
    * Get Post with Id
    * @param int
    * @return array
    */
    public function getPost($id)
    {
    	$post = $this->join('users', 'users.id', '=', 'posts.user_id')
            ->select('posts.id', 'posts.title','users.name as username','posts.content')
            ->with(['comments:id,post_id,text'])
            ->find($id);
    	return $post;
    }
    
}