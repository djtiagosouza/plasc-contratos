<?php

namespace App\Models;

use \CodeIgniter\Model;

class Consultar_banco extends Model
{
    private $conexao;

    public function __construct($conexao)
    {

        $this->conexao = $conexao;
    }

    public function Buscar_contrato($contrato)
    {
        $sql = "SELECT 
                C.CD_CONTRATO AS CD_CONTRATO,
                C.NM_RESPONSAVEL_FINANCEIRO,
                CD_MATRICULA,
                C.CD_VENDEDOR,
                C.NR_DIA_VENCIMENTO,
                C.CD_METODO_VENDA,
                C.TP_CONTRATO,
                C.CD_PLANO,
                PC.CD_TABELA_PRECO
            FROM DBAPS.CONTRATO C,
                 DBAPS.PLANO_CONTRATO PC
                 
            WHERE C.CD_CONTRATO = :cd_contrato
            AND C.CD_CONTRATO = PC.CD_CONTRATO";

        $stmt = oci_parse($this->conexao, $sql);
        oci_bind_by_name($stmt, ":cd_contrato", $contrato);
        oci_execute($stmt);

        $row = oci_fetch_assoc($stmt);

        oci_free_statement($stmt);

        return $row;
    }
}
