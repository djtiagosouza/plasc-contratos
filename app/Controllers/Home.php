<?php namespace App\Controllers;

class Home extends BaseController
{
	
	public function index()
	{
		
		$data = array(
            "url_base" => base_url(),
			"titulo" => "home"
            );
		echo view("template/header", $data);
		//echo view("minha_views");
		echo view("template/minha_pagina");
		echo view("template/footer");
	}

	


}
