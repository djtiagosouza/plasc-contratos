<!DOCTYPE html>
<html>
<head>
    <title>Signatários do Envelope</title>
</head>
<body>
    <h2>Signatários do Envelope</h2>

    <?php if (empty($requisitos)): ?>
        <p>Nenhum signatário encontrado.</p>
    <?php else: ?>
        <?php foreach ($requisitos as $req): ?>
            <div style="border:1px solid #ccc; margin-bottom:10px; padding:10px;">
                <p><strong>ID do Signatário:</strong> <?= $req['relationships']['signer']['data']['id'] ?? 'N/A' ?></p>
                <p><strong>Ação:</strong> <?= $req['attributes']['action'] ?? 'N/A' ?></p>
                <p><strong>Status:</strong> <?= $req['attributes']['status'] ?? 'N/A' ?></p>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</body>
</html>
