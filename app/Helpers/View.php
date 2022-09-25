<?php

namespace App\Helpers;

class View
{    
    /**
     * Método construtor da classe
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
        
        
    /**
     * Método responsável por renderizar uma página
     * utilizando o conceito template engine através do TWIG
     *
     * @param string $pathFile 
     * @param $data $data 
     *
     * @return strig
     */
    public function render($pathFile, $data = [])
    {   
        /* envia para a view as configurações padrão do sistema */
        $params = [
            'assets'  => APP_ASSETS,
            'vendor'  => APP_VENDOR,
            'storage' => APP_STORAGE,
            'data'    => $data
        ];

        $loader = new \Twig\Loader\FilesystemLoader(__DIR__ . "/../../resources/views");
        $twig = new \Twig\Environment($loader);
        $template = $twig->load($pathFile . ".html");
        $content = $template->render($params);

        echo $content;
    }
}
