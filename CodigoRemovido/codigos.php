<?php
public function Templates()
    {
        $token = '53797467-a4d1-4e76-8726-47b56815d53e';
        $url = "https://app.clicksign.com/api/v3/templates/";

        $curl = curl_init($url);
        curl_setopt_array($curl, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => [
                "Authorization: $token",
                "Accept: application/vnd.api+json",
                "Content-Type: application/vnd.api+json"
            ]
        ]);

        $response = curl_exec($curl);
        curl_close($curl);

        $data2 = json_decode($response, true);

        if (!isset($data2['data'])) {
            return 'Erro ao buscar Modelo.';
        }
        $dados = $data2['data'];
        $usuarioLogado = session()->get('usuario_logado');
        $data = [
            "url_base" => base_url(),
            "titulo" => 'Plasc-contratos',
            "usuario" => $usuarioLogado,
            "requisitos" => $dados


        ];
        echo view('Includes/header', $data);
        echo view('Includes/menu', $data);
        echo view("templates", $data);
        echo view('Includes/footer', $data);
    }


     public function Requisitos()
    {
        $usuarioLogado = session()->get('usuario_logado');
        $data = [
            "url_base" => base_url(),
            "titulo" => 'Plasc-contratos',
            "usuario" => $usuarioLogado

        ];
        echo view('Includes/header', $data);
        echo view('Includes/menu', $data);
        echo view("requisitos", $data);
        echo view('Includes/footer', $data);
    }


     public function Documentos($id)
    {
        // $envelopeId = $this->request->getPost("envelopeId");
        // if (!$envelopeId) {
        //     return 'ID do envelope não informado.';
        // }
        //$envelopeId = '7446d0a0-df50-4f5b-91d7-467157833e76';
        $envelopeId = $id;
        $token = '6c4abdb7-39d6-4b83-87ea-1daeb609bf1c';
        $url = "https://app.clicksign.com/api/v3/envelopes/$envelopeId/signers/";

        $curl = curl_init($url);
        curl_setopt_array($curl, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => [
                "Authorization: $token",
                "Accept: application/vnd.api+json",
                "Content-Type: application/vnd.api+json"
            ]
        ]);

        $response = curl_exec($curl);
        curl_close($curl);

        $data2 = json_decode($response, true);

        if (!isset($data2['data'])) {
            return 'Erro ao buscar signatários.';
        }
        $dados = $data2['data'];
        $usuarioLogado = session()->get('usuario_logado');
        $data = [
            "url_base" => base_url(),
            "titulo" => 'Plasc-contratos',
            "usuario" => $usuarioLogado,
            "requisitos" => $dados


        ];
        echo view('Includes/header', $data);
        echo view('Includes/menu', $data);
        echo view("documentos", $data);
        echo view('Includes/footer', $data);
    }

    public function Segnatarios()
    {
        $usuarioLogado = session()->get('usuario_logado');
        $data = [
            "url_base" => base_url(),
            "titulo" => 'Plasc-contratos',
            "usuario" => $usuarioLogado

        ];
        echo view('Includes/header', $data);
        echo view('Includes/menu', $data);
        echo view("segnatarios", $data);
        echo view('Includes/footer', $data);
    }


    public function Envelopes()
    {

        // $envelopeId = $this->request->getPost("envelopeId");
        // if (!$envelopeId) {
        //     return 'ID do envelope não informado.';
        // }
        // $envelopeId = '7446d0a0-df50-4f5b-91d7-467157833e76';

        $token = '9180ce47-c7be-4714-8657-b46c550cd203';
        $url = "https://app.clicksign.com/api/v3/envelopes/";
        $idpasta = '273acdf9-8051-4bf6-92d2-24db34c044e8';

        $curl = curl_init($url);
        curl_setopt_array($curl, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => [
                "Authorization: $token",
                "Accept: application/vnd.api+json",
                "Content-Type: application/vnd.api+json"
            ]
        ]);

        $response = curl_exec($curl);
        curl_close($curl);

        $data2 = json_decode($response, true);

        if (!isset($data2['data'])) {
            return 'Erro ao buscar signatários.';
        }
        $dados = $data2['data'];
        $usuarioLogado = session()->get('usuario_logado');
        $data = [
            "url_base" => base_url(),
            "titulo" => 'Plasc-contratos',
            "usuario" => $usuarioLogado,
            "requisitos" => $dados


        ];
        echo view('Includes/header', $data);
        echo view('Includes/menu', $data);
        echo view("envelopes", $data);
        echo view('Includes/footer', $data);
    }


    function Lista()
      {

         $token = '53797467-a4d1-4e76-8726-47b56815d53e';
         $envelope_id = '540e04f1-8f25-43d3-94cb-cebeec973f49'; // envelope existente
         $template_id = 'd3dd50fa-3d35-41df-86a3-7710f637b607'; // template existente
         $url1 = "https://app.clicksign.com/api/v3/envelopes?access_token=$token";
         $url2 = "https://app.clicksign.com/api/v3/envelopes/$envelope_id/documents";
         $url3 = "https://app.clicksign.com/api/v3/envelopes/$envelope_id/folder";



         $ch = curl_init();
         curl_setopt_array($ch, [
            CURLOPT_URL => $url3,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => true,
            CURLOPT_HTTPHEADER => [
               "Authorization: $token",
               "Accept: application/vnd.api+json",
               "Content-Type: application/vnd.api+json"
            ],
         ]);
         $response = curl_exec($ch);
         curl_close($ch);
         $result = json_decode($response, true);
         print_r($result);
      }
   }



   function CriaEnvelope()
   {
      $token = "53797467-a4d1-4e76-8726-47b56815d53e";
      $url = "https://app.clicksign.com/api/v3/envelopes";


      // 1) Criar Envelope
      $envelopeData = [
         "data" => [
            "type" => "envelopes",
            "id"   => "a1feab5c-8e14-440e-94fa-7adc16133f0a", // opcional
            "attributes" => [
               "status" => "draft",
               "name" => "Fluxo teste API novo",
               "locale" => "pt-BR",
               "auto_close" => true,
               "remind_interval" => "14",
               "block_after_refusal" => true,
               "default_subject" => "teste fluxo",
               "default_message" => "tentando o fluxo da api"
            ],
            "relationships" => [
               "folder" => [
                  "data" => [
                     "type" => "folders",
                     "id"   => "0ae0c644-47a1-4611-836d-88acccce14a5"
                  ]
               ]
            ]
         ]
      ];

      $dados = json_encode($envelopeData);

      $ch = curl_init();
      curl_setopt_array($ch, [
         CURLOPT_URL => $url,
         CURLOPT_RETURNTRANSFER => true,
         CURLOPT_POST => true,
         CURLOPT_POSTFIELDS => $dados,
         CURLOPT_HTTPHEADER => [
            "Authorization: $token",
            "Accept: application/vnd.api+json",
            "Content-Type: application/vnd.api+json"
         ],

      ]);

      $response = curl_exec($ch);
      curl_close($ch);

      $result = json_decode($response, true);
      $envelopeId = $result["data"]["id"] ?? null;

      if (!$envelopeId) {
         echo "❌ Erro ao criar envelope:\n";
         print_r($result);
         return;
      }

      echo "✅ Envelope criado: $envelopeId\n";
   