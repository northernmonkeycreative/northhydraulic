<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NoaccessController extends Controller
{
    /**
     * If not Admin Show No Access.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function __invoke()
    {
        return view('noaccess');
    }
}
