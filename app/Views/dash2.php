<main class="grid grid-main">
    <div class="content-container">

        <?php if (empty($registro)): ?>
            <p>Nenhum registro encontrado.</p>
        <?php else: ?>

            <?php
            // Ordenar por data
            usort($registro, function ($a, $b) {
                return strtotime($b['DT_CRIACAO'] ?? 0)
                    <=> strtotime($a['DT_CRIACAO'] ?? 0);
            });

            // Contadores
            $total = count($registro);
            $finalizados = $andamento = $cancelado = 0;

            foreach ($registro as $item) {
                $status = strtolower($item['DS_STATUS'] ?? '');

                if ($status == 'closed') $finalizados++;
                if ($status == 'running') $andamento++;
                if ($status == 'canceled') $cancelado++;
            }
            ?>

            <!-- ===== CARDS ===== -->
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
                        <th>Nome Segurado</th>
                        <th>CPF</th>
                        <th>Plano</th>
                        <th>Tp_contrato</th>
                        <th>Data</th>
                        <th>Status</th>


                    </tr>
                </thead>
                <tbody>

                    <?php foreach ($registro as $req):

                        $dataFormatada = !empty($req['DT_CRIACAO'])
                            ? date('d/m/Y', strtotime($req['DT_CRIACAO']))
                            : 'N/A';

                    ?>

                        <tr class="linha-envelope"
                            data-nome="<?= strtolower($req['NM_SEGURADO'] ?? '') ?>"
                            data-cpf="<?= $req['NR_CPF'] ?? '' ?>"
                            data-template="<?= strtolower($req['NM_TEMPLATE'] ?? '') ?>"
                            data-status="<?= $req['DS_STATUS'] ?? '' ?>">

                            <td><?= $req['NM_SEGURADO'] ?? 'N/A' ?></td>
                            <td><?= $req['NR_CPF'] ?? 'N/A' ?></td>
                            <td><?= $req['NM_TEMPLATE'] ?? 'N/A' ?></td>
                            <td><?= $req['TP_CONTRATO'] ?? 'N/A' ?></td>
                            <td><?= $dataFormatada ?></td>
                            <td><?= $req['DS_STATUS'] ?? 'N/A' ?></td>

                        </tr>

                    <?php endforeach; ?>

                </tbody>
            </table>

        <?php endif; ?>

    </div>
</main>