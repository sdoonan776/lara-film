<?php
namespace App\Contracts;

use App\Models\User;

interface UserRepositoryInterface 
{
    /**
     * Gets all users
     *
     * @return array
     */
    public function all();
}