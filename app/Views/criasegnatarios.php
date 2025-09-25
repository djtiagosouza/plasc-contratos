<div id="content-container">

    <div id="page-title">
        <h1>Criar Envelope</h1>

        <?php if(session()->getFlashdata('erro')): ?>
            <div class="alert alert-danger"><?= session()->getFlashdata('erro') ?></div>
        <?php endif; ?>
        
        <form action="<?= $url_base ?>/C_Contratos/CriaSegnatarios" method="post">


            <div class="col-md-6">
                <label for="nome" class="form-label">Nome do envelope</label>
                <input type="text" class="form-control" id="nome" name="nome" required>
                <input type="hidden" name="idenvelope" value="<?= $idenvelope ?>">  
                <button type="submit" class="btn btn-primary">Inserir</button>
            </div>
        </form>
        <div id="page-title">Id da pasta: <?= $idpasta?></div>
    </div>
   
</div>
 