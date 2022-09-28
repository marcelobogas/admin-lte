<?php

use App\Core\Database;
use App\Core\Enviroments;

require_once __DIR__ . "/vendor/autoload.php";

/* carrega as variáveis de ambiente para o projeto */
Enviroments::load(__DIR__);

/* verifica conexão com o banco de dados */
Database::verifyConnection();

/* include do gerenciador de rotas */
include __DIR__ . "/routes/web.php";
