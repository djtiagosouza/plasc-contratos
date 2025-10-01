<div id="content-container">

    <div id="page-title">
        <h1>Insere Segnatarios</h1>

        <?php if (session()->getFlashdata('erro')): ?>
            <div class="alert alert-danger"><?= session()->getFlashdata('erro') ?></div>
        <?php endif; ?>

        <form action="<?= $url_base ?>/C_Contratos/InsereSegnatario" method="post">


            <div class="col-md-6">
                <label for="nome" class="form-label">Nome Completo</label>
                <input type="text" class="form-control" id="nome" name="nome" required>
            </div>

            <div class="col-md-6">
                <label for="email" class="form-label">Email</label>
                <input type="text" class="form-control" id="email" name="email" required>
            </div>
            <div class="col-12">
                <input type="hidden" name="idenvelope" value="<?= $idenvelope ?>">
                <input type="hidden" name="idmodelo" value="<?= $idmodelo ?>">
                <button type="submit" class="btn btn-primary">Salvar</button>
            </div>
        </form>
        
    </div>

</div>