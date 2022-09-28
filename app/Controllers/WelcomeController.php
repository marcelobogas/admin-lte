<?php

namespace App\Controllers;

use App\Helpers\View;

class WelcomeController
{
    public function index()
    {
        return (new View)->render("welcome");
    }
}
