<?php

use App\Core\Enviroments;

require_once __DIR__ . "/vendor/autoload.php";

/* include do arquivo de configuração do sistema */
include __DIR__ . "/config/app.php";

/* carrega as variáveis de ambiente para o projeto */
Enviroments::load(__DIR__);

/* include do gerenciador de rotas */
include __DIR__ . "/routes/web.php";