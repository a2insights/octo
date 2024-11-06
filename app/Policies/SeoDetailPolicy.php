<?php

namespace App\Policies;

use App\Models\User;
use Firefly\FilamentBlog\Models\SeoDetail;
use Illuminate\Auth\Access\HandlesAuthorization;

class SeoDetailPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('view_any_seo::detail');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, SeoDetail $seoDetail): bool
    {
        return $user->can('view_seo::detail');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('create_seo::detail');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, SeoDetail $seoDetail): bool
    {
        return $user->can('update_seo::detail');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, SeoDetail $seoDetail): bool
    {
        return $user->can('delete_seo::detail');
    }

    /**
     * Determine whether the user can bulk delete.
     */
    public function deleteAny(User $user): bool
    {
        return $user->can('delete_any_seo::detail');
    }

    /**
     * Determine whether the user can permanently delete.
     */
    public function forceDelete(User $user, SeoDetail $seoDetail): bool
    {
        return $user->can('force_delete_seo::detail');
    }

    /**
     * Determine whether the user can permanently bulk delete.
     */
    public function forceDeleteAny(User $user): bool
    {
        return $user->can('force_delete_any_seo::detail');
    }

    /**
     * Determine whether the user can restore.
     */
    public function restore(User $user, SeoDetail $seoDetail): bool
    {
        return $user->can('restore_seo::detail');
    }

    /**
     * Determine whether the user can bulk restore.
     */
    public function restoreAny(User $user): bool
    {
        return $user->can('restore_any_seo::detail');
    }

    /**
     * Determine whether the user can replicate.
     */
    public function replicate(User $user, SeoDetail $seoDetail): bool
    {
        return $user->can('replicate_seo::detail');
    }

    /**
     * Determine whether the user can reorder.
     */
    public function reorder(User $user): bool
    {
        return $user->can('reorder_seo::detail');
    }
}
