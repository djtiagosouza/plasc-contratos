<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Login - PLASC</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(to right,rgb(11, 113, 238), #00509d);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #ffffff;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .login-panel {
            background-color: #ffffff;
            color: #002a5c;
            border-radius: 12px;
            padding: 40px;
            width: 100%;
            max-width: 420px;
            box-shadow: 0 0 25px rgba(0, 0, 0, 0.2);
        }

        .login-panel h1 {
            font-size: 2rem;
            font-weight: bold;
            color: #002a5c;
        }

        .login-panel h4 {
            color: #00509d;
            font-weight: 500;
        }

        .form-label {
            font-weight: 600;
            color: #003b73;
        }

        .form-control {
            border: 1px solid #ccc;
            border-radius: 8px;
        }

        .form-control:focus {
            border-color: #00509d;
            box-shadow: 0 0 0 0.2rem rgba(0, 80, 157, 0.25);
        }

        .btn-primary {
            background-color: #00509d;
            border: none;
            font-weight: bold;
        }

        .btn-primary:hover {
            background-color: #003b73;
        }

        .mensagem {
            background-color: #ffd9d9;
            color: #7a0000;
            border-radius: 8px;
            padding: 10px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

    <div class="login-panel">
        <div style="width: 100%; text-align: center; margin-bottom: 20px; clear: both;">
        <img src="<?= $url_base ?>/assets/img/Logo.png" alt="Logo PLASC" style="max-width: 150px; height: auto; display: inline-block;">
    </div>
        <h1 class="mb-3 text-center">Contratos</h1>
        

        <?php if (!empty($mensagem)): ?>
            <div class="mensagem">
                <?= htmlspecialchars($mensagem, ENT_QUOTES, 'UTF-8') ?>
            </div>
        <?php endif; ?>

        <form method="POST" action="<?= $url_base ?>/home/login">
            <?= csrf_field() ?>

            <div class="mb-3">
                <label for="usuario" class="form-label">Usuário</label>
                <input type="text" name="usuario" id="usuario" class="form-control " required placeholder="Usuário" autofocus>
            </div>

            <div class="mb-3">
                <label for="senha" class="form-label">Senha</label>
                <input type="password" name="senha" id="senha" class="form-control" required placeholder="Senha">
            </div>

            <button type="submit" class="btn btn-primary w-100">
                <i class="bi bi-box-arrow-in-right"></i> Entrar no sistema
            </button>
        </form>
    </div>
<footer style="position: fixed; bottom: 0; width: 100%; text-align: center; padding: 6px 0; font-size: 11px; color: rgba(255,255,255,0.4); background: transparent;">
    Desenvolvido por Tiago Antonio de Souza - TI-PLASC.
</footer>
</body>
</html>