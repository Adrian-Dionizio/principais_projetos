<?php
// Incluir os controllers para carregar dados necessários

include_once(__DIR__ . "/../../Controller/ElementoArmaController.php");
include_once(__DIR__ . "/../../Controller/GatoController.php");

// Instanciar os controllers

$eleACont = new ElementoArmaController();
$eleA = $eleACont->listar();
$gatoCont = new GatoController();
$gato = $gatoCont->listar();

// Incluir o cabeçalho da página
include_once(__DIR__ . "/../include/header.php");

?>
<div class="row ">
    <div class="col-6 ">
        <h3 class="bg-dark rounded p-3">Salvar</h3>

        <!-- Formulário de inserção -->
       
        <div id="error-mensagens"class=""></div>
    
<div class="bg-dark rounded">
    <form method="POST" onsubmit="return validarCacador(event);">
        <div class="mb-3 bg-dark rounded">
            <label for="nome" class="form-label">Nome:</label>
        <input type="text" class="form-control" id="nome" name="nome" placeholder="Digite o nome do caçador" value="<?= $cacadores != null ? $cacadores->getNome() : "" ?>">
        </div>
       <!-- Campo Arma -->
       <div class="mb-3 bg-dark rounded">
                <label for="armas" class="bg-dark form-label">Arma:</label>
                <select class="form-control" id="armas" name="armas" >
                    <option value="">----Selecione----</option>
                    <option value="Espada Longa" <?= is_object($cacadores) && $cacadores->getArma() == 'Espada Longa' ? 'selected' : '' ?>>Espada Longa</option>
                    <option value="Espada e Escudo" <?= is_object($cacadores) && $cacadores->getArma() == 'Espada e Escudo' ? 'selected' : '' ?>>Espada e Escudo</option>
                    <option value="Espadão" <?= is_object($cacadores) && $cacadores->getArma() == 'Espadão' ? 'selected' : '' ?>>Espadão</option>
                    <option value="Martelo" <?= is_object($cacadores) && $cacadores->getArma() == 'Martelo' ? 'selected' : '' ?>>Martelo</option>
                    <option value="Lança" <?= is_object($cacadores) && $cacadores->getArma() == 'Lança' ? 'selected' : '' ?>>Lança</option>
                    <option value="Lança-Pistola" <?= is_object($cacadores) && $cacadores->getArma() == 'Lança-Pistola' ? 'selected' : '' ?>>Lança-Pistola</option>
                    <option value="Machado Transformável" <?= is_object($cacadores) && $cacadores->getArma() == 'Machado Transformável' ? 'selected' : '' ?>>Machado Transformável</option>
                    <option value="Espada Longa Transformável" <?= is_object($cacadores) && $cacadores->getArma() == 'Espada Longa Transformável' ? 'selected' : '' ?>>Espada Longa Transformável</option>
                    <option value="Insect Glaive" <?= is_object($cacadores) && $cacadores->getArma() == 'Insect Glaive' ? 'selected' : '' ?>>Insect Glaive</option>
                    <option value="Arco" <?= is_object($cacadores) && $cacadores->getArma() == 'Arco' ? 'selected' : '' ?>>Arco</option>
                    <option value="Armas de Fogo" <?= is_object($cacadores) && $cacadores->getArma() == 'Armas de Fogo' ? 'selected' : '' ?>>Armas de Fogo</option>
                    <option value="Dual Blades" <?= is_object($cacadores) && $cacadores->getArma() == 'Dual Blades' ? 'selected' : '' ?>>Dual Blades</option>
                    <option value="Hunting Horn" <?= is_object($cacadores) && $cacadores->getArma() == 'Hunting Horn' ? 'selected' : '' ?>>Hunting Horn</option>
                </select>
            </div>

            <!-- Campo Gênero -->
            <div class="mb-3 bg-dark rounded">
                <label for="genero" class="bg-dark rounded form-label">Gênero:</label>
                <select class="form-control" id="genero" name="genero" ><
                    <option value="">----Selecione----</option>
                    <option value="m" <?= is_object($cacadores) && $cacadores->getGenero() == 'm' ? 'selected' : '' ?>>Masculino</option>
                    <option value="f" <?= is_object($cacadores) && $cacadores->getGenero() == 'f' ? 'selected' : '' ?>>Feminino</option>
                    <option value="n" <?= is_object($cacadores) && $cacadores->getGenero() == 'n' ? 'selected' : '' ?>>Não-binário</option>
                </select>
            

<!-- Select para "Gato" -->
<div class="bg-dark rounded">
    <label class="form-label" for="gato">Gato:</label>
    <select class="form-control" name="gato" id="gato">
        <option value="">----Selecione----</option>
    <option value="1" <?= is_object($cacadores) && $cacadores->getGato() == 'Felix' ? 'selected' : '' ?> >Felix</option>
    <option value="2" <?= is_object($cacadores) && $cacadores->getGato() == 'Mimi' ? 'selected' : '' ?> >Mimi</option>
    <option value="3" <?= is_object($cacadores) && $cacadores->getGato() == 'Bob' ? 'selected' : '' ?> >Bob</option>
    <option value="4" <?= is_object($cacadores) && $cacadores->getGato() == 'Luna' ? 'selected' : '' ?> >Luna</option>
        <?php foreach ($gato as $c): ?>

            <option value="<?= $c->getGatoId() ?>" 
                <?= is_object($cacadores) && $cacadores->getGato() == $c->getGatoId() ? 'selected' : '' ?>>
                <?= htmlspecialchars($c->getGatoNome()) ?>
            </option>
        <?php endforeach; ?>
    </select>
</div>
<!-- Select para "Elementos das Armas" -->
<div class="bg-dark rounded">
<label class=" form-label" for="selElementoArma">Elementos das Armas:</label>
<select class="form-control" name="elementoArma" id="elementoArma">
    <option value="">----Selecione----</option>
    <option value="1" <?= $cacadores != null ? $cacadores->getNome() : "" ?> >Fogo</option>
    <option value="2" <?= $cacadores != null ? $cacadores->getNome() : "" ?> >Gelo</option>
    <option value="3" <?= $cacadores != null ? $cacadores->getNome() : "" ?> >Água</option>
    <option value="4" <?= $cacadores != null ? $cacadores->getNome() : "" ?> >Dragão</option>
    <option value="5" <?= $cacadores != null ? $cacadores->getNome() : "" ?> >Raio</option>
       <?php foreach ($eleA as $c): ?>
            <option value="<?= $c->getElementosArmasId() ?>">
                <?= $c->getElementosArmasTipo()?>
            </option>
    <?php endforeach; ?>
</select>
</select>
</div>

    <div>
        <input class="btn btn-success btn-sm mt-2" type="submit" value="Gravar" />
    </div>
                
                                
<div class="mt-3">
    <a class="btn  btn-danger btn-sm" href="listar.php">Voltar</a>
</div>
</div>

<script src="js/mon.js"></script>

<?php
include_once(__DIR__."/../include/footer.php");
?>