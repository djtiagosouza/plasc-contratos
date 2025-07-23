<?php namespace App\Controllers;

use App\Models\M_pessoa;
class Pessoa extends BaseController
{
	
	public function index()
	{

        

         $pessoa = new M_pessoa;
         $pessoa->nome = "Tiago Souza";
         $data = array(
            "pessoa01" => $pessoa->nome,
            "link_site" => "https://...",
            );
            echo view("minha_views", $data);
           

    //     echo "Meu nome é: " .$pessoa->nome;

    //     $pessoa2 = new M_pessoa;
    //     $pessoa2->nome = "David sander";

    //     echo "<br>Meu nome é: " .$pessoa2->nome;
	// 	//echo view("welcome_message");
	 }

     public function cadastro()
     {
        $data = array(
            "url_base" => base_url(),
            "titulo" => "Pagina cadastro pessoa"
            );
            
            echo view("template/header", $data);
            echo view("pessoa/cadastro");
            echo view("template/footer");
     }

     public function cadastrar()
    {
     echo"<pre>";
        print_r($_REQUEST);
        echo"</pre>";
    
}
}