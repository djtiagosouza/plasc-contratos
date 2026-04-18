<main class="grid grid-main">
    <div class="content-container">
        <h1 class="h1">Adesão de depedente</h1>

        <form action="<?= $url_base ?>/GeraAdesoes/Gera_Proposta_Dependente" method="post" class="form-contrato">

            <!-- ==============================
             DADOS DA PROPOSTA
        =============================== -->
            <h5>DADOS DA PROPOSTA</h5>

            <div class="form-grid">
                <label>CONTRATO
                    <input type="text" name="contrato" required
                        value="<?= old('contrato') ?? session('contrato') ?>">
                </label>

                <label>PROPOSTA
                    <input type="text" name="proposta" required
                        value="<?= old('proposta') ?? $proposta ?>">
                </label>

                <label>PLANO
                    <input type="text" name="plano" required
                        value="<?= old('plano') ?? $dadoscontrato['CD_PLANO'] ?>">
                </label>

                <label>Tabela de Preço
                    <input type="text" name="tabelapreco" required
                        value="<?= old('tabelapreco') ?? $dadoscontrato['CD_TABELA_PRECO'] ?>">
                </label>

                <label>UNIDADE DE VENDA
                    <select name="unidade_venda" required>
                        <option value="">Selecione...</option>
                        <option value="1" <?= old('unidade_venda') == '1' ? 'selected' : '' ?>>UNIDADE RIO BRANCO</option>
                        <option value="2" <?= old('unidade_venda') == '2' ? 'selected' : '' ?>>UNIDADE SANTA CASA</option>
                        <option value="3" <?= old('unidade_venda') == '3' ? 'selected' : '' ?>>UNIDADE BRAZ BERNARDINO</option>
                        <option value="4" <?= old('unidade_venda') == '4' ? 'selected' : '' ?>>SANTOS DUMONT</option>
                        <option value="5" <?= old('unidade_venda') == '5' ? 'selected' : '' ?>>SAO JOAO NEPOMUCENO</option>
                        <option value="6" <?= old('unidade_venda') == '6' ? 'selected' : '' ?>>LIMA DUARTE</option>
                        <option value="7" <?= old('unidade_venda') == '7' ? 'selected' : '' ?>>UNIDADE BENFICA</option>
                        <option value="8" <?= old('unidade_venda') == '8' ? 'selected' : '' ?>>RIO POMBA</option>
                    </select>
                </label>
            </div>

            <h5>DADOS DEPENDENTE</h5>

            <div class="form-grid">
                <label>Nome
                    <input type="text" name="nome" required value="<?= old('nome') ?>">
                </label>

                <label>Data de Nascimento
                    <input type="date" name="data_nascimento" required value="<?= old('data_nascimento') ?>">
                </label>

                <label>Telefone
                    <input type="text" name="telefone" required value="<?= old('telefone') ?>">
                </label>

                <label>Nome da Mãe
                    <input type="text" name="mae" required value="<?= old('mae') ?>">
                </label>

                <label>Nome do Pai
                    <input type="text" name="pai" value="<?= old('pai') ?>">
                </label>

                <label>CPF
                    <input type="text" name="cpf" required value="<?= old('cpf') ?>">
                </label>

                <label>CNS
                    <input type="text" name="cns" required value="<?= old('cns') ?>">
                </label>

                <label>Sexo
                    <select name="sexo" required>
                        <option value="">Selecione...</option>
                        <option value="M" <?= old('sexo') == 'M' ? 'selected' : '' ?>>Masculino</option>
                        <option value="F" <?= old('sexo') == 'F' ? 'selected' : '' ?>>Feminino</option>
                        <option value="O" <?= old('sexo') == 'O' ? 'selected' : '' ?>>Outro</option>
                    </select>
                </label>

                <label>Estado Civil
                    <select name="estado_civil" required>
                        <option value="">Selecione...</option>
                        <option value="S" <?= old('estado_civil') == 'S' ? 'selected' : '' ?>>Solteiro(a)</option>
                        <option value="C" <?= old('estado_civil') == 'C' ? 'selected' : '' ?>>Casado(a)</option>
                        <option value="D" <?= old('estado_civil') == 'D' ? 'selected' : '' ?>>Divorciado(a)</option>
                        <option value="V" <?= old('estado_civil') == 'V' ? 'selected' : '' ?>>Viúvo(a)</option>
                        <option value="O" <?= old('estado_civil') == 'O' ? 'selected' : '' ?>>Outros</option>
                    </select>
                </label>

                <label>Endereço
                    <input type="text" name="endereco" required value="<?= old('endereco') ?>">
                </label>

                <label>Bairro
                    <input type="text" name="bairro" required value="<?= old('bairro') ?>">
                </label>

                <label>Município
                    <input type="text" name="municipio" required value="<?= old('municipio') ?>">
                </label>

                <label>UF
                    <input type="text" name="uf" maxlength="2" required value="<?= old('uf') ?>">
                </label>

                <label>CEP
                    <input type="text" name="cep" required value="<?= old('cep') ?>">
                </label>

                <label>Número
                    <input type="text" name="numero" required value="<?= old('numero') ?>">
                </label>

                <label>Complemento
                    <input type="text" name="complemento" value="<?= old('complemento') ?>">
                </label>

                <label>Email
                    <input type="email" name="email" required value="<?= old('email') ?>">
                </label>

                <label>Parentesco
                    <select name="parentesco" required>
                        <option value="">Selecione...</option>
                        <option value="3" <?= old('parentesco') == '3' ? 'selected' : '' ?>>Cônjuge</option>
                        <option value="4" <?= old('parentesco') == '4' ? 'selected' : '' ?>>Filho</option>
                        <option value="5" <?= old('parentesco') == '5' ? 'selected' : '' ?>>Filha</option>
                    </select>
                </label>
            </div>


            <div class="botoes-form">

                <button type="submit" class="btn enviar">
                    Enviar
                </button>
            </div>

        </form>
    </div>
</main>