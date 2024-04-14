<?php
    $servername = "testprojeto";
    $database = "projeto";
    $username = "user";
    $password = "pass";


    $conn = mysqli_connect($servername, $username, $password, $database);

    if (!$conn) {
        die("Conexão falhou. Erro: " . mysqli_connect_error());
    }
?>