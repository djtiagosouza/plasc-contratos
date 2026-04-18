<footer class="grid grid-footer">
    <p class="text-center">&#0169; 2025 Plasc</p>
</footer>

<!-- Scripts -->
<script src="https://cdn.linearicons.com/free/1.0.0/svgembedder.min.js"></script>
<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    $(document).ready(function() {
        const $menuBtn = $('.app-menu__button');
        const $aside = $('aside');
        const $overlay = $('.overlay');

        // botão do menu
        $menuBtn.on('click', function(e) {
            e.preventDefault();
            $(this).toggleClass('is-expanded');
            $aside.toggleClass('collapsed');
            $overlay.toggleClass('active');
        });

        // clicar fora fecha o menu
        $overlay.on('click', function() {
            $menuBtn.removeClass('is-expanded');
            $aside.addClass('collapsed');
            $(this).removeClass('active');
        });
    });
</script>
<script>
    function showAlert(title, text, icon) {
        Swal.fire({
            title: title,
            html: `<h1>${text}</h1>`,
            icon: icon,
            confirmButtonText: 'OK',
            width: '600px',
            padding: '2em'
        });
    }
</script>

<?php if (session()->getFlashdata('sucesso')): ?>
    <script>
        showAlert('Sucesso!', '<?= esc(session()->getFlashdata('sucesso')) ?>', 'success');
    </script>
<?php elseif (session()->getFlashdata('erro')): ?>
    <script>
        showAlert('Erro!', '<?= esc(session()->getFlashdata('erro')) ?>', 'error');
    </script>
<?php endif; ?>

<script>
    document.getElementById('add-dependente').addEventListener('click', function() {
        const container = document.getElementById('dependentes-container');
        const template = document.getElementById('dependente-template');
        const clone = template.cloneNode(true);

        clone.style.display = 'block';
        clone.removeAttribute('id');

        // ativa required só nos campos clonados
        clone.querySelectorAll('.dependente-campo-obrigatorio').forEach(el => {
            el.setAttribute('required', 'required');
        });

        container.appendChild(clone);

        // botão remover
        clone.querySelector('.remove').addEventListener('click', function() {
            clone.remove();
        });
    });
</script>

<!-- Script do Dashboard -->
<script>
    const busca = document.getElementById('buscaNome');
    const cardsResumo = document.querySelectorAll('.card-resumo');

    function aplicarFiltro(statusFiltro = "") {
        const texto = busca.value.toLowerCase();

        document.querySelectorAll('.linha-envelope').forEach(row => {
            const nome = (row.dataset.nome || "").toLowerCase();
            const cpf = (row.dataset.cpf || "");
            const template = (row.dataset.template || "").toLowerCase();
            const status = row.dataset.status || "";

            const matchTexto =
                nome.includes(texto) ||
                cpf.includes(texto) ||
                template.includes(texto);

            const matchStatus =
                statusFiltro === "" || status === statusFiltro;

            row.style.display = (matchTexto && matchStatus) ? "" : "none";
        });
    }

    // Busca digitando
    busca.addEventListener('keyup', () => aplicarFiltro());

    // Clique nos cards (status)
    cardsResumo.forEach(card => {
        card.addEventListener('click', () => {
            cardsResumo.forEach(c => c.classList.remove('ativo'));
            card.classList.add('ativo');

            const status = card.dataset.status;
            aplicarFiltro(status);
        });
    });
</script>
<!-- Fim Script do Dashboard -->
</body>

</html>