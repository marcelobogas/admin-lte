<?php

namespace App\Controllers\Auth;

use App\Helpers\View;
use App\Models\Users;

class CreateController
{
    /**
     * Method index
     *
     */
    public function index()
    {
        return (new View)->render("auth/create-user", []);
    }

    /**
     * Method store
     *
     * @param array $postVars
     *
     * @return void
     */
    public function store($postVars)
    {
        /**
         * Envia os dados para a Modelo
         * e recebe o ID criado para o Usuário
         */
        $userId = Users::insert($postVars);

        /* recupera os dados do Usuário com base no ID de retorno da inserção */
        $user = Users::select(null, $userId);

        /* retorna os dados do Usuário para a View */
        return (new View)->render("pages/index3", ["user" => $user]);
    }
}
