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
        /* envia para a view as configurações globais do sistema */
        $params = array_merge($this->loadConfig(), $data);

        $loader = new \Twig\Loader\FilesystemLoader(__DIR__ . "/../../resources/views");
        $twig = new \Twig\Environment($loader);
        $template = $twig->load($pathFile . ".html");
        $content = $template->render($params);

        echo $content;
    }

    /**
     * Método responsável por retornar configurações do PHP
     * para serem renderizadas nas páginas HTML
     *
     * @return array
     */
    private function loadConfig()
    {
        /* variáveis que poderão ser acessadas nas páginas HTML */
        $data = [
            'assets'   => APP_ASSETS,
            'vendor'   => APP_VENDOR,
            'storage'  => APP_STORAGE,
            'language' => APP_LANGUAGE
        ];

        return $data;
    }
}
