<?php
require("conecta.php");

$id = $_GET['id'];
$sql = "DELETE FROM tarefa WHERE id = $id";

if ($conn->query($sql) === TRUE) {

    echo json_encode([
        "status"  => true,
        "msg" => "Excluido"
    ]); 
    exit;
} else {
    echo json_encode([
        "status"  => false,
        "msg" => $conn->error
    ]);
    exit;
}
