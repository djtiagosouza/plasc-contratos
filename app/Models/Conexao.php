<?php
namespace App\Models;
use \CodeIgniter\Model;

class Conexao extends Model {

    public function Conecta() {

        $host = env('database.default.hostname');
        $database = env('database.default.database');
        $login_db = env('database.default.username'); 
        $senha_db = env('database.default.password');
        $db = oci_connect($login_db, $senha_db, $host, 'AL32UTF8'); 

        if (!$db) {
            echo "Erro: Na conexao do banco de dados oracle!<br />";
            $e = oci_error();
            trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
            print_r(htmlentities($e['message'], ENT_QUOTES));
        }
        return $db;
    }

}
