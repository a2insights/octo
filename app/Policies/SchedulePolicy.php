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
     */
    public function viewAny(User $user): bool
    {
        return $user->can('view_any_schedule');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Schedule $schedule): bool
    {
        return $user->can('view_schedule');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('create_schedule');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Schedule $schedule): bool
    {
        return $user->can('update_schedule');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Schedule $schedule): bool
    {
        return $user->can('delete_schedule');
    }

    /**
     * Determine whether the user can bulk delete.
     */
    public function deleteAny(User $user): bool
    {
        return $user->can('delete_any_schedule');
    }

    /**
     * Determine whether the user can permanently delete.
     */
    public function forceDelete(User $user, Schedule $schedule): bool
    {
        return $user->can('force_delete_schedule');
    }

    /**
     * Determine whether the user can permanently bulk delete.
     */
    public function forceDeleteAny(User $user): bool
    {
        return $user->can('force_delete_any_schedule');
    }

    /**
     * Determine whether the user can restore.
     */
    public function restore(User $user, Schedule $schedule): bool
    {
        return $user->can('restore_schedule');
    }

    /**
     * Determine whether the user can bulk restore.
     */
    public function restoreAny(User $user): bool
    {
        return $user->can('restore_any_schedule');
    }

    /**
     * Determine whether the user can replicate.
     */
    public function replicate(User $user, Schedule $schedule): bool
    {
        return $user->can('replicate_schedule');
    }

    /**
     * Determine whether the user can reorder.
     */
    public function reorder(User $user): bool
    {
        return $user->can('reorder_schedule');
    }
}
