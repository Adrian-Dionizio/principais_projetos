<?php
//Carregando a lista de caçadores
include_once(__DIR__ . "/../../Controller/CacadorController.php");
include_once(__DIR__ . "/../../Controller/GatoController.php");
include_once(__DIR__ . "/../../Controller/ElementoArmaController.php");

$cacadorCont = new CacadorController();
$cacador = $cacadorCont->listar();
$gatoCont = new GatoController();
$gatos = $gatoCont->listar();

//Inclusão do HTML do header
include_once(__DIR__ . "/../include/header.php");
?>

<h2 class="bg-dark rounded p-3">Listagem de caçadores</h2>

<a href="inserir.php" class="btn btn-primary mb-3">Inserir</a>

<!-- Contêiner para as tabelas -->
<div style="display: flex; gap: 20px; flex-wrap: wrap;">

    <?php foreach ($cacador as $c): ?>
        <table border="1" class="table table-dark table-striped table-bordered " style="flex: 0 1 calc(33.333% - 20px);">
            <tr>
                <td colspan="2" class="text-center">
                    <img src="<?php
                                switch ($c->getGenero()) {
                                    case "m":
                                        echo "https://geek.etc.br/wp-content/uploads/2024/05/1717162863_643_Novo-trailer-de-Monster-Hunter-Wilds-revela-um-mundo-dinamico.jpg";
                                        break;
                                    case "n":
                                        echo "https://pspmedia.ign.com/psp/image/article/112/1122033/play-as-solid-snake-and-the-boss-in-monster-hunter-20100920003858598-000.jpg";
                                        break;
                                    case "f":
                                        echo "https://preview.redd.it/kt881z984gq51.png?width=465&format=png&auto=webp&s=3338f8f089e37668e65b79801b6ab85c66ac4e37";
                                        break;
                                } ?>" class="rounded" width="220" height="150">
                </td>
            </tr>
            <tr>
                <td>ID:</td>
                <td><?= $c->getId(); ?></td>
            </tr>
            <tr>
                <td>Nome:</td>
                <td><?= $c->getNome(); ?></td>
            </tr>
          
            <tr>
                <td>Gênero:</td>
                <td>
                    <?php
                    switch ($c->getGenero()) {
                        case "m":
                            echo "Masculino";
                            break;
                        case "n":
                            echo "Não-binário";
                            break;
                        case "f":
                            echo "Feminino";
                            break;
                    } ?>
                </td>
            </tr>
            <tr>
                <td>Arma:</td>
                <td><?= $c->getArma(); ?></td>
            </tr>
            <tr>
                <td>Gato:</td>
                <td>
                    <?php
                    $gato = $c->getGato();
                    echo $gato ? $gato->getGatoNome() : "Sem gato";
                    ?>
                </td>
            </tr>
            <tr>
                <td>Elemento Arma:</td>
                <td>
                    <?php
                    $elemento = $c->getElementosArmas();
                    echo $elemento ? $elemento->getElementosArmasTipo() : "Sem elemento";
                    ?>
                </td>
            </tr>
            <tr>
                <td colspan="2" class="text-end">
                    <button onclick="detalharCacador(<?= $c->getId() ?>)" class="btn btn-warning btn-sm">Detalhes</button>
                    <a href="alterar.php?id=<?= $c->getId(); ?>" class="btn btn-warning btn-sm">
                        <img src="../../img/btn_editar.png" alt="Editar">
                    </a>
                    <a href="excluir.php?id=<?= $c->getId(); ?>" class="btn btn-danger btn-sm"
                        onclick="return confirm('Confirma a exclusão do caçador?');">
                        <img src="../../img/btn_excluir.png" alt="Excluir">
                    </a>
                </td>
            </tr>
        </table>
    <?php endforeach; ?>

</div>
<div id="detalharCacador" class="mt-4 p-3 bg-dark border rounded">
    <h3>Detalhes do Caçador</h3>
    <p><strong>ID:</strong> <span id="detalhe-id"></span></p>
    <p><strong>Nome:</strong> <span id="detalhe-nome"></span></p>
    <p><strong>Arma:</strong> <span id="detalhe-arma"></span></p>
    <p><strong>Elemento Arma:</strong> <span id="detalhe-elemento"></span></p>
    <p><strong>Gato:</strong> <span id="detalhe-gato"></span></p>
</div>

<script src="js/mon.js"></script>

<?php include_once(__DIR__ . "/../include/footer.php");
