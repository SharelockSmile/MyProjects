<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function test()
    {
        return view("test");
    }
    public function lisence()
    {
        return "This is lisence.";
    }
}
