    <div id="content-container">

        <div id="page-title">
            <h2>Templates</h2>

            <?php if (empty($requisitos)): ?>
                <p>Nenhum Templates encontrado.</p>
            <?php else: ?>
                <?php foreach ($requisitos as $req): ?>
                    <div style="border:1px solid #ccc; margin-bottom:15px; padding:12px; border-radius:6px; font-family: Arial, sans-serif; font-size:14px;">
                        <p><strong>Id:</strong><?= $req['id'] ?? 'N/A' ?></p>
                        <p><strong>Tipo:</strong> <?= $req['type']?? 'N/A' ?></p>
                        <p><strong>Links:</strong> <?= $req['links']['self'] ?? 'N/A' ?></p>
                        <p><strong>Arquivo:</strong> <?= $req['links']['files']['original'] ?? 'N/A' ?></p>
                        <p><strong>Nome:</strong> <?= $req['attributes']['name'] ?? 'N/A' ?></p>
                        <p><strong>Cor:</strong> <?= $req['attributes']['color'] ?? 'N/A' ?></p>
                        <p><strong>Data:</strong> <?= $req['attributes']['created'] ?? 'N/A' ?></p>
                        <p><strong>Modificado:</strong> <?= $req['attributes']['modified'] ?? 'N/A' ?></p>
                        <p><strong>Criado em:</strong> <?= $req['attributes']['created'] ?? 'N/A' ?></p>
                        <p><strong>Modificado em:</strong> <?= $req['attributes']['modified'] ?? 'N/A' ?></p>
                        <p><strong>Migrated:</strong> <?= isset($req['attributes']['migrated']) ? ($req['attributes']['migrated'] ? 'Sim' : 'Não') : 'N/A' ?></p>
                        
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>


        </div>
    </div>