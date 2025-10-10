<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<title>Seleção de Documentos</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
.metro-tile {
width: 200px;
height: 150px;
display: flex;
justify-content: center;
align-items: center;
font-size: 1.2rem;
font-weight: bold;
color: #fff;
border-radius: 10px;
cursor: pointer;
transition: transform 0.2s ease-in-out;
}
.metro-tile:hover {
transform: scale(1.05);
}
.tile-blue { background-color: #007bff; }
.tile-green { background-color: #28a745; }
.tile-red { background-color: #dc3545; }
.tile-orange { background-color: #fd7e14; }
</style>
</head>
<body class="bg-light">
<div class="container py-5">
<h2 class="mb-4 text-center">Selecione o Tipo de Documento</h2>
<div class="d-flex flex-wrap justify-content-center gap-3">
<div class="metro-tile tile-blue" onclick="selecionarDocumento('RG')">RG</div>
<div class="metro-tile tile-green" onclick="selecionarDocumento('CPF')">CPF</div>
<div class="metro-tile tile-red" onclick="selecionarDocumento('CNH')">CNH</div>
<div class="metro-tile tile-orange" onclick="selecionarDocumento('Passaporte')">Passaporte</div>
</div>
</div>


<script>
function selecionarDocumento(tipo) {
alert('Documento selecionado: ' + tipo);
// Aqui você pode fazer um redirect ou carregar uma nova view
// window.location.href = '/documentos/' + tipo;
}
</script>
</body>
</html>