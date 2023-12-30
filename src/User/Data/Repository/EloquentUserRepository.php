<?php

namespace App\User\Data\Repository;

use App\User\Data\Models\User;
use App\User\Domain\Repository\UserRepository;

class EloquentUserRepository implements UserRepository
{

    public function byEmail(string $email): ?User
    {
        return User::whereEmail($email)->whereIsDeleted(false)->first();
    }
}
