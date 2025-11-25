<?php

namespace App\Models;

use \CodeIgniter\Model;

class Adesao extends Model
{

    private $conexao;

    public function __construct($conexao)
    {

        $this->conexao = $conexao;
    }


    public function CriaProposta(){

         $sql = "INSERT into proposta
        ( cd_proposta
        , cd_vendedor
        , cd_emp_vendedora
        , cd_unidade_venda
        , cd_proposta_interno
        , dt_proposta
        , dt_criacao
        , ds_observacao
        , tp_status
        , dt_temp_contrato_vencimento
        , tp_temp_contrato_tipo
        , cd_metodo_venda
        , sn_erro_importacao
        , cd_multi_empresa)

        VALUES
        ( 
          'SEQ_PROPOSTA.NEXTVAL'
        , '51' //CODOGO DO VENDEDOR
        , '1'
        , '1' //UNIDADE DE VENDA
        , 'SEQ_ADESAO_TESTE.NEXTVAL'
        , TO_DATE(SYSDATE, 'DD/MM/YY')
        , TO_DATE(SYSDATE, 'DD/MM/YY')
        , 'TESTE OBS'
        , 'P'
        , '$this->data_temporario_contrato_vencimento'
        , '$this->tipo_temporario_contrato_tipo'
        , '$this->codigo_metodo_venda'
        , 'N'
        , '1')";


    }


    public function CriaTitular($dados)
    {
        $sql = "INSERT INTO dbaps.proposta_usuario
        ( 
        cd_proposta_usuario,
        cd_proposta,
        nm_segurado,
        tp_estado_civil,
        tp_sexo,
        dt_nascimento,
        cd_plano,
        tp_usuario,
        nm_mae,
        nr_cep,
        ds_endereco,
        nr_endereco,
        ds_complemento,
        ds_bairro,
        nm_cidade,
        nm_uf,
        dt_adesao,
        cd_tabela_preco,
        sn_erro_importacao,
        cd_mat_alternativa
        )
    VALUES
    (
        SEQ_ADESAO_TESTE.NEXTVAL, :nome, :data_nascimento, :telefone, :mae, :pai, :cpf, :cns,
        :sexo, :estado_civil, 'TITULAR', :endereco, :bairro, :municipio, :uf, :cep, :numero, :complemento,
        :email, :usuario_criador
    )";


        $stid = oci_parse($this->conexao, $sql);

        foreach ($dados as $key => $value) {
            oci_bind_by_name($stid, ":" . $key, $dados[$key]);
        }

        // var_dump($dados);

        if (!oci_execute($stid)) {
            $e = oci_error($stid);
            die("❌ Erro ao executar SQL:<br>" . $e['message']);
        }

        oci_commit($this->conexao);
        return true;
    }

    public function criadependente($dependentes)
    {
        $sql = "INSERT INTO adesao_teste
    (
        id, nome, data_nascimento, telefone, mae, pai, cpf, cns, sexo, estado_civil, grau_parentesco,
        endereco, bairro, municipio, uf, cep, numero, complemento, email, usuario_criador
    )
    VALUES
    (
        SEQ_ADESAO_TESTE.NEXTVAL, :nome, :data_nascimento, :telefone, :mae, :pai, :cpf, :cns,
        :sexo, :estado_civil, :parentesco, :endereco, :bairro, :municipio, :uf, :cep, :numero, :complemento,
        :email, :usuario_criador
    )";

        foreach ($dependentes as $dep) {
            $stid = oci_parse($this->conexao, $sql);

            foreach ($dep as $key => $value) {
                oci_bind_by_name($stid, ":" . $key, $dep[$key]);
            }

            if (!oci_execute($stid)) {
                $e = oci_error($stid);
                die("❌ Erro ao inserir dependente:<br>" . $e['message']);
            }
        }

        oci_commit($this->conexao);
        return true;
    }

                private function SequenciaProposta() {
                $sql = "SELECT dbaps.seq_proposta.nextval AS cd_proposta from dual";
                $stid = oci_parse($this->conexao, $sql);
                oci_execute($stid);
                if (($row = oci_fetch_array($stid, OCI_ASSOC + OCI_RETURN_NULLS)) != false) {
                    return $row['CD_PROPOSTA'];
                }
            }

            private function SequenciaPropostaInterna() {
                $sql = "SELECT cn_portal_consultor.seq_nr_proposta.nextval AS numero from dual";
                $stid = oci_parse($this->conexao, $sql);
                oci_execute($stid);
                if (($row = oci_fetch_array($stid, OCI_ASSOC + OCI_RETURN_NULLS)) != false) {
                    return $row['NUMERO'];
                }
            }

            private function SequenciaPropostaUsuario() {
                $sql = "SELECT dbaps.seq_proposta_usuario.nextval AS numero from dual";
                $stid = oci_parse($this->conexao, $sql);
                oci_execute($stid);
                if (($row = oci_fetch_array($stid, OCI_ASSOC + OCI_RETURN_NULLS)) != false) {
                    return $row['NUMERO'];
                }
            }
}
