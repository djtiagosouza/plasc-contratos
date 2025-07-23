<?php
namespace App\Models;
use \CodeIgniter\Model;

class Conexao extends Model {

    public function Conecta() {

        $host = ""; oraclescanscjf01/sml
        $database = ""; producao
        $login_db = ""; cn_treinamento_php
        $senha_db = ""; -Btc,@3zY0xq.xPhCw3Ab{5
        $db = oci_connect($login_db, $senha_db, $host, 'AL32UTF8'); //conecta ao mysql

        if (!$db) {
            echo "Erro: Na conexao do banco de dados oracle!<br />";
            $e = oci_error();
            trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
            print_r(htmlentities($e['message'], ENT_QUOTES));
        }
        return $db;
    }

}
