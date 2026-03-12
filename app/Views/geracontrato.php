<main class="grid grid-main">
<div class="content-container">
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
          <option value="42fffd5b-c3a6-422b-b5f5-cb2ab379cdf1|IND - MULTIPLASC IX ENF" <?= set_select('id_modelo', '42fffd5b-c3a6-422b-b5f5-cb2ab379cdf1') ?>>IND - MULTIPLASC IX ENF</option>
          <option value="66e6ecdf-3b99-4735-873a-2d672ea2f216|IND - MULTIPLASC XIX APT 30%" <?= set_select('id_modelo', '66e6ecdf-3b99-4735-873a-2d672ea2f216') ?>>IND - MULTIPLASC XIX APT 30%</option>
          <option value="495cfa1c-38c8-4b2b-865f-0e05f1e16a8a|IND - MULTIPLASC XIX APT 50%" <?= set_select('id_modelo', '495cfa1c-38c8-4b2b-865f-0e05f1e16a8a') ?>>ND - MULTIPLASC XIX APT 50%</option>
          <option value="f71f9cc8-98c9-4152-ac2c-bbf95e54707c|IND - MULTIPLASC XXII ENF 30%" <?= set_select('id_modelo', 'f71f9cc8-98c9-4152-ac2c-bbf95e54707c') ?>>IND - MULTIPLASC XXII ENF 30%</option>
          <option value="320270bb-949e-4f6b-a339-4ea43682f832|IND - MULTIPLASC XXII ENF 50%" <?= set_select('id_modelo', '320270bb-949e-4f6b-a339-4ea43682f832') ?>>IND - MULTIPLASC XXII ENF 50%</option>
          <option value="cc6d6025-2b9d-4e1a-ad7f-0b3ba72c838b|IND - PLASC 2 30%" <?= set_select('id_modelo', 'cc6d6025-2b9d-4e1a-ad7f-0b3ba72c838b') ?>>IND - PLASC 2 30%</option>
          <option value="32d2cd20-fd62-49d1-8d60-792f07913191|IND - PLASC 2 50%" <?= set_select('id_modelo', '32d2cd20-fd62-49d1-8d60-792f07913191') ?>>IND - PLASC 2 50%</option>
          <option value="d99e17e7-dccf-4afb-b19b-f8d23f0a2aa9|IND REF - MULTIPLASC X - COPART ENF" <?= set_select('id_modelo', 'd99e17e7-dccf-4afb-b19b-f8d23f0a2aa9') ?>>IND REF - MULTIPLASC X - COPART ENF</option>
        </select>
      </label>
    </div>

    <div class="botoes-form">
      <a href="<?= $url_base ?>/home/GeraContrato" class="btn limpar">Limpar</a>
      <button type="submit" class="btn enviar">Enviar</button>

    </div>
  </form>
</div>
</main>