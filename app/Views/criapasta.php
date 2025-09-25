<div id="content-container">

    <div id="page-title">
        <h1>Criar Pasta</h1>

        <?php if(session()->getFlashdata('erro')): ?>
            <div class="alert alert-danger"><?= session()->getFlashdata('erro') ?></div>
        <?php endif; ?>
       
        <form action="<?= $url_base ?>/C_Contratos/CriaPasta" method="post">


            <div class="col-md-6">
                <label for="nome" class="form-label">Nome da pasta</label>
                <input type="text" class="form-control" id="nome" name="nome" required>  
                <button type="submit" class="btn btn-primary">Próximo</button>
               
            </div>
        </form>
        
    </div>
</div>