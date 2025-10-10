<div id="content-container">
  <h1><?= $plano ?></h1>

  <?php if (session()->getFlashdata('erro')): ?>
    <div class="alert alert-danger"><?= session()->getFlashdata('erro') ?></div>
  <?php endif; ?>

  <form action="<?= $url_base ?>/GeraContratos/Gera_Contrato" method="post" class="form-contrato">

    <div class="form-grid">
      <label>Nome
        <input type="text" name="nome" required>
      </label>

      <label>Filiação
        <input type="text" name="filiacao" required>
      </label>

      <label>CPF
        <input type="text" name="cpf" required>
      </label>

      <label>RG
        <input type="text" name="rg" required>
      </label>

      <label>Órgão Expedidor
        <input type="text" name="orgao_expedidor" required>
      </label>

      <label>Endereço
        <input type="text" name="endereco" required>
      </label>

      <label>Bairro
        <input type="text" name="bairro" required>
      </label>

      <label>Município
        <input type="text" name="municipio" required>
      </label>

      <label>UF
        <input type="text" name="uf" maxlength="2" required>
      </label>

      <label>CEP
        <input type="text" name="cep" required>
      </label>

      <label>E-mail
        <input type="email" name="email" required>
      </label>

      <label>Data de Nascimento
        <input type="date" name="data_nascimento" required>
      </label>

      <label>Telefone
        <input type="text" name="telefone" required>
      </label>
      <label>Qualificação
        <select class="select" name="qualificacao" required>
          <option value="">Selecione...</option>
          <option value="approve">Aprovar</option>
          <option value="administrator">Administrador</option>
          <option value="contractee">Contratada</option>
          <option value="contractor">Contratante</option>

        </select>
      </label>
    </div>

    <div class="botoes-form">
      <button type="reset">Limpar</button>
      <button type="submit">Enviar</button>
    </div>
  </form>
</div>