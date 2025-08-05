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
            echo view('Includes/menu',$data);
            echo view('dashboard');
            echo view('Includes/footer',$data);

        } else {
            $mensagem = is_array($resultado) && isset($resultado['erro']) ? $resultado['erro'] : 'Erro ao processar login.';
            session()->setFlashdata('aviso', $mensagem);

            return redirect()->to(base_url());
        }
    }

    public function Envelopes()
	{
        
        // $envelopeId = $this->request->getPost("envelopeId");
        // if (!$envelopeId) {
        //     return 'ID do envelope não informado.';
        // }
        // $envelopeId = '7446d0a0-df50-4f5b-91d7-467157833e76';

        $token = '9180ce47-c7be-4714-8657-b46c550cd203';
        $url = "https://sandbox.clicksign.com/api/v3/envelopes/";

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
        echo view('Includes/menu',$data);
        echo view("envelopes", $data);
        echo view('Includes/footer',$data);
}
    public function Documentos($id)
	{
        // $envelopeId = $this->request->getPost("envelopeId");
        // if (!$envelopeId) {
        //     return 'ID do envelope não informado.';
        // }
        //$envelopeId = '7446d0a0-df50-4f5b-91d7-467157833e76';
        $envelopeId = $id;
		$token = '9180ce47-c7be-4714-8657-b46c550cd203';
        $url = "https://sandbox.clicksign.com/api/v3/envelopes/$envelopeId/signers/";

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
        echo view('Includes/menu',$data);
        echo view("documentos", $data);
        echo view('Includes/footer',$data);
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
        echo view('Includes/menu',$data);
        echo view("segnatarios", $data);
        echo view('Includes/footer',$data);
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
        echo view('Includes/menu',$data);
        echo view("requisitos", $data);
        echo view('Includes/footer',$data);
        }


        public function Notificacoes()
	{
		$usuarioLogado = session()->get('usuario_logado');
		 $data = [
                "url_base" => base_url(),
                "titulo" => 'Plasc-contratos',
                "usuario" => $usuarioLogado

            ];
        echo view('Includes/header', $data);
        echo view('Includes/menu',$data);
        echo view("notificacoes", $data);
        echo view('Includes/footer',$data);

        
    }

}