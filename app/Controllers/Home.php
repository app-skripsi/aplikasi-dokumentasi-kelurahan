<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function dashboard()
    {
        return view('index');
    }
}
