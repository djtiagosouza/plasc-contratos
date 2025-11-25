<div id="content-container">
  <h1>Dados do Contrato</h1>


  <form action="<?= $url_base ?>/GeraContratos/Gera_Contrato" method="post" class="form-contrato">

    <h5>Dados do Responsável Financeiro</h5>
    <div class="form-grid">

      <label>Nome
        <input type="text" name="nome" required value="<?= set_value('nome') ?>">
      </label>

      <label>Filiação
        <input type="text" name="filiacao" required value="<?= set_value('filiacao') ?>">
      </label>

      <label>CPF
        <input type="text" name="cpf" required value="<?= set_value('cpf') ?>">
      </label>

      <label>RG
        <input type="text" name="rg" required value="<?= set_value('rg') ?>">
      </label>

      <label>Órgão Expedidor
        <input type="text" name="orgao_expedidor" required value="<?= set_value('orgao_expedidor') ?>">
      </label>

      <label>Endereço
        <input type="text" name="endereco" required value="<?= set_value('endereco') ?>">
      </label>

      <label>Bairro
        <input type="text" name="bairro" required value="<?= set_value('bairro') ?>">
      </label>

      <label>Município
        <input type="text" name="municipio" required value="<?= set_value('municipio') ?>">
      </label>

      <label>UF
        <input type="text" name="uf" maxlength="2" required value="<?= set_value('uf') ?>">
      </label>

      <label>CEP
        <input type="text" name="cep" required value="<?= set_value('cep') ?>">
      </label>

      <label>Data de Nascimento
        <input type="date" name="data_nascimento" required value="<?= set_value('data_nascimento') ?>">
      </label>

      <label>Telefone
        <input type="text" name="telefone" required value="<?= set_value('telefone') ?>">
      </label>
    </div>

    <h5>Dados do Envelope</h5>
    <div class="form-grid">
      <label>E-mail
        <input type="email" name="email" required value="<?= set_value('email') ?>">
      </label>

      <label>Qualificação
        <select name="qualificacao" required>
          <option value="">Selecione...</option>
          <option value="approve" <?= set_select('qualificacao', 'approve') ?>>Aprovar</option>
          <option value="administrator" <?= set_select('qualificacao', 'administrator') ?>>Administrador</option>
          <option value="contractee" <?= set_select('qualificacao', 'contractee') ?>>Contratada</option>
          <option value="contractor" <?= set_select('qualificacao', 'contractor') ?>>Contratante</option>
        </select>
      </label>

      <label>Autenticação
        <select name="autenticacao" required>
          <option value="">Selecione...</option>
          <option value="email" <?= set_select('autenticacao', 'email') ?>>Email</option>
          <option value="sms" <?= set_select('autenticacao', 'sms') ?>>SMS</option>
          <option value="whatsapp" <?= set_select('autenticacao', 'whatsapp') ?>>WhatsApp</option>
        </select>
      </label>

      <label>Plano
        <select name="id_modelo" required>
          <option value="">Selecione...</option>
          <option value="1dc9ed77-e41e-4b0c-bdd4-71c9eb51cc65" <?= set_select('id_modelo', '1dc9ed77-e41e-4b0c-bdd4-71c9eb51cc65') ?>>Multipasc IX Enfermaria</option>
          <option value="copart.php" <?= set_select('plano', 'copart.php') ?>>Multipasc X COPART (referência)</option>
          <option value="xix_30.php" <?= set_select('plano', 'xix_30.php') ?>>Multipasc XIX - 30</option>
          <option value="xix_50.php" <?= set_select('plano', 'xix_50.php') ?>>Multipasc XIX - 50</option>
          <option value="xxii_30.php" <?= set_select('plano', 'xxii_30.php') ?>>Multipasc XXII - 30</option>
          <option value="xxii_50.php" <?= set_select('plano', 'xxii_50.php') ?>>Multipasc XXII - 50</option>
          <option value="plasc2_30.php" <?= set_select('plano', 'plasc2_30.php') ?>>Plasc 2 - 30</option>
          <option value="6445e278-d832-4c3b-8635-f9acd542c434|Plasc 2 - 50" <?= set_select('plano', 'Plasc 2 - 50') ?>>Plasc 2 - 50</option>
          <option value="declaracao_saude.php" <?= set_select('plano', 'declaracao_saude.php') ?>>PLASC - Declaração de Saúde</option>
        </select>
      </label>
    </div>

    <div class="botoes-form">
      <a href="<?= $url_base ?>/home/GeraContrato" class="btn limpar">Limpar</a>
      <button type="submit" class="btn enviar">Enviar</button>

    </div>
  </form>
</div>