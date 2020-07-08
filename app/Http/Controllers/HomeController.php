<?php

namespace App\Http\Controllers;

use App\Models\Film;
use Illuminate\View\View;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{

    /**
     * Renders main home page
     *
     * @return View
     */
    public function __invoke(): View
    {
        $films = Film::all();

        return view('pages.home', [
            'films' => $films
        ]);
    }
}
