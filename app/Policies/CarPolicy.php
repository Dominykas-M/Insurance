<?php

namespace App\Policies;

use App\Models\Car;
use App\Models\User;

class CarPolicy
{
    public function before(User $user, string $ability): ?bool
    {
        if ($user->isAdmin()) {
            return true;
        }
        return null;
    }

    public function viewAny(User $user): bool
    {
        return true;
    }

    public function view(User $user, Car $car): bool
    {
        if ($user->isViewer()) {
            return true;
        }
        return $car->owner && $car->owner->user_id === $user->id;
    }

    public function create(User $user): bool
    {
        return true;
    }

    public function update(User $user, Car $car): bool
    {
        return $car->owner && $car->owner->user_id === $user->id;
    }

    public function delete(User $user, Car $car): bool
    {
        return $car->owner && $car->owner->user_id === $user->id;
    }
}
