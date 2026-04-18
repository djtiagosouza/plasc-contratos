<?php

namespace App\Controllers;

use App\Models\Usuario;
use App\Models\Conexao;
use App\Models\Adesao;


class GeraAdesoes extends BaseController
{

    private function limparTexto($texto)
    {
        if (!$texto) return '';

        // Remove acentos sem precisar da extensão intl
        $acentos = [
            'Á' => 'A',
            'À' => 'A',
            'Ã' => 'A',
            'Â' => 'A',
            'Ä' => 'A',
            'É' => 'E',
            'È' => 'E',
            'Ê' => 'E',
            'Ë' => 'E',
            'Í' => 'I',
            'Ì' => 'I',
            'Î' => 'I',
            'Ï' => 'I',
            'Ó' => 'O',
            'Ò' => 'O',
            'Õ' => 'O',
            'Ô' => 'O',
            'Ö' => 'O',
            'Ú' => 'U',
            'Ù' => 'U',
            'Û' => 'U',
            'Ü' => 'U',
            'Ç' => 'C',
            'á' => 'a',
            'à' => 'a',
            'ã' => 'a',
            'â' => 'a',
            'ä' => 'a',
            'é' => 'e',
            'è' => 'e',
            'ê' => 'e',
            'ë' => 'e',
            'í' => 'i',
            'ì' => 'i',
            'î' => 'i',
            'ï' => 'i',
            'ó' => 'o',
            'ò' => 'o',
            'õ' => 'o',
            'ô' => 'o',
            'ö' => 'o',
            'ú' => 'u',
            'ù' => 'u',
            'û' => 'u',
            'ü' => 'u',
            'ç' => 'c'
        ];
        $texto = strtr($texto, $acentos);

        // Remove caracteres especiais (mantém letras, números e espaço)
        $texto = preg_replace('/[^A-Za-z0-9 ]/', '', $texto);

        return strtoupper(trim($texto));
    }
    // Deixa apenas números (CPF, CNS, telefone, CEP, etc.)
    private function apenasNumeros($valor)
    {
        return preg_replace('/\D/', '', $valor);
    }

    // Normaliza email
    private function limparEmail($email)
    {
        return strtolower(trim($email));
    }

