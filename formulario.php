<?php
ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);

$nome = "";
$preco = 0;
$quant = 0;
$obs = "";
$id = 0;

if (!is_null($_GET['id'])) {
    require("conecta.php");
    $id = $_GET['id'];

    $dados_select = mysqli_query($conn, "SELECT id, nome, preco, quant, obs FROM produto WHERE id = $id");

    while ($dado = mysqli_fetch_array($dados_select)) {
        $id = $dado[0];
        $nome = $dado[1];
        $preco = $dado[2];
        $quant = $dado[3];
        $obs = $dado[4];
    }
}
?>
<!doctype html>
<html>

<head>
    <!-- Metadados -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="formulario.css" media="screen">

    <!-- Título da página (aparece na aba) -->
    <title>Cadastre</title>
</head>

<body>
    <div>
        <h1 id="titulo">
            <?php 
                if($nome){
                    echo "Atualizar produto";
                } else {
                    echo "Cadastrar produto";
                }
            ?>
        </h1>
        <br>
    </div>

    <form method="POST" action="cadastra_prod.php?id=<?=$id?>">
        <fieldset class="grupo">

            <div class="campo">
                <label><strong>Nome</strong></label>
                <input type="text" name="nome" id="nome" value="<?= $nome ?>" required>
            </div>


            <div class="campo">
                <label><strong>Preço</strong></label>
                <input type="number" name="preco" id="preco" value="<?= $preco ?>" required>
            </div>
        </fieldset>


        <div class="campo">
            <label><strong>Quantidade</strong></label>
            <input type="number" name="quant" id="quant" value="<?= $quant ?>" required>
        </div>

        <div class="campo">
            <label><strong>Tipo</strong></label>
            <select id="tipo" required name="tipo">
                <option selected value="comida">Comida</option>
                <option value="bebida">Bebida</option>
                <option value="utensilios">Utensílios</option>
            </select>
        </div>
        
        
        <div class="campo">
            <br>
            <label><strong>Observação </strong></label>
            <textarea rows="6" style="width: 26em" id="observacao" name="obs" ><?=$obs?></textarea>
            
        </div>

        <button class="botao" type="submit" onsubmit="">Concluído</button>

    </form>

</body>

</html>