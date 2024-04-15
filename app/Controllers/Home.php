<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function dashboard()
    {
        echo view('index');
    }
}
