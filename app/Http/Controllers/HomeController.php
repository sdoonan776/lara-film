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

        // foreach ($films as $film) {
        //     dd($film->title);
        // }
        return view('pages.home', [
            'films' => $films
        ]);
    }
}
