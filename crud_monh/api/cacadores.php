<?php
include_once(__DIR__."/../controller/CacadorController.php");

$id = 0;
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}

$discCont = new CacadorController();
$aux = $discCont->buscarPorId($id);

// Define o cabeçalho para garantir que o conteúdo retornado seja no formato JSON
header('Content-Type: application/json');

// Envia a resposta JSON
echo json_encode($aux, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
?>
