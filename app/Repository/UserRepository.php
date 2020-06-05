<?php
namespace App\Repository;

use App\Models\User;
use UserRepositoryInterface;

class UserRepository implements UserRepositoryInterface
{
    /**
     * Gets all users
     * @return array
     */
    public function all()
    {
        return User::all()->toArray();
    } 
}
