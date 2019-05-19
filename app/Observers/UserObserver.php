<?php

namespace App\Observers;

use App\User;

class UserObserver
{
    /**
     * Handle the User "created" event.
     *
     * @param  \App\User  $user
     * @return void
     */
    public function created(User $user)
    {
        //
    }

    /**
     * Handle the User "updated" event.
     *
     * @param  \App\User  $user
     * @return void
     */
    public function updated(User $user)
    {
        //
    }

    /**
     * Handle the User "deleted" event.
     *
     * @param  \App\User  $user
     * @return void
     */
    public function deleted(User $user)
    {
        
    }
    /**
     * Handle the User "deleting" event.
     * Observe this model being deleted and delete the child activities
     * @param  \App\User  $user
     * @return void
     */
    public function deleting(User $user)
    {
    	$user->posts->each(function ($post) {
            $post->delete();
        });
        $user->comments->each(function ($comment) {
            $comment->delete();
        });
    }
}