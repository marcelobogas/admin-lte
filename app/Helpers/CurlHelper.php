<?php

namespace App\Helpers;

class CurlHelper
{

    /**
     * Método responável por executar uma requisição GET via cURL
     *
     * @param string $endPoint 
     *
     * @return array
     */
    public static function get($endPoint)
    {
        /* inicia o curl */
        $curl = curl_init();

        /* define as configurações */
        curl_setopt_array($curl, [
            CURLOPT_URL            => $endPoint,
            CURLOPT_CUSTOMREQUEST  => "GET",
            CURLOPT_RETURNTRANSFER => true,
            /* CURLOPT_ENCODING       => "",
            CURLOPT_HTTP_VERSION   => CURL_HTTP_VERSION_1_1 */
        ]);

        /* executa a requisição */
        $response = curl_exec($curl);

        curl_close($curl);

        /* imprime o erro da requisição */
        if (curl_exec($curl) === false) {
            die('Curl error: ' . curl_error($curl));
        } else {
            /* imprime o response da requisição */
            return json_decode($response, true);
        }
    }
    
    /**
     * Método responsável por executar uma requisição POST via cURL
     *
     * @param string $endPoint 
     * @param array $postVars 
     *
     * @return array
     */
    public static function post($endPoint, $postVars)
    {
        /* inicia o curl */
        $curl = curl_init();

        /* headers */
        $headers = [
            //'Autorization: Bearer 102030405060708090100',
            "Cache-Control: no-cache",
            'Content-Type: application/json'
        ];

        /* JSON */
        $json = json_encode($postVars);

        /* define as configurações */
        curl_setopt_array($curl, [
            CURLOPT_URL            => $endPoint,
            CURLOPT_CUSTOMREQUEST  => "POST",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTPHEADER     => $headers,
            CURLOPT_POSTFIELDS     => $json,
        ]);

        /* executa a requisição */
        $response = curl_exec($curl);

        /* fecha o curl */
        curl_close($curl);

        /* imprime o erro da requisição */
        if (curl_exec($curl) === false) {
            die('Curl error: ' . curl_error($curl));
        } else {
            /* imprime o response da requisição */
            return json_decode($response, true);
        }
    }
}
