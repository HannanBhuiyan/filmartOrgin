<?php

namespace App\Http\Controllers\FontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FontEntController extends Controller
{
    public function index()
    {
        return view('index');
    }
}
