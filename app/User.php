<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Laravel\Lumen\Auth\Authorizable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use App\Comment;
use App\Post;

class User extends Model implements AuthenticatableContract, AuthorizableContract
{
    use Authenticatable, Authorizable;

   
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];

    /**
     * Define a one-to-many relationship with App\Post
     * @return \App\Post
     */
    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    /**
     * Define a one-to-many relationship with App\Comment
     * @return \App\Comment
     */
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    
    /** 
    * Delete User with Id and related Tables and return array of username and email
    *
    * @param int
    * @return array
    */
    public function deleteUser($id)
    {
        $user=$this->find($id);
        $userDetails=['name'=>$user->name, 'email'=>$user->email];
        $user->delete();
        return $userDetails;
    }


}
