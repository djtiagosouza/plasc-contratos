<?php

namespace App\Controllers;

use App\Models\Usuario;
use App\Models\Conexao;


class GeraContratos extends BaseController
{

    public function Gera_Contrato()
    {
        //variaveis de controle
        $nome = $this->request->getPost('nome');
        $filiacao = $this->request->getPost('filiacao');
        $cpf = $this->request->getPost('cpf');
        $rg = $this->request->getPost('rg');
        $orgao_expedidor = $this->request->getPost('orgao_expedidor');
        $endereco = $this->request->getPost('endereco');
        $bairro = $this->request->getPost('bairro');
        $municipio = $this->request->getPost('municipio');
        $uf = $this->request->getPost('uf');
        $cep = $this->request->getPost('cep');
        $email = $this->request->getPost('email');
        $data_nascimento = $this->request->getPost('data_nascimento');
        $telefone = $this->request->getPost('telefone');

        $usuarioLogado = session()->get('usuario_logado');

        $nome_pasta = $nome . '-' . $cpf;

        $access_toker = '53797467-a4d1-4e76-8726-47b56815d53e';
        $folder_id = '659109a3-7ebf-4aee-8f39-6988a689f16c'; //da pasta individual
        $url = "https://app.clicksign.com/api/v3/folders/";
        //fim veriveis de controle

        //Inicio da criacao da pasta
        $dados = [
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

        $dados_api = json_encode($dados);

        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => $dados_api,
            CURLOPT_HTTPHEADER => [
                "Authorization: $access_toker",
                "Accept: application/vnd.api+json",
                "Content-Type: application/vnd.api+json"
            ]
        ]);

        $resposta = curl_exec($curl);
        curl_close($curl);
        $resultado_pasta = json_decode($resposta, true);

        //fim da criacao  da pasta

        if (!isset($resultado_pasta['data']['id'])) {

            return redirect()->back()->with('erro', 'Erro ao criar a pasta!');
        }

        //inicio da criacao do envelope

        $id_pasta = $resultado_pasta['data']['id'];
        $nome_envelope = $this->request->getPost('contrato');
        $formato_data = date(DATE_RFC3339, strtotime('+7 days'));
        $url = "https://app.clicksign.com/api/v3/envelopes";

        $dados = [
            "data" => [
                "type" => "envelopes",
                "attributes" => [
                    "name" => $nome_envelope,
                    "locale" => "pt-BR",
                    "auto_close" => true,
                    "remind_interval" => 3,
                    "block_after_refusal" => false,
                    "deadline_at" => $formato_data,
                    "default_subject" => "Contrato Plano de Saúde Plasc",
                    "default_message" => "Ola, segue seu contrato para ser assinado."

                ],
                "relationships" => [
                    "folder" => [
                        "data" => [
                            "type" => "folders",
                            "id" => $id_pasta
                        ]
                    ]
                ]
            ]
        ];

