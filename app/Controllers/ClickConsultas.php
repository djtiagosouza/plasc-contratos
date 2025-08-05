<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class ClickConsultas extends Controller
{
    public function Envelopes()
    {
        $envelopeId = $this->request->getPost("envelopeId");
        if (!$envelopeId) {
            return 'ID do envelope não informado.';
        }

        $token = $envelopeId;
        $url = "https://sandbox.clicksign.com/api/v3/envelopes/{$envelopeId}/requirements";

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

        $data = json_decode($response, true);

        if (!isset($data['data'])) {
            return 'Erro ao buscar signatários.';
        }

        return view('click_env', ['requisitos' => $data['data']]);
    }

     public function Signatarios()
    {
         $envelopeId = $this->request->getPost("envelopeId");
        if (!$envelopeId) {
            return 'ID do envelope não informado.';
        }
        $apiUrl = "https://sandbox.clicksign.com/api/v3/envelopes/$envelopeId/signers";
        $token = '9180ce47-c7be-4714-8657-b46c550cd203';

        $curl = curl_init($apiUrl);
        curl_setopt_array($curl, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTPHEADER => [
                "Authorization: $token",
                "Accept: application/vnd.api+json",
                "Content-Type: application/vnd.api+json"
            ]
        ]);

        $response = curl_exec($curl);
        $httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        curl_close($curl);

        if ($httpCode !== 200) {
            return $this->response->setStatusCode($httpCode)->setJSON(['error' => 'Erro ao buscar signatários']);
        }

        $data = json_decode($response, true);

        return view('click_pessoas', ['signers' => $data['data']]);
    }

    public function Requisitos()
    {
         $envelopeId = $this->request->getPost("envelopeId");
        if (!$envelopeId) {
            return 'ID do envelope não informado.';
        }
        $apiUrl = "https://sandbox.clicksign.com/api/v3/envelopes/$envelopeId/signers";
        $token = '9180ce47-c7be-4714-8657-b46c550cd203';

        $curl = curl_init($apiUrl);
        curl_setopt_array($curl, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTPHEADER => [
                "Authorization: $token",
                "Accept: application/vnd.api+json",
                "Content-Type: application/vnd.api+json"
            ]
        ]);

        $response = curl_exec($curl);
        $httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        curl_close($curl);

        if ($httpCode !== 200) {
            return $this->response->setStatusCode($httpCode)->setJSON(['error' => 'Erro ao buscar signatários']);
        }

        $data = json_decode($response, true);

        return view('click_pessoas', ['signers' => $data['data']]);
    }




}