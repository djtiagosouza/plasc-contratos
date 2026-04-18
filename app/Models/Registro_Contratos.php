<?php

namespace App\Models;

use \CodeIgniter\Model;

class Registro_Contratos extends Model
{
    protected $conexao;

    public function __construct($conexao)
    {
        $this->conexao = $conexao;
    }


    public function Registro($dados_registro)
    {
        $sql = "INSERT INTO CN_PCONSULTOR.REGISTRO_CONTRATOS (
        ID_PASTA,
        ID_ENVELOPE,
        ID_TEMPLATE,
        ID_SEGNATARIO,
        NM_ENVELOPE,
        NM_SEGURADO,
        NR_CPF,
        NM_TEMPLATE,
        TP_CONTRATO,
        DT_CRIACAO,
        DS_STATUS,
        CD_VENDEDOR
    ) VALUES (
        :id_pasta,
        :id_envelope,
        :id_template,
        :id_segnatario,
        :nome_pasta,
        :nome_segurado,
        :nr_cpf,
        :template_nome,
        :tp_contrato,
        sysdate,
        :ds_status,
        :cd_vendedor
    )";

        $stmt = oci_parse($this->conexao, $sql);

        oci_bind_by_name($stmt, ':id_pasta', $dados_registro['id_pasta']);
        oci_bind_by_name($stmt, ':id_envelope', $dados_registro['id_envelope']);
        oci_bind_by_name($stmt, ':id_template', $dados_registro['id_template']); // corrigido
        oci_bind_by_name($stmt, ':id_segnatario', $dados_registro['id_segnatario']);
        oci_bind_by_name($stmt, ':nome_pasta', $dados_registro['nome_pasta']);
        oci_bind_by_name($stmt, ':nome_segurado', $dados_registro['nome_segurado']);
        oci_bind_by_name($stmt, ':nr_cpf', $dados_registro['nr_cpf']);
        oci_bind_by_name($stmt, ':template_nome', $dados_registro['template_nome']);
        oci_bind_by_name($stmt, ':tp_contrato', $dados_registro['tp_contrato']);
        oci_bind_by_name($stmt, ':ds_status', $dados_registro['ds_status']);
        oci_bind_by_name($stmt, ':cd_vendedor', $dados_registro['cd_vendedor']);

        $exec = oci_execute($stmt, OCI_NO_AUTO_COMMIT);

        if (!$exec) {
            $e = oci_error($stmt);
            oci_rollback($this->conexao);

            throw new Exception('Erro ao executar INSERT: ' . $e['message']);
        }

        oci_commit($this->conexao);

        return true;
    }

    public function Busca_registro()
    {

        $sql = "SELECT ID_PASTA,
        ID_ENVELOPE,
        ID_TEMPLATE,
        ID_SEGNATARIO,
        NM_ENVELOPE,
        NM_SEGURADO,
        NR_CPF,
        NM_TEMPLATE,
        TP_CONTRATO,
        DT_CRIACAO,
        DECODE(DS_STATUS, 'A',  'ABERTO',
                          'P', 'PENDENTE') AS DS_STATUS,
        CD_VENDEDOR FROM cn_pconsultor.registro_contratos";

        $stmt = oci_parse($this->conexao, $sql);

        if (!$stmt) {
            $e = oci_error($this->conexao);
            throw new Exception('Erro ao preparar a query: ' . $e['message']);
        }

        $exec = oci_execute($stmt);

        if (!$exec) {
            $e = oci_error($stmt);
            throw new Exception('Erro ao executar a query: ' . $e['message']);
        }

        $resultados = [];

        while ($row = oci_fetch_assoc($stmt)) {
            $resultados[] = $row;
        }

        oci_free_statement($stmt);

        return $resultados;
    }
}
