<main class="grid grid-main">
    <div class="content-container">

        <?php if (empty($consulta)): ?>
            <p>Nenhum Envelope encontrado.</p>
        <?php else: ?>

           

            <!-- ===== FILTRO ===== -->
            <div class="filtros">
                <input type="text" id="buscaNome" placeholder="Buscar por nome...">
            </div>

            <!-- ===== TABELA ===== -->
            <table class="tabela-envelopes">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Data</th>
                        <th>Sistema</th>
                        <th>Cadastro</th>
                    </tr>
                </thead>
                <tbody>

                    <?php foreach ($consulta as $req):

                        $dataOriginal = $req['attributes']['created'] ?? null;
                        $dataFormatada = $dataOriginal
                            ? date('d/m/Y H:i', strtotime($dataOriginal))
                            : 'N/A';
      

                        $status2 = $req['tp_status'] ?? '';
                        //teste
                        $status2 = 'A';

                        $statusBanco = [
                            'P' => 'Aprovação',
                            'A' => 'Aprovada',
                            'C' => 'Correção',
                            'R' => 'Reprovada'
                        ][$status2] ?? 'N/A';

                        $statusPlasc = "cadastro-" . strtolower($status2);

                    ?>

                        <tr class="linha-envelope"
                            data-nome="<?= strtolower($req['attributes']['name'] ?? '') ?>">

                            <td><?= $req['id'] ?? 'N/A' ?></td>
                            <td><?= $req['attributes']['name'] ?? 'N/A' ?></td>
                            
                            <td><?= $dataFormatada ?></td>

                            <td class="<?= $statusPlasc ?>">
                                <span class="cadastro-badge">
                                    <?= $statusBanco ?>
                                </span>
                            </td>

                            <td>
                                <?php if ($status2 == 'P'): ?>
                                    <button class="btn-enviar"
                                        data-id="<?= $req['id'] ?>">
                                        Enviar
                                    </button>
                                <?php endif; ?>
                            </td>

                        </tr>

                    <?php endforeach; ?>

                </tbody>
            </table>

        <?php endif; ?>

    </div>
</main>