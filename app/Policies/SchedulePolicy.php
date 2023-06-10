<?php

namespace App\Policies;

use App\Models\User;
use HusamTariq\FilamentDatabaseSchedule\Models\Schedule;
use Illuminate\Auth\Access\HandlesAuthorization;

class SchedulePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        return $user->can('view_any_schedule');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \HusamTariq\FilamentDatabaseSchedule\Models\Schedule  $schedule
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Schedule $schedule)
    {
        return $user->can('view_schedule');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->can('create_schedule');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \HusamTariq\FilamentDatabaseSchedule\Models\Schedule  $schedule
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Schedule $schedule)
    {
        return $user->can('update_schedule');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \HusamTariq\FilamentDatabaseSchedule\Models\Schedule  $schedule
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Schedule $schedule)
    {
        return $user->can('delete_schedule');
    }

    /**
     * Determine whether the user can bulk delete.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function deleteAny(User $user)
    {
        return $user->can('delete_any_schedule');
    }

    /**
     * Determine whether the user can permanently delete.
     *
     * @param  \App\Models\User  $user
     * @param  \HusamTariq\FilamentDatabaseSchedule\Models\Schedule  $schedule
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Schedule $schedule)
    {
        return $user->can('force_delete_schedule');
    }

    /**
     * Determine whether the user can permanently bulk delete.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDeleteAny(User $user)
    {
        return $user->can('force_delete_any_schedule');
    }

    /**
     * Determine whether the user can restore.
     *
     * @param  \App\Models\User  $user
     * @param  \HusamTariq\FilamentDatabaseSchedule\Models\Schedule  $schedule
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Schedule $schedule)
    {
        return $user->can('restore_schedule');
    }

    /**
     * Determine whether the user can bulk restore.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restoreAny(User $user)
    {
        return $user->can('restore_any_schedule');
    }

    /**
     * Determine whether the user can replicate.
     *
     * @param  \App\Models\User  $user
     * @param  \HusamTariq\FilamentDatabaseSchedule\Models\Schedule  $schedule
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function replicate(User $user, Schedule $schedule)
    {
        return $user->can('replicate_schedule');
    }

    /**
     * Determine whether the user can reorder.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function reorder(User $user)
    {
        return $user->can('reorder_schedule');
    }

}
