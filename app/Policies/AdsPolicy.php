<?php

namespace App\Policies;

use App\Models\Ads;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AdsPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Ads  $ads
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Ads $ads)
    {
        return $user->id === $ads->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Ads  $ads
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Ads $ads)
    {
        return $user->id === $ads->user_id;
    }
}
