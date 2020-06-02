<?php

namespace App\Http\Controllers\Site;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    
    public function __construct()
    {
        
    }

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
