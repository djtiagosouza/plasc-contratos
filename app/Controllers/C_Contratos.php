<?php

namespace App\Controllers;

use App\Models\Usuario;
use App\Models\Conexao;

class C_Contratos extends BaseController
{

   public function CriaContrato()
   {
      $Token       = '53797467-a4d1-4e76-8726-47b56815d53e';
      $envelope_id = 'adcade06-e4bf-475e-b4c9-da8acb1729bc'; // envelope existente
      $template_id = 'd3dd50fa-3d35-41df-86a3-7710f637b607'; // template existente
      $url = "https://app.clicksign.com/api/v3/envelopes/$envelope_id/documents";

      $dados_json = json_encode([
         "data" => [
            "type" => "documents",
            "attributes" => [
               "template" => [
                  "key" => $template_id,
                  "data" => [
                     "Nome"    => $this->request->getPost("nome"),
                     "cpf"              => $this->request->getPost("cpf"),
                     "telefone"         => $this->request->getPost("telefone"),
                     "dt_nascimento"  => $this->request->getPost("data_nascimento"),
                     "sexo"             => $this->request->getPost("sexo"),
                     "dt_contrato" => $this->request->getPost("data_contratacao"),
                     "plano"       => $this->request->getPost("tipo_plano"),
                  ]
               ],
               "filename" => "mod_teste_api.docx"
            ]
         ]
      ]);

      $ch = curl_init();
      curl_setopt_array($ch, [
         CURLOPT_URL => $url,
         CURLOPT_RETURNTRANSFER => true,
         CURLOPT_CUSTOMREQUEST => "POST",
         CURLOPT_POSTFIELDS => $dados_json,
         CURLOPT_HTTPHEADER => [
            "Authorization: $Token",
            "Content-Type: application/vnd.api+json",
            "Accept: application/vnd.api+json",

         ],
      ]);
      $response = curl_exec($ch);
      curl_close($ch);

      // $result = json_decode($response, true);
      print_r($response);
   }


   function CriaPasta()
   {

      $access_toker = '53797467-a4d1-4e76-8726-47b56815d53e';
      $folder_id = '659109a3-7ebf-4aee-8f39-6988a689f16c'; //da pasta individual
      $url = "https://app.clicksign.com/api/v3/folders/";
      $nome_pasta = $this->request->getPost("nome");

      $dados_pasta = [
         "data" => [
            "type" => "folders",
            "attributes" => [
               "name" => $nome_pasta
            ],
            "relationships" => [
               "folder" => [
                  "data" => [
                     "type" => "folders",
                     "id" => $folder_id
                  ]
               ]
            ]
         ]
      ];


      $dados = json_encode($dados_pasta);

      $curl = curl_init();
      curl_setopt_array($curl, [
         CURLOPT_URL => $url,
         CURLOPT_RETURNTRANSFER => true,
         CURLOPT_CUSTOMREQUEST => "POST",
         CURLOPT_POSTFIELDS => $dados,
         CURLOPT_HTTPHEADER => [
            "Authorization: $access_toker",
            "Accept: application/vnd.api+json",
            "Content-Type: application/vnd.api+json"
         ]
      ]);
      $response = curl_exec($curl);
      curl_close($curl);
      $result = json_decode($response, true);
     

      if (!isset($result['data']['id'])) {

         return redirect()->back()->with('erro', 'Erro ao criar o envelope!');
      } 
  
         $subpasta_id = $result['data']['id'];
         // $this->CriaEnvelopes($subpasta_id);
         $usuarioLogado = session()->get( 'usuario_logado');
         $data = [
            "url_base" => base_url(),
            "titulo" => 'Plasc-contratos',
            "usuario" => $usuarioLogado,
            "idpasta" => $subpasta_id

        ];

        echo view('Includes/header', $data);
        echo view('Includes/menu', $data);
        echo view("criaenvelopes", $data);
        echo view('Includes/footer', $data);     
         
      
   }

   public function CriaEnvelopes()
   {

      $access_token = '53797467-a4d1-4e76-8726-47b56815d53e';
      $url = "https://app.clicksign.com/api/v3/envelopes";
      $nome_envelope = $this->request->getPost("nome");
      $subpasta_id = $this->request->getPost('idpasta');
      $formato_data = date(DATE_RFC3339, strtotime('+7 days'));

      $dados_pasta = [
         "data" => [
            "type" => "envelopes",
            "attributes" => [
               "name" => $nome_envelope,
               "locale" => "pt-BR",
               "auto_close" => true,
               "remind_interval" => 3,
               "block_after_refusal" => false,
               "deadline_at"=> $formato_data,
               "default_subject"=> "Contrato Plano de Saúde Plasc",
               "default_message"=> "Ola, segue seu contrato para ser assinado."

            ],
            "relationships" => [
               "folder" => [
                  "data" => [
                     "type" => "folders",
                     "id" => $subpasta_id 
                  ]
               ]
            ]
         ]
      ];


      $dados = json_encode($dados_pasta);

      $curl = curl_init();
      curl_setopt_array($curl, [
         CURLOPT_URL => $url,
         CURLOPT_RETURNTRANSFER => true,
         CURLOPT_CUSTOMREQUEST => "POST",
         CURLOPT_POSTFIELDS => $dados,
         CURLOPT_HTTPHEADER => [
            "Authorization: $access_token",
            "Accept: application/vnd.api+json",
            "Content-Type: application/vnd.api+json"
         ]
      ]);
      $response = curl_exec($curl);
      curl_close($curl);
      $result = json_decode($response, true);
      

     if (!isset($result['data']['id'])) {

         return redirect()->back()->with('erro', 'Erro ao criar o envelope!');
      } 
  
         $envelope_id = $result['data']['id'];
         $usuarioLogado = session()->get( 'usuario_logado');
         $data = [
            "url_base" => base_url(),
            "titulo" => 'Plasc-contratos',
            "usuario" => $usuarioLogado,
            "idenvelope" => $envelope_id
        ];

        echo view('Includes/header', $data);
        echo view('Includes/menu', $data);
        echo view("criasegnatarios", $data);
        echo view('Includes/footer', $data);    


   }

   public function CriaSegnatarios(){


      
   }



   
}
