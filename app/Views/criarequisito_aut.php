<div id="content-container">

    <div id="page-title">
        <h1>Criar Requisitos de Autenticação</h1>

         <form action="<?= $url_base ?>/C_Contratos/CriaAutenticacao" method="post">

        <div class="col-md-6">
            <label for="autenticacao" class="form-label">Autenticação</label>
          <select class="form-select" id="autenticacao" name="autenticacao" required>
                <option value="">Selecione...</option>
                <option value="email">email</option>
                <option value="sms"> sms</option>
                <option value="whatsapp">whatsapp</option>
               
            </select>
        </div>
        <div class="col-12">
            <input type="hidden" name="idenvelope" value="<?= $idenvelope ?>">
            <input type="hidden" name="idmodelo" value="<?= $idmodelo ?>">
            <input type="hidden" name="idsignatario" value="<?= $idsignatario ?>">
            <button type="submit" class="btn btn-primary">Salvar</button>
        </div>
    </form>

        
        
    </div>
</div>
