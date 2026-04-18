<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Clicking extends Controller
{
    public function Pasta()
    {
        
        

       $token = env('SAND_TOKEN');
       $url = env('SAND_URL');
        //$token = env('APP_TOKEN');
        //$url = env('APP_URL_PASTA');

        $ch = curl_init($url);
        curl_setopt_array($ch, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTPHEADER => [
                "Authorization: $token",
                "Accept: application/vnd.api+json",
                "Content-Type: application/vnd.api+json"
            ]
        ]);

        $response = curl_exec($ch);
        curl_close($ch);

        $dados = json_decode($response, true);

        if (!isset($dados['data'])) {
            return 'Erro para trazer os dados.';
        }

        return $dados['data'];
    }


     public function Envelopes()
    {
        
        

        $token = env('SAND_TOKEN');
        $url = env('SAND_URL');
        //$token = env('APP_TOKEN');
        //$url = env('APP_URL_ENVELOPE');

        $ch = curl_init($url);
        curl_setopt_array($ch, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTPHEADER => [
                "Authorization: $token",
                "Accept: application/vnd.api+json",
                "Content-Type: application/vnd.api+json"
            ]
        ]);

        $response = curl_exec($ch);
        curl_close($ch);

        $dados = json_decode($response, true);

        if (!isset($dados['data'])) {
            return 'Erro para trazer os dados.';
        }

        return $dados['data'];
    }

    

}