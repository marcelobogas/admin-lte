<?php

namespace App\Controllers\Pages;

use App\Helpers\View;

class HomeController
{
    public function index()
    {
        return (new View)->render("pages/index3", []);
    }
}
