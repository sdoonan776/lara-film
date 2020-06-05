<?php

namespace Tests\Feature;

use Mockery;
use Tests\TestCase;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use App\Contracts\UserRepositoryInterface;
use App\Http\Controllers\Site\UserController;

class UserRepositoryTest extends TestCase
{
    /** @test */
    public function test_all_method_binds_users_from_repository()
    {
        $repoMock = Mockery::mock(UserRepositoryInterface::class);

        $repoMock->shouldReceive('all')->once()->andReturn(['full_name' => 'user']);
        $app = App::instance(UserRepositoryInterface::class, $repoMock);

        $result = $app->all();
    
        $this->assertArrayHasKey('full_name', $result);
    
    }
}
