<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Http\Controllers\Controller;
use App\Contracts\UserRepositoryInterface;

class UserController extends Controller
{

    public function __construct()
    {

    }

     /**
      * Displays user index
      * @return View
      */
    public function index(): View
    {
        $user = auth()->user();
        return view('user.index',
            ['user' => $user]
        );
    }

    /**
      * Displays user index
      * @return View
      */
    public function edit(): View
    {
        return view('user.edit');
    }
}
