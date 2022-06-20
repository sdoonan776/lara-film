<?php

namespace Tests;

use App\Models\User;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    public function createUser()
    {
        return User::create([
            'name' => 'Joe Bloggs',
            'email' => 'test@test.com',
            'password' => bcrypt('P455w0rd')
        ]);
    }
}
