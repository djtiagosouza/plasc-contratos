<!DOCTYPE html>
<html>
<head>
    <title>Signatários</title>
</head>
<body>
    <h1>Lista de Signatários</h1>
    <ul>
        <?php foreach ($signers as $signer): ?>
            <li>
                <strong>Nome:</strong> <?= esc($signer['attributes']['name']) ?><br>
                <strong>Email:</strong> <?= esc($signer['attributes']['email']) ?><br>
                <strong>CPF:</strong> <?= esc($signer['attributes']['documentation']) ?><br>
                <strong>Criado em:</strong> <?= esc($signer['attributes']['created']) ?><br>
                <strong>Telefone:</strong> <?= esc($signer['attributes']['phone_number']) ?><br><br>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
