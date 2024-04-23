<?php
// ini_set('display_errors', 0);
// ini_set('display_startup_errors', 0);

$nome = "";
$realiza = new DateTime();
$realiza = $realiza->modify('-3 hours')->format('d/m/Y');
$tarefa = "";
$ativo = 1;
$id = 0;

if (!is_null($_GET['id'])) {
    require("conecta.php");
    $id = $_GET['id'];

    $dados_select = mysqli_query($conn, "SELECT id, nome, realiza, tarefa, ativo FROM tarefa WHERE id = $id");

    while ($dado = mysqli_fetch_array($dados_select)) {
        $id = $dado[0];
        $nome = $dado[1];
        $realiza = new DateTime($dado[2]);
        $realiza = $realiza->format('d/m/Y');
        $tarefa = $dado[3];
        $ativo = $dado[4];
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
    <link rel="shortcut icon" href="https://img.icons8.com/dusk/64/list--v1.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

    <!-- Título da página (aparece na aba) -->
    <title>Lista de tarefas</title>
</head>

<body>
    <div>
        <h1 class="center">
            <?php
            if ($nome) {
                echo "Atualizar Tarefa";
            } else {
                echo "Cadastrar Tarefa";
            }
            ?>
        </h1>
        <br>
    </div>

    <form method="POST" action="cadTarefa.php?id=<?= $id ?>">
        <div class="container">
            <div class="row">
                <div class="col s12">
                    <div class="row">
                        <div class=" right">
                            <div class="input-field col s12">
                                <select name="ativo">
                                    <option value="1" <?php echo $ativo == 1 ? "selected" : ""?>>Ativo</option>
                                    <option value="0" <?php echo $ativo == 0 ? "selected" : ""?>>Desativado</option>
                                </select>
                                <label>Status</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s6">
                            <input placeholder="Inclua o nome" name="nome" type="text" class="validate" required value=<?= $nome ?>>
                            <label for="">Nome</label>
                        </div>
                        <div class="input-field col s6">
                            <input type="text" class="datepicker" placeholder="Data da tarefa" name="realiza" value=<?= $realiza ?>>
                            <label for="">Realizar em:</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <textarea id="" name="tarefa" class="materialize-textarea"><?= $tarefa ?></textarea>
                            <label for="">Tarefa</label>
                        </div>
                    </div>

                </div>
                <button class="btn waves-effect waves-light right" type="submit" name="action">Cadastrar
                    <i class="material-icons right">send</i>
                </button>

            </div>
        </div>

    </form>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            M.Datepicker.init(document.querySelectorAll('.datepicker'), {
                format: 'dd/mm/yyyy'
            });
            M.FormSelect.init(document.querySelectorAll('select'), {})
        });

    </script>
</body>

</html>