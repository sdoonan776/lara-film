<?php

namespace App\Http\Controllers\Site;

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
        return view('pages.home');
    }
}
