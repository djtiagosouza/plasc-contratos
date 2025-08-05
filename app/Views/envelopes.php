    <div id="content-container">

        <div id="page-title">
            <h2>Envelope</h2>

    <?php if (empty($requisitos)): ?>
        <p>Nenhum Envelope encontrado.</p>
    <?php else: ?>
        <?php foreach ($requisitos as $req): ?>
            <div style="border:1px solid #ccc; margin-bottom:10px; padding:10px;">
                <p><strong>Nome do documento:</strong> <?= $req['attributes']['name']  ?? 'N/A' ?></p>
                <p><strong>ID do Signatário:</strong> <?= $req['id'] ?? 'N/A' ?></p>
                <p><strong>MSG:</strong> <?= $req['attributes']['default_subject'] ?? 'N/A' ?></p>
                <p><strong>Status:</strong> <?= $req['attributes']['status'] ?? 'N/A' ?></p>
                <a class="btn btn-primary" href="<?= $url_base ?>/home/Documentos/<?= $req['id'] ?>" role="button">Exibir Envelope</a>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>


        </div>
 </div>