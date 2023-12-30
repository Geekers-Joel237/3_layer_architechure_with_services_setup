<?php

namespace App\User\Domain\Repository;

use App\User\Data\Models\User;

interface UserRepository
{

    public function byEmail(string $email): ?User;
}
