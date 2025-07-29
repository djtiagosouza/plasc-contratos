<?php

namespace App\Models;

use \CodeIgniter\Model;

class Usuario extends Model
{
    protected $conexao;

    public function __construct($conexao)
    {
        $this->conexao = $conexao;
    }


  public function logar($usuario, $senha)
{
    $usuario = strtoupper(trim($usuario));

    $query = "SELECT 
                u.sn_ativo AS ATIVO,
                u.nm_usuario AS USUARIO,
                DBASGU.fnc_mv2000_hmvpep(u.cd_usuario, :senha) AS SENHA
              FROM 
                DBASGU.usuarios u,
                dbasgu.papel_usuarios pu 
              WHERE u.cd_usuario = pu.cd_usuario
                and u.cd_usuario = :usuario
                and pu.cd_papel = 628";

    $sql = oci_parse($this->conexao, $query);

    oci_bind_by_name($sql, ":usuario", $usuario);
    oci_bind_by_name($sql, ":senha", $senha);

    if (oci_execute($sql)) {
        $row = oci_fetch_array($sql, OCI_ASSOC + OCI_RETURN_NULLS);

        if ($row) {
            if ($row['ATIVO'] === 'S' && $row['SENHA'] === 'SENHA INVALIDA') {
                return ['erro' => 'Senha inválida'];
            } elseif ($row['ATIVO'] === 'N') {
                return ['erro' => 'Usuário inativo'];
            } elseif ($row['SENHA'] === 'USUARIO NAO CADASTRADO') {
                return ['erro' => 'Usuário não cadastrado'];
            } elseif ($row['ATIVO'] === 'S') {
                
                 return [
                    'usuario' => $row['USUARIO'],
                    'ativo' => $row['ATIVO']
                ];
            } else {
                return ['erro' => 'Erro desconhecido'];
            }
        } else {
            return ['erro' => 'Usuário sem acesso'];
        }
    } else {
        return ['erro' => 'Erro na execução da consulta'];
    }
}
}
