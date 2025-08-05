    <div id="content-container">

        <div id="page-title">
            <h2>Usuário do envelope</h2>

    <?php if (empty($requisitos)): ?>
        <p>Nenhum signatário encontrado.</p>
    <?php else: ?>
        <?php foreach ($requisitos as $req): ?>
            <div style="border:1px solid #ccc; margin-bottom:10px; padding:10px;">
                <p><strong>Nome:</strong> <?= $req['attributes']['name']  ?? 'N/A' ?></p>
                <p><strong>ID do Signatário:</strong> <?= $req['id'] ?? 'N/A' ?></p>
                <p><strong>Nascimento:&nbsp</strong><?= !empty($req['attributes']['birthday']) ? (new DateTime($req['attributes']['birthday']))->format('d/m/Y') : 'N/A' ?></p>
                <p><strong>Telefone:</strong> <?= $req['attributes']['phone_number'] ?? 'N/A' ?></p>
                <p><strong>CPF:</strong> <?= $req['attributes']['documentation'] ?? 'N/A' ?></p>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
   <a class="btn btn-primary" href="javascript:history.back()" role="button">Voltar</a>
   


        </div>
 </div>