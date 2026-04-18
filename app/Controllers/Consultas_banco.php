<?php

namespace App\Controllers;

use App\Models\Consultar_banco;

use App\Models\Conexao;




class Consultas_banco extends BaseController
{

    public function busca_contrato()
    {

        $cd_contrato = $this->request->getPost("contrato");
        $conectar = new Conexao();
        $con = $conectar->Conecta();
        $dados = new Consultar_banco($con);
        $result = $dados->Buscar_contrato($cd_contrato);
        if (!empty($result)) {
            session()->set('contrato', $cd_contrato);
        }

        $data = [
            "url_base" => base_url(),
            "titulo" => 'Plasc-contratos',
            "consulta" =>  $result,
            "buscou"  => true
        ];

        echo view('Includes/head', $data);
        echo view('Includes/menu2', $data);
        echo view('busca_contrato', $data);
        echo view('Includes/footer', $data);
    }
}