        $dados_api = json_encode($dados);

        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => $dados_api,
            CURLOPT_HTTPHEADER => [
                "Authorization: $access_toker",
                "Accept: application/vnd.api+json",
                "Content-Type: application/vnd.api+json"
            ]
        ]);

        $resposta = curl_exec($curl);
        curl_close($curl);
        $resultado_envelope = json_decode($resposta, true);

        //fim da criacao do envelope

        if (!isset($resultado_envelope['data']['id'])) {

            return redirect()->back()->with('erro', 'Erro ao criar o envelope!');
        }

        //incio da criacao do medelo

        $id_envelope = $resultado_envelope['data']['id'];
        $template_id = $this->request->getPost('id_modelo');
        $url = "https://app.clicksign.com/api/v3/envelopes/$id_envelope/documents";

        $dados = [
            "data" => [
                "type" => "documents",
                "attributes" => [
                    "template" => [
                        "key"                   => $template_id,
                        "data" => [
                            "Nome"              => $nome,
                            "Filiação"          => $filiacao,
                            "CPF"               => $cpf,
                            "CI"                => $rg,
                            "Órgão Expedidor"   => $orgao_expedidor,
                            "Endereço"          => $endereco,
                            "Bairro"            => $bairro,
                            "Município"         => $municipio,
                            "UF"                => $uf,
                            "CEP"               => $cep,
                            "e-mail"            => $email,
                            "Data de Nascimento" => $data_nascimento,
                            "Telefone"          => $telefone
                        ]
                    ],
                    "filename" => $this->request->getPost("nome_modelo")
                ]
            ]
        ];

        $dados_api = json_encode($dados);

        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => $dados_api,
            CURLOPT_HTTPHEADER => [
                "Authorization: $access_toker",
                "Accept: application/vnd.api+json",
                "Content-Type: application/vnd.api+json"
            ]
        ]);

        $resposta = curl_exec($curl);
        curl_close($curl);
        $resultado_modelo = json_decode($resposta, true);

        // fim da criacao do modelo

        if (!isset($resultado_modelo['data']['id'])) {

            return redirect()->back()->with('erro', 'Erro ao criar o contrato');
        }

        //inicio cria segnatario
        $url = "https://app.clicksign.com/api/v3/envelopes/$id_envelope/signers";

        $dados = [
            "data" => [
                "type" => "signers",
                "attributes" => [
                    "has_documentation" => false,
                    "group" => 1,
                    "location_required_enabled" => false,
                    "communicate_events" => [
                        "signature_request" => "email",
                        "signature_reminder" => "email",
                        "document_signed" => "email"
                    ],
                    "name" =>  $nome,
                    "email" => $email,
                    "refusable" => false
                ]

            ]
        ];

        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => $dados,
            CURLOPT_HTTPHEADER => [
                "Authorization: $access_toker",
                "Content-Type: application/vnd.api+json",
                "Accept: application/vnd.api+json",

            ],
        ]);

        $resposta = curl_exec($curl);
        curl_close($curl);
        $resusltado_segnatario = json_decode($resposta, true);

        //fim cria segnatario

        if (!isset($resusltado_segnatario['data']['id'])) {

            return redirect()->back()->with('erro', 'Erro ao Inserir Segnatario!');
        }

        //inicio qualificacao

        $url = "https://app.clicksign.com/api/v3/envelopes/$id_envelope/requirements";
        $id_modelo = $resultado_modelo['data']['id'];
        $id_segnatario = $resusltado_segnatario['data']['id'];

        $dados = [

            "data" => [
                "type" => "requirements",
                "attributes" => [
                    "action" => "agree",
                    "role"   => $this->request->getPost('qualificacao')
                ],
                "relationships" => [
                    "document" => [
                        "data" => [
                            "type" => "documents",
                            "id"   => $id_modelo
                        ]
                    ],
                    "signer" => [
                        "data" => [
                            "type" => "signers",
                            "id"   => $id_segnatario
                        ]
                    ]

                ]
            ]

        ];

        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => $dados,
            CURLOPT_HTTPHEADER => [
                "Authorization: $access_toker",
                "Content-Type: application/vnd.api+json",
                "Accept: application/vnd.api+json",

            ],
        ]);
        $resposta = curl_exec($curl);
        curl_close($curl);
        $resultado = json_decode($resposta, true);

        //fim cria qualificacao

        if (!isset($resultado['data']['id'])) {

            return redirect()->back()->with('erro', 'Erro ao inserir a qualificação!');
        }

        //inicio cria autenticacao

        $url = "https://app.clicksign.com/api/v3/envelopes/$id_envelope/requirements";


        $dados = json_encode([
            "data" => [
                "type" => "requirements",
                "attributes" => [
                    "action" => "provide_evidence",
                    "auth"   => $this->request->getPost('autenticacao')
                ],
                "relationships" => [
                    "document" => [
                        "data" => [
                            "type" => "documents",
                            "id"   =>  $id_modelo
                        ]
                    ],
                    "signer" => [
                        "data" => [
                            "type" => "signers",
                            "id"   =>  $id_segnatario
                        ]
                    ]
                ]
            ]


        ]);

        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => $dados,
            CURLOPT_HTTPHEADER => [
                "Authorization: $access_toker",
                "Content-Type: application/vnd.api+json",
                "Accept: application/vnd.api+json",

            ],
        ]);
        $resposta = curl_exec($curl);
        curl_close($curl);
        $resultado = json_decode($resposta, true);

        if (!isset($result['data']['id'])) {

            return redirect()->back()->with('erro', 'Erro ao inserir a autenticação!');
        }
        //return $result;
        $this->Ativar($id_envelope,$access_toker);
        $this->Notificacao($id_envelope,$access_toker);

        $usuarioLogado = session()->get('usuario_logado');
        $data = [
            "url_base" => base_url(),
            "titulo" => 'Plasc-contratos',
            "usuario" => $usuarioLogado,

        ];

        echo view('Includes/header', $data);
        echo view('Includes/menu', $data);
        echo view("notificacao", $data);
        echo view('Includes/footer', $data);
    }



    public function Ativar($envelope_id,$access_toker)
    {

        
        $url = "https://app.clicksign.com/api/v3/envelopes/$envelope_id";


        $dados_json = json_encode([
            "data" => [
                "type" => "envelopes",
                "attributes" => [
                    "status" => "running"

                ],
                "id" => $envelope_id
            ]

        ]);

        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CUSTOMREQUEST => "PATCH",
            CURLOPT_POSTFIELDS => $dados_json,
            CURLOPT_HTTPHEADER => [
                "Authorization: $access_toker",
                "Content-Type: application/vnd.api+json",
                "Accept: application/vnd.api+json",

            ],
        ]);
        curl_exec($curl);
        curl_close($curl);
        // $result = json_decode($response, true);

        // print_r ($result);
    }
    public function Notificacao($envelope_id,$access_toker)
    {

      
        $url = "https://app.clicksign.com/api/v3/envelopes/$envelope_id/notifications";

        $dados_json = json_encode([
            "data" => [
                "type" => "notifications",
                "attributes" => [
                    "message" => null

                ],

            ]


        ]);

        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => $dados_json,
            CURLOPT_HTTPHEADER => [
                "Authorization: $access_toker",
                "Content-Type: application/vnd.api+json",
                "Accept: application/vnd.api+json",

            ],
        ]);
        curl_exec($curl);
        curl_close($curl);
        // $result = json_decode($response, true);

        // print_r ($result);
    }
}
