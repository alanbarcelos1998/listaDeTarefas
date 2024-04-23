<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="https://img.icons8.com/dusk/64/list--v1.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

    <title>Lista de tarefas</title>
</head>

<body>
    <center>
        <h1>Lista de tarefas</h1>
        <div class="fixed-action-btn">
            <a href="formCadTarefa.php?id=0" class="btn-floating btn-large waves-effect waves-light green" title="Cadastrar pessoa"><i class="material-icons">add</i></a>
        </div>

        <div class="container">
            <table class="responsive-table">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Agendado para</th>
                        <th>Tarefa</th>
                        <th>Ativo</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    require("conecta.php");

                    $dados_select = mysqli_query($conn, "SELECT id, nome, realiza, tarefa, ativo FROM tarefa");

                    while ($dado = mysqli_fetch_array($dados_select)) {
                    ?>
                        <tr>
                            <td> <?= $dado[1] ?> </td>
                            <td>
                                <?php
                                $data = new DateTime($dado[2]);
                                echo $data->format('d/m/Y');
                                ?> </td>
                            <td> <?= $dado[3] ?> </td>
                            <td> <?= $dado[4] == 1 ? "Sim" : "Não" ?> </td>
                            <td><a href='formCadTarefa.php?id=<?= $dado[0] ?>' class="waves-effect waves-light btn-small blue"><i class="material-icons">mode_edit</i></a></td>
                            <td><a onclick="deleteTarefa('<?= $dado[0] ?>')" class="waves-effect waves-light btn-small red"><i class="material-icons">delete</i></a></td>
                        </tr>
                    <?php
                    }
                    ?>

                </tbody>
            </table>
        </div>
    </center>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            M.FloatingActionButton.init(document.querySelectorAll('.fixed-action-btn'), {});
        });

        async function deleteTarefa(id) {
            let response = await fetch('./excluir.php?id=' + id, {
                method: "post"
            });
            let data = await response.json()

            if (data.status) {
                M.toast({
                    html: 'Registro excluído',
                    classes: 'red'
                })
            } else {
                M.toast({
                    html: `Erro ${data.msg}`
                })
            }

            setTimeout(() => {
                window.location.reload();
            }, 2000);
        }
    </script>
</body>

</html>