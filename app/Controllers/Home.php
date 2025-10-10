<?php

namespace App\Controllers;

use App\Models\Usuario;
use App\Models\Conexao;

class Home extends BaseController
{


    public function index()
    {

        $data = array(
            "url_base" => base_url(),
            "titulo" => "Home",
            "mensagem" => session()->getFlashdata('aviso')
        );
        echo view("Login", $data);
    }

    public function login()
    {
        $usuario = strtoupper(trim($this->request->getPost("usuario")));
        $senha = $this->request->getPost("senha");

        $conexao = new Conexao();
        $conecta = $conexao->Conecta();
        $logar = new Usuario($conecta);
        $resultado = $logar->Logar($usuario, $senha);
        $usuarioLogado = session()->get('usuario_logado');
        if (is_array($resultado) && !isset($resultado['erro'])) {
            $session = session();
            $session->set('usuario_logado', $resultado['usuario']);


            $data = [
                "url_base" => base_url(),
                "titulo" => 'Plasc-contratos',
                "usuario" => $usuarioLogado

            ];
            echo view('Includes/header', $data);
            echo view('Includes/menu2', $data);
            echo view('paginainicial');
            echo view('Includes/footer', $data);
        } else {
            $mensagem = is_array($resultado) && isset($resultado['erro']) ? $resultado['erro'] : 'Erro ao processar login.';
            session()->setFlashdata('aviso', $mensagem);

            return redirect()->to(base_url());
        }
    }

    
    function GeraContratoIndividual()
    {
         $usuarioLogado = session()->get('usuario_logado');
        $data = [
            "url_base" => base_url(),
            "titulo" => 'Plasc-contratos',
            "usuario" => $usuarioLogado

        ];
        echo view('Includes/header', $data);
        echo view('Includes/menu2', $data);
        echo view("Individual/seleciona_contrato_ind", $data);
        echo view('Includes/footer', $data);
    }

    function GeraContratoEmpresarial()
    {
         $usuarioLogado = session()->get('usuario_logado');
        $data = [
            "url_base" => base_url(),
            "titulo" => 'Plasc-contratos',
            "usuario" => $usuarioLogado

        ];
        echo view('Includes/header', $data);
        echo view('Includes/menu2', $data);
        echo view("Empresarial/seleciona_contrato_emp", $data);
        echo view('Includes/footer', $data);
    }

     function CriaPasta()
    {
         $usuarioLogado = session()->get('usuario_logado');
         $data = [
            "url_base" => base_url(),
            "titulo" => 'Plasc-contratos',
            "usuario" => $usuarioLogado

        ];
        echo view('Includes/header', $data);
        echo view('Includes/menu', $data);
        echo view("criapasta", $data);
        echo view('Includes/footer', $data);
    }

         function CriaEnvelope()
    {
         $usuarioLogado = session()->get('usuario_logado');
         $idpasta =  session()->getFlashdata('subpasta_id');;
         $data = [
            "url_base" => base_url(),
            "titulo" => 'Plasc-contratos',
            "usuario" => $usuarioLogado,
            "idpasta" => $idpasta

        ];
        echo view('Includes/header', $data);
        echo view('Includes/menu', $data);
        echo view("criaenvelopes", $data);
        echo view('Includes/footer', $data);
    }

    public function GeraContrato(){
    $plano = $this->request->getGet('tipo');
    $usuarioLogado = session()->get('usuario_logado');
         $data = [
            "url_base" => base_url(),
            "titulo" => 'Plasc-contratos',
            "usuario" => $usuarioLogado,
            "plano" => $plano

        ];
        echo view('Includes/header', $data);
        echo view('Includes/menu2', $data);
        echo view("geracontrato", $data);
        echo view('Includes/footer', $data);
    }

}


