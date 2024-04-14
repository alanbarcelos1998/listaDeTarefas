<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visualização de produtos</title>
</head>

<body>
    <center>
        <h1>Produtos cadastrados Cadastrados</h1>

        <table border="2">
            <tr>
                <td>NOME</td>
                <td>PREÇO</td>
                <td>QUANTIDADE</td>
                <td>OBSERVAÇÃO</td>
            </tr>
            <?php
                require("conecta.php");

                $dados_select = mysqli_query($conn, "SELECT id, nome, preco, quant, obs FROM produto");

                while($dado = mysqli_fetch_array($dados_select)) {
                        echo '<tr>';
                        echo '<td>'.$dado[1].'</td>';
                        echo '<td>'.$dado[2].'</td>';
                        echo '<td>'.$dado[3].'</td>';
                        echo '<td>'.$dado[4].'</td>';
                        echo "<td><a href='formulario.php?id=".$dado[0]."'><input type='button' value='atualizar' ></a></center></td>";
                        echo "<td><a href='excluir.php?id=".$dado[0]."'><input type='button' value='excluir' ></a></center></td>";
                        echo '</tr>';
                }
            ?>
        </table>
        <br />
        <a href="index.html"><input type="button" value="Voltar"></a>
    </center>
</body>

</html>