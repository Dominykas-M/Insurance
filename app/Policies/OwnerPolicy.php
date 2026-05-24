<?php

namespace App\Policies;

use App\Models\Owner;
use App\Models\User;

class OwnerPolicy
{
    /**
     * Runs before every other check.
     * Admin is allowed to do everything.
     */
    public function before(User $user, string $ability): ?bool
    {
        if ($user->isAdmin()) {
            return true;
        }
        return null; // fall through to the specific checks below
    }

    // Any logged-in user can open the owners list (we filter the rows in the controller)
    public function viewAny(User $user): bool
    {
        return true;
    }

    // Read-only user can view any owner; regular user only their own
    public function view(User $user, Owner $owner): bool
    {
        if ($user->isViewer()) {
            return true;
        }
        return $owner->user_id === $user->id;
    }

    // Both regular and read-only users can create owners (assigned to themselves)
    public function create(User $user): bool
    {
        return true;
    }

    // Only the user who owns the record can edit/delete it
    public function update(User $user, Owner $owner): bool
    {
        return $owner->user_id === $user->id;
    }

    public function delete(User $user, Owner $owner): bool
    {
        return $owner->user_id === $user->id;
    }
}
