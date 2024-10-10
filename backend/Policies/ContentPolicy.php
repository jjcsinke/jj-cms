<?php

namespace JJCS\CMS\Policies;

use Illuminate\Contracts\Auth\Authenticatable;
use JJCS\CMS\Models\Content;

class ContentPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(Authenticatable $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(Authenticatable $user, Content $content): bool
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(Authenticatable $user): bool
    {
        return $user->hasPermissionTo('cms.create');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(Authenticatable $user, Content $content): bool
    {

        return $user->hasPermissionTo('cms.update');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(Authenticatable $user, Content $content): bool
    {
        return $user->hasPermissionTo('cms.delete');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(Authenticatable $user, Content $content): bool
    {
        return $user->hasPermissionTo('cms.restore');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(Authenticatable $user, Content $content): bool
    {
        return $user->hasPermissionTo('cms.force-delete');
    }
}
