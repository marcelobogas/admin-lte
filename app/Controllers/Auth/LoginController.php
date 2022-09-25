<?php

namespace App\Controllers\Auth;

use App\Helpers\View;
use App\Http\Request;

class LoginController
{
    /**
     * Method index
     *
     * @return void
     */
    public function index()
    {
        $data = [
            'date' => date('d/m/Y')
        ];

        return (new View)->render("auth/login", $data);
    }

    /**
     * Method store
     *
     * @param Request $request [explicite description]
     *
     * @return void
     */
    public function store(Request $request)
    {
        echo '<pre>';
        print_r($request);
        echo '</pre>';
        exit;
    }
}
