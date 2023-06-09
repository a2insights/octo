<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Octo\Features\Features;

class WebhookPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        $features = app(Features::class);

        return $user->hasRole('super_admin') || $features->webhook;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user)
    {
        $features = app(Features::class);

        return $user->hasRole('super_admin') || $features->webhook;
    }

    /**
     * Determine whether the user can create models.
     *
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        $features = app(Features::class);

        return $user->hasRole('super_admin') || $features->webhook;
    }
}
