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
			"titulo" => "home",
			"mensagem" => session()->getFlashdata('aviso')
            );
		echo view("Login", $data);
	}

	 public function Login()
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

            $data = [
                "url_base" => base_url(),
                "titulo" => 'Plasc-contratos'
            ];
            return view('Contratos_index', $data);
        } else {
            $mensagem = is_array($resultado) && isset($resultado['erro']) ? $resultado['erro'] : 'Erro ao processar login.';
            session()->setFlashdata('aviso', $mensagem);

            return redirect()->to(base_url());
        }
    }
}

