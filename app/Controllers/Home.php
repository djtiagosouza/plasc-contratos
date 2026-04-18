<?php

namespace App\Controllers;

use App\Models\Usuario;
use App\Models\Conexao;
use App\Models\Registro_Contratos;
use App\Models\Consultar_banco;
use App\Models\Adesao;

helper('form');

class Home extends BaseController
{

    //METODO CONFIGURADO PARA CHAMAR O LOGIN #01
    public function index()
    {

        $data = array(
            "url_base" => base_url(),
            "titulo" => "Home",
            "mensagem" => session()->getFlashdata('aviso')
        );
        echo view("Login", $data); //CHAMA A VIEWS DE LOGIN
    }
    //_______________________________________________________________________ FIM #01

    //METODO QUE CONFERE O LOGIN E A SENHA DO USUÁRIO #02
    public function login()
    {
        $usuario = strtoupper(trim($this->request->getPost("usuario")));
        $senha = $this->request->getPost("senha");
        $conexao = new Conexao();
        $conecta = $conexao->Conecta();
        $logar = new Usuario($conecta);
        $resultado = $logar->Logar($usuario, $senha);


        if (is_array($resultado) && !isset($resultado['erro'])) {
            $session = session();
            $session->set('usuario_logado', $resultado['usuario']);
            $session->set('cd_matricula', $resultado['cd_matricula']);


            return $this->Dashboard(); //CHAMA O METODO DO DASHBOARD


        } else {
            $mensagem = is_array($resultado) && isset($resultado['erro']) ? $resultado['erro'] : 'Erro ao processar login.';
            session()->setFlashdata('aviso', $mensagem);

            return redirect()->to(base_url()); // RETORNO PARA O LOGIN
        }
    }
    //___________________________________________________________________________FIM #02

    //METODO PARA SAIR DO SISTEMA #03
    public function logout()
    {
        $session = session();
        $session->destroy(); // <-- Apaga toda a sessão
        return redirect()->to(base_url()); // Volta para a tela de login
    }
    //_____________________________________________________________________________FIM #03

    //METODO PARA LISTAR OS STATUS DOS CONTRATOS #04
    function Dashboard()
    {

        $consultar = new Clicking();
        $consulta_pasta = $consultar->Pasta();
        $consulta_envelopes = $consultar->Envelopes();
        $conectar = new Conexao();
        $con = $conectar->Conecta();
        $registro = new Registro_Contratos($con);
        $consulta_registro = $registro->Busca_registro();

        $data = [
            "url_base" => base_url(),
            "titulo" => 'Plasc-contratos',
            "pasta" => $consulta_pasta,
            "consulta" => $consulta_envelopes,
            "registro" => $consulta_registro


        ];
        //var_dump($consulta_envelopes);
        echo view('Includes/head', $data);
        echo view('Includes/menu2', $data);
        //echo view('dashboard',$data);
        echo view('dash2', $data);
        echo view('Includes/footer', $data);
    }

    function Pasta()
    {

        $consultar = new Clicking();
        $consulta_pasta = $consultar->Pasta();


        $data = [
            "url_base" => base_url(),
            "titulo" => 'Plasc-contratos',
            "consulta" => $consulta_pasta


        ];
        //var_dump($consulta);
        echo view('Includes/head', $data);
        echo view('Includes/menu2', $data);
        echo view('pasta', $data);
        echo view('Includes/footer', $data);
    }
    //_____________________________________________________________________________FIM #04



    function GeraContratoIndividual()
    {
        $usuarioLogado = session()->get('usuario_logado');
        $data = [
            "url_base" => base_url(),
            "titulo" => 'Plasc-contratos',
            "usuario" => $usuarioLogado

        ];
        echo view('Includes/head', $data);
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
        echo view('Includes/head', $data);
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
        echo view('Includes/head', $data);
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
        echo view('Includes/head', $data);
        echo view('Includes/menu', $data);
        echo view("criaenvelopes", $data);
        echo view('Includes/footer', $data);
    }

    public function GeraContrato()
    {

        $usuarioLogado = session()->get('usuario_logado');
        $data = [
            "url_base" => base_url(),
            "titulo" => 'Plasc-contratos',
            "usuario" => $usuarioLogado

        ];
        echo view('Includes/head', $data);
        echo view('Includes/menu2', $data);
        echo view("geracontrato", $data);
        echo view('Includes/footer', $data);
    }

    public function GeraAdesao()
    {

        $usuarioLogado = session()->get('usuario_logado');
        $data = [
            "url_base" => base_url(),
            "titulo" => 'Plasc-contratos',
            "usuario" => $usuarioLogado

        ];
        echo view('Includes/head', $data);
        echo view('Includes/menu2', $data);
        echo view("geraadesao", $data);
        echo view('Includes/footer', $data);
    }
    public function BuscaContratos()
    {

        $usuarioLogado = session()->get('usuario_logado');
        $data = [
            "url_base" => base_url(),
            "titulo" => 'Plasc-contratos',
            "usuario" => $usuarioLogado

        ];
        echo view('Includes/head', $data);
        echo view('Includes/menu2', $data);
        echo view("busca_contrato", $data);
        echo view('Includes/footer', $data);
    }

 public function CriarPropostaDependente()
{
    $cd_contrato = $this->request->getPost('contrato');
    $usuarioLogado = session()->get('usuario_logado');

    $conexao = new Conexao();
    $conn = $conexao->Conecta();

    $consulta = new Consultar_banco($conn);
    $dadosContrato = $consulta->Buscar_contrato($cd_contrato);
    

    $adesao = new Adesao($conn);
    // $proposta = $adesao->cria_proposta_dependente($dadosContrato);
    $proposta = 13889;

    $this->GeraDependente($proposta, $dadosContrato);
}

    public function GeraDependente($proposta, $dados)
    {

        $usuarioLogado = session()->get('usuario_logado');
        $data = [
            "url_base" => base_url(),
            "titulo" => 'Plasc-contratos',
            "usuario" => $usuarioLogado,
            "proposta" => $proposta,
            "dadoscontrato" => $dados

        ];
        echo view('Includes/head', $data);
        echo view('Includes/menu2', $data);
        echo view("geraadesaodepedente", $data);
        echo view('Includes/footer', $data);
    }
}
