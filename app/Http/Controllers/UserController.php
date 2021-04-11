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
        return view('user.index');
    }
}
