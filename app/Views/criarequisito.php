<div id="content-container">

    <div id="page-title">
        <h1>Criar Requisitos Qualificação</h1>

         <form action="<?= $url_base ?>/C_Contratos/CriaQualificacao" method="post">

        <div class="col-md-6">
            <label for="qualificacao" class="form-label">Qualificação</label>
            <select class="form-select" id="qualificacao" name="qualificacao" required>
                <option value="">Selecione...</option>
                <option value="approve">Aprovar</option>
                <option value="administrator">Administrador</option>
                <option value="contractee">Contratada</option>
                <option value="contractor">Contratante</option>
               
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
