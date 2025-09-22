<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class PostPolicy
{
    use HandlesAuthorization;
    /**
     * Determine whether the user can view any models.
     */

    public function before(User $user, string $ability){
        if($user->isAdmin()) return true;
    }

    public function viewAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Post $post)
    {
        // if($user->isEditor() || $user->id === $post->user_id){
        //     return true;
        // }

        return true;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Post $post)
    {
        if($user->isEditor() || $user->id == $post->user_id){
            return true;
        }
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Post $post)
    {
        if($user->id == $post->user_id){
            return true;
        }   
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Post $post)
    {
        if($user->id == $post->user_id){
            return true;
        } 
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Post $post)
    {
        return false;
    }

    public function publish(User $user, Post $post): bool|Response
    {
        if($user->isEditor() || $user->id == $post->user_id){
            return Response::allow();
        }
        return Response::deny('You must be an editor to publish posts.');
    }
}
