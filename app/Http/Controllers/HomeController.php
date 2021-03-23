<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{

    /**
     * Returns main home page
     *
     * @return View
     */
    public function __invoke()
    {
        return view('pages.index');
    }
}
