<?php

namespace App\Controllers\Auth;

use App\Http\Request;

class CreateController
{
    public function index()
    {
        echo "<h1>Página para Criar novo Usuário</h1>";
    }

    public function store(Request $request)
    {
        echo '<pre>';
        print_r($request);
        echo '</pre>';
        exit;
    }
}
