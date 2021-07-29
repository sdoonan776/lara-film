<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class WatchListController extends Controller
{

    /**
     * Adds a movie to a logged in users watch list
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {


        return back()->with('success', 'movie added successfully');
    }
}
