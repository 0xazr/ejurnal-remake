<?php

namespace App\Controllers\Editor;

use App\Controllers\BaseController;

class Home extends BaseController
{
    public function index()
    {
        return view('pages/editor/home');
    }
}