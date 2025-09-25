    <div id="content-container">

        <div id="page-title">
            <h2>Usuário do envelope</h2>

    <?php if (empty($requisitos)): ?>
        <p>Nenhum Registro encontrado.</p>
    <?php else: ?>
        <table border="1" cellpadding="8" cellspacing="0" style="border-collapse: collapse; width:100%; font-family: Arial, sans-serif; font-size:14px;">
    <thead style="background:#f2f2f2;">
        <tr>
            <th>Nome</th>
            <th>Status</th>
            <th>Prazo (deadline_at)</th>
            <th>Locale</th>
            <th>Auto Close</th>
            <th>Rubric Enabled</th>
            <th>Intervalo de Lembrete</th>
            <th>Bloquear após Recusa</th>
            <th>Assunto Padrão</th>
            <th>Mensagem Padrão</th>
            <th>Criado em</th>
            <th>Modificado em</th>
            <th>Migrated</th>
            <th>Metadata</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($requisitos as $req): ?>
            <tr>
                <td><?= $req['attributes']['name'] ?? 'N/A' ?></td>
                <td><?= $req['attributes']['status'] ?? 'N/A' ?></td>
                <td><?= $req['attributes']['deadline_at'] ?? 'N/A' ?></td>
                <td><?= $req['attributes']['locale'] ?? 'N/A' ?></td>
                <td><?= isset($req['attributes']['auto_close']) ? ($req['attributes']['auto_close'] ? 'Sim' : 'Não') : 'N/A' ?></td>
                <td><?= isset($req['attributes']['rubric_enabled']) ? ($req['attributes']['rubric_enabled'] ? 'Sim' : 'Não') : 'N/A' ?></td>
                <td><?= $req['attributes']['remind_interval'] ?? 'N/A' ?></td>
                <td><?= isset($req['attributes']['block_after_refusal']) ? ($req['attributes']['block_after_refusal'] ? 'Sim' : 'Não') : 'N/A' ?></td>
                <td><?= $req['attributes']['default_subject'] ?? 'N/A' ?></td>
                <td><?= $req['attributes']['default_message'] ?? 'N/A' ?></td>
                <td><?= $req['attributes']['created'] ?? 'N/A' ?></td>
                <td><?= $req['attributes']['modified'] ?? 'N/A' ?></td>
                <td><?= isset($req['attributes']['migrated']) ? ($req['attributes']['migrated'] ? 'Sim' : 'Não') : 'N/A' ?></td>
                <td>
                    <?php 
                        if (!empty($req['attributes']['metadata'])) {
                            echo json_encode($req['attributes']['metadata']);
                        } else {
                            echo 'N/A';
                        }
                    ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
    <?php endif; ?>
   <a class="btn btn-primary" href="javascript:history.back()" role="button">Voltar</a>
   


        </div>
 </div>