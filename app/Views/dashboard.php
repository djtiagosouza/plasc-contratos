<main class="grid grid-main">
    <div class="content-container">

        <?php if (empty($consulta)): ?>
            <p>Nenhum Envelope encontrado.</p>
        <?php else: ?>

            <?php
            // Ordenar por data
            usort($consulta, function ($a, $b) {
                return strtotime($b['attributes']['created'] ?? 0)
                    <=> strtotime($a['attributes']['created'] ?? 0);
            });

            // Contadores
            $total = count($consulta);
            $finalizados = $andamento = $cancelado = 0;

            foreach ($consulta as $item) {
                $status = $item['attributes']['status'] ?? '';
                if ($status == 'closed') $finalizados++;
                if ($status == 'running') $andamento++;
                if ($status == 'canceled') $cancelado++;
            }
            ?>

            <!-- ===== CARDS RESUMO ===== -->
            <div class="resumo-container">

                <div class="card-resumo bg-total ativo" data-status="">
                    <h3><?= $total ?></h3>
                    <p>Total</p>
                </div>

                <div class="card-resumo bg-finalizado" data-status="closed">
                    <h3><?= $finalizados ?></h3>
                    <p>Finalizados</p>
                </div>

                <div class="card-resumo bg-andamento" data-status="running">
                    <h3><?= $andamento ?></h3>
                    <p>Andamento</p>
                </div>

                <div class="card-resumo bg-cancelado" data-status="canceled">
                    <h3><?= $cancelado ?></h3>
                    <p>Cancelados</p>
                </div>

            </div>

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
                        <th>Status</th>
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

                        $status = $req['attributes']['status'] ?? '';

                        $statusTexto = [
                            'running'  => 'Andamento',
                            'closed'   => 'Finalizado',
                            'canceled' => 'Cancelado'
                        ][$status] ?? 'N/A';

                        $statusClasse = "status-" . $status;

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
                            data-nome="<?= strtolower($req['attributes']['name'] ?? '') ?>"
                            data-status="<?= $status ?>">

                            <td><?= $req['id'] ?? 'N/A' ?></td>
                            <td><?= $req['attributes']['name'] ?? 'N/A' ?></td>
                            <td class="<?= $statusClasse ?>">
                                <span class="status-badge">
                                    <?= $statusTexto ?>
                                </span>
                            </td>
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