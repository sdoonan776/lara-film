<?php

namespace App\Http\Controllers;

use App\Models\Film;
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
        // $films = Film::all();

        // return view('pages.home', [
        //     'films' => $films
        // ]);

        return view('pages.home');
    }
}
