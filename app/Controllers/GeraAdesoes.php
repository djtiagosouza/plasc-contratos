<?php

namespace App\Controllers;

use App\Models\Usuario;
use App\Models\Conexao;
use App\Models\Adesao;


class GeraAdesoes extends BaseController
{

    


    public function Gera_Adesao()
    {
        helper('form');

        $dados_titular = [
            'nome' => $this->request->getPost('nome'),
            'data_nascimento' => $this->request->getPost('data_nascimento'),
            'telefone' => $this->request->getPost('telefone'),
            'mae' => $this->request->getPost('mae'),
            'pai' => $this->request->getPost('pai'),
            'cpf' => $this->request->getPost('cpf'),
            'cns' => $this->request->getPost('cns'),
            'sexo' => $this->request->getPost('sexo'),
            'estado_civil' => $this->request->getPost('estado_civil'),
            'endereco' => $this->request->getPost('endereco'),
            'bairro' => $this->request->getPost('bairro'),
            'municipio' => $this->request->getPost('municipio'),
            'uf' => $this->request->getPost('uf'),
            'cep' => $this->request->getPost('cep'),
            'numero' => $this->request->getPost('numero'),
            'complemento' => $this->request->getPost('complemento'),
            'email' => $this->request->getPost('email'),
            'usuario_criador' => session()->get('usuario_logado')
            ''
        ];

        $usuarioLogado = session()->get('usuario_logado');
        $conexao = new Conexao();
        $conecta = $conexao->Conecta2();
        $adesao = new Adesao($conecta);

        $adesao->CriaProposta();
        $adesao->CriaTitular($dados_titular);

        $dependentes = $this->request->getPost('dependente') ?? [];

        $listaDependentes = [];
        $quantidade = count($dependentes['nome']); // tanto faz qual campo usar

        for ($i = 0; $i < $quantidade; $i++) {

            // Ignora linhas vazias (primeira linha vazia do form)
            if (empty($dependentes['nome'][$i])) {
                continue;
            }

            $listaDependentes[] = [
                'nome' => $dependentes['nome'][$i] ?? null,
                'data_nascimento' => $dependentes['data_nascimento'][$i] ?? null,
                'telefone' => $dependentes['telefone'][$i] ?? null,
                'mae' => $dependentes['mae'][$i] ?? null,
                'pai' => $dependentes['pai'][$i] ?? null,
                'cpf' => $dependentes['cpf'][$i] ?? null,
                'cns' => $dependentes['cns'][$i] ?? null,
                'sexo' => $dependentes['sexo'][$i] ?? null,
                'estado_civil' => $dependentes['estado_civil'][$i] ?? null,
                'parentesco' => $dependentes['parentesco'][$i] ?? null,
                'email' => $dependentes['email'][$i] ?? null,
                'usuario_criador' => session()->get('usuario_logado')
            ];
        }


       
        // Se não tiver dependentes
        if (empty($listaDependentes)) {

            $mensagem = "Titular criado com sucesso";
        } else {

            foreach ($listaDependentes as &$d) {
                $d['endereco'] = $dados_titular['endereco'];
                $d['bairro'] = $dados_titular['bairro'];
                $d['municipio'] = $dados_titular['municipio'];
                $d['uf'] = $dados_titular['uf'];
                $d['cep'] = $dados_titular['cep'];
                $d['numero'] = $dados_titular['numero'];
                $d['complemento'] = $dados_titular['complemento'];
            }

            // cria dependentes
            $adesao->criadependente($listaDependentes);
            $mensagem = "Titular e dependentes criados com sucesso";
        }

        $data = [
            "url_base" => base_url(),
            "titulo" => 'Plasc-contratos',
            "usuario" => $usuarioLogado,
            "mensagem" => $mensagem
        ];

        echo view('Includes/header', $data);
        echo view('Includes/menu2', $data);
        echo view("notificacao", $data);
        echo view('Includes/footer', $data);
    }

    // public function Gera_Dependente()
    // {

    //     //variaveis de controle
    //     helper('form');
    //     $dependentes = $this->request->getPost('dependente');

    //     $usuarioLogado = session()->get('usuario_logado');

    //     foreach ($dependentes['nome'] as $i => $nome) {

    //         $data_nascimento = $dependentes['data_nascimento'][$i];
    //         $sexo = $dependentes['sexo'][$i];
    //         $cpf = $dependentes['cpf'][$i];
    //         $cns = $dependentes['cns'][$i];
    //         $telefone = $dependentes['telefone'][$i];
    //         $mae = $dependentes['mae'][$i];
    //         $pai = $dependentes['pai'][$i];
    //         $estado_civil = $dependentes['estado_civil'][$i];
    //         $parentesco = $dependentes['parentesco'][$i];
    //         $email = $dependentes['email'][$i];
    //     }
    // }
}