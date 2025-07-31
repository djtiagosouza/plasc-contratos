

    <div id="content-container">

        <div id="page-title">
            <h1 class="page-header text-overflow">Dashboard</h1>
            <form method="POST" action="<?= $url_base ?>/Clicking/Envelopes">
                <?= csrf_field() ?>

                <div class="mb-3">
                    <label for="envelopeId" class="form-label">Envolopes</label>
                    <input name="envelopeId" id="envelopeId" class="form-control " required placeholder="envelope"
                        autofocus>
                </div>

                <button type="submit" class="btn btn-primary w-100">
                    <i class="bi bi-box-arrow-in-right"></i> Pesquisar
                </button>
            </form>
            <form method="POST" action="<?= $url_base ?>/Clicking/Pessoas">
                <?= csrf_field() ?>

                <div class="mb-3">
                    <label for="envelopeId" class="form-label">Pessoa</label>
                    <input name="envelopeId" id="envelopeId" class="form-control " required placeholder="envelope"
                        autofocus>
                </div>

                <button type="submit" class="btn btn-primary w-100">
                    <i class="bi bi-box-arrow-in-right"></i> Pesquisar
                </button>
            </form>


        </div>
 </div>



