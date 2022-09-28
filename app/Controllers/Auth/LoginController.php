<?php

namespace App\Controllers\Auth;

use App\Helpers\View;

class LoginController
{
    /**
     * Method index
     *
     * @return void
     */
    public function index()
    {
        return (new View)->render("auth/login", []);
    }

    public function store($request)
    {
        echo '<pre>';
        print_r($request);
        echo '</pre>';
        exit;
    }
}