    // Converte data para d/m/Y
    private function limparData($data)
    {
        if (!$data) return null;

        $ts = strtotime(str_replace('/', '-', $data));
        if (!$ts) return null;

        return date('d/m/Y', $ts);
    }
    public function Gera_Adesao()
    {
        helper('form');

        $dados_proposta = [
            'unidade_venda' => $this->request->getPost('unidade_venda'),
            'dt_vencimento' => $this->request->getPost('dt_vencimento')

        ];

        $dados_titular = [

            'nome'           => $this->limparTexto($this->request->getPost('nome') ?? null),
            'data_nascimento' => $this->limparData($this->request->getPost('data_nascimento') ?? null),
            'telefone'       => $this->apenasNumeros($this->request->getPost('telefone') ?? null),
            'mae'            => $this->limparTexto($this->request->getPost('mae') ?? null),
            'pai'            => $this->limparTexto($this->request->getPost('pai') ?? null),
            'cpf'            => $this->apenasNumeros($this->request->getPost('cpf') ?? null),
            'cns'            => $this->apenasNumeros($this->request->getPost('cns') ?? null),
            'sexo'           => $this->limparTexto($this->request->getPost('sexo') ?? null),
            'estado_civil'   => $this->limparTexto($this->request->getPost('estado_civil') ?? null),
            'endereco'       => $this->limparTexto($this->request->getPost('endereco') ?? null),
            'bairro'         => $this->limparTexto($this->request->getPost('bairro') ?? null),
            'municipio'      => $this->limparTexto($this->request->getPost('municipio') ?? null),
            'uf'             => $this->limparTexto($this->request->getPost('uf') ?? null),
            'cep'            => $this->apenasNumeros($this->request->getPost('cep') ?? null),
            'numero'         => $this->apenasNumeros($this->request->getPost('numero') ?? null),
            'complemento'    => $this->limparTexto($this->request->getPost('complemento') ?? null),
            'email'          => $this->limparEmail($this->request->getPost('email') ?? null)
            //'usuario_criador' => session()->get('usuario_logado')
        ];

        $usuarioLogado = session()->get('usuario_logado');
        $conexao = new Conexao();
        $conecta = $conexao->Conecta();
        //$conecta = $conexao->Conectasml();
        $adesao = new Adesao($conecta);

        $cd_proposta = $adesao->CriaProposta($dados_proposta['dt_vencimento']);
        $adesao->CriaTitular($dados_titular, $cd_proposta);


        $dependentes = $this->request->getPost('dependente') ?? [];

        $listaDependentes = [];
        $quantidade = count($dependentes['nome']); // tanto faz qual campo usar

        for ($i = 0; $i < $quantidade; $i++) {

            // Ignora linhas vazias (primeira linha vazia do form)
            if (empty($dependentes['nome'][$i])) {
                continue;
            }

            $listaDependentes[] = [
                'nome'           => $this->limparTexto($dependentes['nome'][$i] ?? null),
                'data_nascimento' => $this->limparData($dependentes['data_nascimento'][$i] ?? null),
                'telefone'       => $this->apenasNumeros($dependentes['telefone'][$i] ?? null),
                'mae'            => $this->limparTexto($dependentes['mae'][$i] ?? null),
                'pai'            => $this->limparTexto($dependentes['pai'][$i] ?? null),
                'cpf'            => $this->apenasNumeros($dependentes['cpf'][$i] ?? null),
                'cns'            => $this->apenasNumeros($dependentes['cns'][$i] ?? null),
                'sexo'           => $this->limparTexto($dependentes['sexo'][$i] ?? null),
                'estado_civil'   => $this->limparTexto($dependentes['estado_civil'][$i] ?? null),
                'parentesco'     => $this->limparTexto($dependentes['parentesco'][$i] ?? null),
                'email'          => $this->limparEmail($dependentes['email'][$i] ?? null),
                // 'usuario_criador' => session()->get('usuario_logado')
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
            $adesao->criadependente($listaDependentes, $cd_proposta);
            $mensagem = "Titular e dependentes criados com sucesso";
        }

        $data = [
            "url_base" => base_url(),
            "titulo" => 'Plasc-contratos',
            "usuario" => $usuarioLogado,
            "mensagem" => $mensagem,
            "proposta" => $cd_proposta
        ];

        echo view('Includes/head', $data);
        echo view('Includes/menu2', $data);
        echo view("notificacao", $data,);
        echo view('Includes/footer', $data);
    }

    public function Gera_Dependente()
    {

        $dependente = [
            'nome'            => $this->limparTexto($this->request->getPost('nome')),
            'data_nascimento' => $this->limparData($this->request->getPost('data_nascimento')),
            'telefone'        => $this->apenasNumeros($this->request->getPost('telefone')),
            'mae'             => $this->limparTexto($this->request->getPost('mae')),
            'pai'             => $this->limparTexto($this->request->getPost('pai')),
            'cpf'             => $this->apenasNumeros($this->request->getPost('cpf')),
            'cns'             => $this->apenasNumeros($this->request->getPost('cns')),
            'sexo'            => $this->limparTexto($this->request->getPost('sexo')),
            'estado_civil'    => $this->limparTexto($this->request->getPost('estado_civil')),
            'endereco'        => $this->limparTexto($this->request->getPost('endereco')),
            'bairro'          => $this->limparTexto($this->request->getPost('bairro')),
            'municipio'       => $this->limparTexto($this->request->getPost('municipio')),
            'uf'              => $this->limparTexto($this->request->getPost('uf')),
            'cep'             => $this->apenasNumeros($this->request->getPost('cep')),
            'numero'          => $this->limparTexto($this->request->getPost('numero')),
            'complemento'     => $this->limparTexto($this->request->getPost('complemento')),
            'email'           => $this->limparEmail($this->request->getPost('email')),
        ];


        $dados_proposta = [
            'unidade_venda' => $this->request->getPost('unidade_venda'),
            'contrato' => $this->request->getPost('contrato'),
            'parentesco' => $this->request->getPost('parentesco')


        ];

        $usuarioLogado = session()->get('usuario_logado');
        $conexao = new Conexao();
        $conecta = $conexao->Conecta();
        //$conecta = $conexao->Conectasml();
        $adesao = new Adesao($conecta);


        $adesao->criadependente($dados_proposta, $dependente);


        
            $mensagem = "Dependente criados com sucesso";
        

        $data = [
            "url_base" => base_url(),
            "titulo" => 'Plasc-contratos',
            "usuario" => $usuarioLogado,
            "mensagem" => $mensagem,
            "proposta" => $cd_proposta
        ];

        echo view('Includes/head', $data);
        echo view('Includes/menu2', $data);
        echo view("notificacao", $data,);
        echo view('Includes/footer', $data);
    }
    
        public function Gera_Proposta_Dependente()
    {

        $dependente = [
            'contrato'        => $this->request->getPost('contrato'),
            'proposta'        => $this->request->getPost('proposta'),
            'plano'           => $this->request->getPost('plano'),
            'tabelapreco'     => $this->request->getPost('tabelapreco'),
            'unidade_venda'   => $this->request->getPost('unidade_venda'),
            'nome'            => $this->limparTexto($this->request->getPost('nome')),
            'data_nascimento' => $this->limparData($this->request->getPost('data_nascimento')),
            'telefone'        => $this->apenasNumeros($this->request->getPost('telefone')),
            'mae'             => $this->limparTexto($this->request->getPost('mae')),
            'pai'             => $this->limparTexto($this->request->getPost('pai')),
            'cpf'             => $this->apenasNumeros($this->request->getPost('cpf')),
            'cns'             => $this->apenasNumeros($this->request->getPost('cns')),
            'sexo'            => $this->limparTexto($this->request->getPost('sexo')),
            'estado_civil'    => $this->limparTexto($this->request->getPost('estado_civil')),
            'endereco'        => $this->limparTexto($this->request->getPost('endereco')),
            'bairro'          => $this->limparTexto($this->request->getPost('bairro')),
            'municipio'       => $this->limparTexto($this->request->getPost('municipio')),
            'uf'              => $this->limparTexto($this->request->getPost('uf')),
            'cep'             => $this->apenasNumeros($this->request->getPost('cep')),
            'numero'          => $this->limparTexto($this->request->getPost('numero')),
            'complemento'     => $this->limparTexto($this->request->getPost('complemento')),
            'email'           => $this->limparEmail($this->request->getPost('email')),
            'parentesco'      => $this->request->getPost('parentesco'),
        ];

        $usuarioLogado = session()->get('usuario_logado');
        $conexao = new Conexao();
        $conecta = $conexao->Conecta();
        //$conecta = $conexao->Conectasml();
        $adesao = new Adesao($conecta);


        $cd_proposta_usuario = $adesao->Gera_Proposta_Usuario_Dependente($dependente);

        
        
        $mensagem = "Dependente criados com sucesso n° Proposta. $cd_proposta_usuario";
       

        $data = [
            "url_base" => base_url(),
            "titulo" => 'Plasc-contratos',
            "usuario" => $usuarioLogado,
            "mensagem" => $mensagem
           
        ];

        echo view('Includes/head', $data);
        echo view('Includes/menu2', $data);
        echo view("notificacao", $data,);
        echo view('Includes/footer', $data);
    }
}
