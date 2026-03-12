
<div class="form-grid">
<div class='dashboard-app'>     
        <div class='dashboard-content'>
            <div class='container'>
                <div class='card'>
                    <div class='card-header'>
                        <h1>Bem - Vindos</h1>
                    </div>
                    <div class='card-body'>
                        <p>Plano de saúde Plasc</p>
                         <div id="content-container">

        <div id="page-title">
            <h2>Envelopes</h2>

            <?php if (empty($consulta)): ?>
                <p>Nenhum Envelope encontrado.</p>
            <?php else: ?>
                
                <?php
                //funsão para ordernar
                usort($consulta, function ($a, $b) {
                    $dateA = strtotime($a['attributes']['created'] ?? '0');
                    $dateB = strtotime($b['attributes']['created'] ?? '0');
                    return $dateB <=> $dateA; // crescente
                    // return $dateB <=> $dateA; // decrescente
                });
                ?>

                <?php foreach ($consulta as $req): ?>
                    <div style="border:1px solid #ccc; margin-bottom:15px; padding:12px; border-radius:6px; font-family: Arial, sans-serif; font-size:14px;">
                        <p><strong>Id:</strong><?= $req['id'] ?? 'N/A' ?></p>
                        <p><strong>Nome:</strong> <?= $req['attributes']['name'] ?? 'N/A' ?></p>
                        <p><strong>Status:</strong> <?= $req['attributes']['status'] ?? 'N/A' ?></p>
                        <p><strong>Prazo:</strong> <?= $req['attributes']['deadline_at'] ?? 'N/A' ?></p>
                        <p><strong>Locale:</strong> <?= $req['attributes']['locale'] ?? 'N/A' ?></p>
                        <p><strong>Auto Close:</strong> <?= isset($req['attributes']['auto_close']) ? ($req['attributes']['auto_close'] ? 'Sim' : 'Não') : 'N/A' ?></p>
                        <p><strong>Rubric Enabled:</strong> <?= isset($req['attributes']['rubric_enabled']) ? ($req['attributes']['rubric_enabled'] ? 'Sim' : 'Não') : 'N/A' ?></p>
                        <p><strong>Intervalo de Lembrete:</strong> <?= $req['attributes']['remind_interval'] ?? 'N/A' ?></p>
                        <p><strong>Bloquear após Recusa:</strong> <?= isset($req['attributes']['block_after_refusal']) ? ($req['attributes']['block_after_refusal'] ? 'Sim' : 'Não') : 'N/A' ?></p>
                        <p><strong>Assunto Padrão:</strong> <?= $req['attributes']['default_subject'] ?? 'N/A' ?></p>
                        <p><strong>Mensagem Padrão:</strong> <?= $req['attributes']['default_message'] ?? 'N/A' ?></p>
                        <p><strong>Criado em:</strong> <?= $req['attributes']['created'] ?? 'N/A' ?></p>
                        <p><strong>Modificado em:</strong> <?= $req['attributes']['modified'] ?? 'N/A' ?></p>
                        <p><strong>Migrated:</strong> <?= isset($req['attributes']['migrated']) ? ($req['attributes']['migrated'] ? 'Sim' : 'Não') : 'N/A' ?></p>
                        <p><strong>Metadata:</strong><?php if (!empty($req['attributes']['metadata'])) {
                                                            echo json_encode($req['attributes']['metadata']);
                                                        } else {
                                                            echo 'N/A';
                                                        } ?></p>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>


        </div>
    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

