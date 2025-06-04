<?php
# Página para excluir um caçador

require_once(__DIR__ . "/../../controller/CacadorController.php");

// 1- Capturar o ID do caçador utilizando a superglobal $_GET
$id = isset($_GET['id']) && is_numeric($_GET['id']) ? trim($_GET['id']) : 0;

if ($id) {
    // 2- Chamar o CacadorController para excluir o caçador pelo ID
    $cacadorCont = new CacadorController();
    $cacadorCont->excluir($id);

    // 3- Redirecionar para a página de listagem
    header("Location: listar.php");
    exit;
} else {
    echo "Caçador não encontrado!<br>";
    echo "<a href='listar.php'>Voltar</a>";
}
