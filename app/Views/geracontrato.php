<div id="content-container">
<h1>Gera Contrato</h1>

<form action="<?= $url_base ?>/C_Contratos/CriaContrato" method="post">
  

  <div class="col-md-6">
    <label for="nome" class="form-label">Nome Completo</label>
    <input type="text" class="form-control" id="nome" name="nome" required>
  </div>

  <div class="col-md-6">
    <label for="cpf" class="form-label">CPF</label>
    <input type="text" class="form-control" id="cpf" name="cpf" maxlength="11" required>
  </div>

  <div class="col-md-6">
    <label for="telefone" class="form-label">Telefone</label>
    <input type="text" class="form-control" id="telefone" name="telefone" required>
  </div>

  <div class="col-md-6">
    <label for="data_nascimento" class="form-label">Data de Nascimento</label>
    <input type="date" class="form-control" id="data_nascimento" name="data_nascimento" required>
  </div>

  <div class="col-md-6">
    <label for="sexo" class="form-label">Sexo</label>
    <select class="form-select" id="sexo" name="sexo" required>
      <option value="">Selecione...</option>
      <option value="M">Masculino</option>
      <option value="F">Feminino</option>
      <option value="O">Outro</option>
    </select>
  </div>

  <div class="col-md-6">
    <label for="data_contratacao" class="form-label">Data de Contratação</label>
    <input type="date" class="form-control" id="data_contratacao" name="data_contratacao" required>
  </div>

  <div class="col-md-6">
    <label for="tipo_plano" class="form-label">Tipo de Plano</label>
    <input type="text" class="form-control" id="tipo_plano" name="tipo_plano" required>
  </div>

  <div class="col-12">
    <button type="submit" class="btn btn-primary">Salvar</button>
  </div>
</form>

</div>
