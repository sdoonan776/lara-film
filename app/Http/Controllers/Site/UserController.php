<?php

namespace App\Http\Controllers\Site;

use Illuminate\View\View;
use App\Http\Controllers\Controller;
use App\Contracts\UserRepositoryInterface;

class UserController extends Controller
{
    protected $users;

    public function __construct(UserRepositoryInterface $users)
    {
        $this->users = $users;
    }

     /**
      * Displays user index
      * @return View
      */
    public function index(): View
    {
        return view('users.index', ['users' => $this->users->all()]);
    }
}
