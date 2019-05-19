<?php

namespace App\Observers;

use App\Post;

class PostObserver
{
    /**
     * Handle the Post "created" event.
     *
     * @param  \App\Post  $post
     * @return void
     */
    public function created(Post $post)
    {
        //
    }

    /**
     * Handle the Post "updated" event.
     *
     * @param  \App\Post  $post
     * @return void
     */
    public function updated(Post $post)
    {
        //
    }

    /**
     * Handle the Post "deleted" event.
     *
     * @param  \App\Post  $post
     * @return void
     */
    public function deleted(Post $post)
    {
        
    }
    /**
     * Handle the Post "deleting" event.
     * Observe this model being deleted and delete the child activities
     * @param  \App\Post  $post
     * @return void
     */
    public function deleting(Post $post)
    {
    	$post->comments->each(function($comment)
        {
            $comment->delete();
        });
    }
}