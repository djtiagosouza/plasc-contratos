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


    public function CriaProposta()
    {

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

    public function cria_proposta_dependente($dados)
    {
        $sql = "INSERT INTO dbaps.proposta
    (
        cd_proposta,
        cd_vendedor,
        cd_emp_vendedora,
        cd_unidade_venda,
        cd_proposta_interno,
        dt_proposta,
        dt_criacao,
        cd_titular_contrato,
        cd_contrato,
        ds_observacao,
        tp_status,
        dt_temp_contrato_vencimento,
        tp_temp_contrato_tipo,
        cd_metodo_venda,
        sn_erro_importacao,
        cd_multi_empresa
    )
    VALUES
    (
        SEQ_PROPOSTA.NEXTVAL,
        :vendedor,
        1,
        1,
        SEQ_ADESAO_TESTE.NEXTVAL,
        SYSDATE,
        SYSDATE,
        :matricula,
        :contrato,
        'Teste novo portal',
        'P',
        :vencimento,
        'I',
        :metodo,
        'N',
        1
    )
    RETURNING cd_proposta INTO :cd_proposta";

        $stmt = oci_parse($this->conexao, $sql);

   
        $vendedor   = $dados['CD_VENDEDOR'];
        $matricula  = $dados['CD_MATRICULA'];
        $contrato   = $dados['CD_CONTRATO'];
        $metodo     = $dados['CD_METODO_VENDA'];
        $vencimento = $dados['NR_DIA_VENCIMENTO'];

        oci_bind_by_name($stmt, ":vendedor", $vendedor);
        oci_bind_by_name($stmt, ":matricula", $matricula);
        oci_bind_by_name($stmt, ":contrato", $contrato);
        oci_bind_by_name($stmt, ":metodo", $metodo);
        oci_bind_by_name($stmt, ":vencimento", $vencimento);
        oci_bind_by_name($stmt, ":cd_proposta", $cdProposta, 32);

        if (!oci_execute($stmt)) {
            $e = oci_error($stmt);
            die("Erro ao inserir proposta: " . $e['message']);
        }

        oci_free_statement($stmt);

        return $cdProposta;
    }

    public function Gera_Proposta_Usuario_Dependente($dependente)
{
    $sql = "INSERT INTO dbaps.proposta_usuario
    (
        cd_proposta_usuario,
        cd_proposta,
        ds_observacao,
        nm_segurado,
        tp_estado_civil,
        tp_sexo,
        dt_nascimento,
        cd_plano,
        tp_usuario,
        nm_mae,
        nm_pai,
        cd_parentesco,
        nr_cpf,
        ds_email,
        nr_cep,
        ds_endereco,
        nr_endereco,
        ds_complemento,
        ds_bairro,
        nm_cidade,
        nm_uf,
        nr_telefone,
        nr_cns,
        dt_adesao,
        cd_tabela_preco,
        sn_erro_importacao,
        cd_mat_alternativa
    )
    VALUES
    (
        seq_proposta_usuario.nextval,
        :proposta,
        'teste novo portal',
        :nome,
        :estado_civil,
        :sexo,
        TO_DATE(:data_nascimento, 'DD/MM/YYYY'),
        :plano,
        'D',
        :mae,
        :pai,
        :parentesco,
        :cpf,
        :email,
        :cep,
        :endereco,
        :numero,
        :complemento,
        :bairro,
        :municipio,
        :uf,
        :telefone,
        :cns,
        SYSDATE,
        :tabela_preco,
        'N',
        :cpf
    )
    RETURNING cd_proposta_usuario INTO :cd_proposta_usuario";

    $stid = oci_parse($this->conexao, $sql);

    // Variáveis
    $proposta        = $dependente['proposta'];
    $nome            = $dependente['nome'];
    $estado_civil    = $dependente['estado_civil'];
    $sexo            = $dependente['sexo'];
    $data_nascimento = $dependente['data_nascimento'];
    $plano           = $dependente['plano'];
    $mae             = $dependente['mae'];
    $pai             = $dependente['pai'];
    $parentesco      = $dependente['parentesco'];
    $cpf             = $dependente['cpf'];
    $email           = $dependente['email'];
    $cep             = $dependente['cep'];
    $endereco        = $dependente['endereco'];
    $numero          = $dependente['numero'];
    $complemento     = $dependente['complemento'];
    $bairro          = $dependente['bairro'];
    $municipio       = $dependente['municipio'];
    $uf              = $dependente['uf'];
    $telefone        = $dependente['telefone'];
    $cns             = $dependente['cns'];
    $tabelapreco     = $dependente['tabelapreco'];

    $cd_proposta_usuario = null;

    // Bind
    oci_bind_by_name($stid, ":proposta", $proposta);
    oci_bind_by_name($stid, ":nome", $nome);
    oci_bind_by_name($stid, ":estado_civil", $estado_civil);
    oci_bind_by_name($stid, ":sexo", $sexo);
    oci_bind_by_name($stid, ":data_nascimento", $data_nascimento);
    oci_bind_by_name($stid, ":plano", $plano);
    oci_bind_by_name($stid, ":mae", $mae);
    oci_bind_by_name($stid, ":pai", $pai);
    oci_bind_by_name($stid, ":parentesco", $parentesco);
    oci_bind_by_name($stid, ":cpf", $cpf);
    oci_bind_by_name($stid, ":email", $email);
    oci_bind_by_name($stid, ":cep", $cep);
    oci_bind_by_name($stid, ":endereco", $endereco);
    oci_bind_by_name($stid, ":numero", $numero);
    oci_bind_by_name($stid, ":complemento", $complemento);
    oci_bind_by_name($stid, ":bairro", $bairro);
    oci_bind_by_name($stid, ":municipio", $municipio);
    oci_bind_by_name($stid, ":uf", $uf);
    oci_bind_by_name($stid, ":telefone", $telefone);
    oci_bind_by_name($stid, ":cns", $cns);
    oci_bind_by_name($stid, ":tabela_preco", $tabelapreco);
    oci_bind_by_name($stid, ":cd_proposta_usuario", $cd_proposta_usuario, 32);

    // Execução
    if (!oci_execute($stid)) {
        $e = oci_error($stid);
        die("❌ Erro ao executar SQL:<br>" . $e['message']);
    }

    oci_free_statement($stid);

    return $cd_proposta_usuario;
}



    private function SequenciaProposta()
    {
        $sql = "SELECT dbaps.seq_proposta.nextval AS cd_proposta from dual";
        $stid = oci_parse($this->conexao, $sql);
        oci_execute($stid);
        if (($row = oci_fetch_array($stid, OCI_ASSOC + OCI_RETURN_NULLS)) != false) {
            return $row['CD_PROPOSTA'];
        }
    }

    private function SequenciaPropostaInterna()
    {
        $sql = "SELECT cn_portal_consultor.seq_nr_proposta.nextval AS numero from dual";
        $stid = oci_parse($this->conexao, $sql);
        oci_execute($stid);
        if (($row = oci_fetch_array($stid, OCI_ASSOC + OCI_RETURN_NULLS)) != false) {
            return $row['NUMERO'];
        }
    }

    private function SequenciaPropostaUsuario()
    {
        $sql = "SELECT dbaps.seq_proposta_usuario.nextval AS numero from dual";
        $stid = oci_parse($this->conexao, $sql);
        oci_execute($stid);
        if (($row = oci_fetch_array($stid, OCI_ASSOC + OCI_RETURN_NULLS)) != false) {
            return $row['NUMERO'];
        }
    }
}
