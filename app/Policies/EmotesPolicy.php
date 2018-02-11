<?php

namespace App\Policies;

use App\User;
use App\Emote;
use Illuminate\Auth\Access\HandlesAuthorization;

class EmotesPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the emote.
     *
     * @param  \App\User  $user
     * @param  \App\Emote  $emote
     * @return mixed
     */
    public function view(User $user, Emote $emote)
    {
        //
    }

    /**
     * Determine whether the user can create emotes.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return auth()->id() == $user->id;
    }

    /**
     * Determine whether the user can update the emote.
     *
     * @param  \App\User  $user
     * @param  \App\Emote  $emote
     * @return mixed
     */
    public function update(User $user, Emote $emote)
    {
        return auth()->id() == $user->id;
    }

    /**
     * Determine whether the user can delete the emote.
     *
     * @param  \App\User  $user
     * @param  \App\Emote  $emote
     * @return mixed
     */
    public function delete(User $user, Emote $emote)
    {
        //
    }
}
