<?php
include "../fwkSis/FWK.php";
$fwk = new FWK();
?>

<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Listar Pessoas</title>
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            margin-top: 40px;
            max-width: 900px;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }
        .table-custom th {
            background-color: #343a40;
            color: #fff;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        .table-custom tbody tr:hover {
            background-color: #f1f3f5;
        }
        .btn-custom {
            background-color: #dc3545;
            color: white;
        }
        .btn-custom:hover {
            background-color: #c82333;
        }
        .title-header {
            font-family: 'Arial', sans-serif;
            font-weight: bold;
            text-align: center;
            color: #343a40;
            margin-bottom: 25px;
        }
        .alert {
            font-size: 14px;
            border-radius: 8px;
        }
    </style>
</head>
<body>

<div class="container">
    <h2 class="title-header">Lista de Pessoas</h2>

    <?php
    if (isset($_GET['excluir']) && $_GET['excluir']) {
        echo '<div class="alert alert-success">Registro excluído com sucesso.</div>';
    }
    ?>

    <div class="table-responsive">
        <table class="table table-bordered table-hover table-custom">
            <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Idade</th>
                <th>Ações</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $fwk->lista("pessoas");
            ?>
            </tbody>
        </table>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
