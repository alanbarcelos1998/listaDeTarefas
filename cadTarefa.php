<?php
require("conecta.php");

$nome = $_POST['nome'];
$realiza =  $_POST['realiza'];
$realiza =  DateTime::createFromFormat('d/m/Y', $realiza)->format('Y-m-d');
$tarefa = $_POST['tarefa'];
$ativo = intval($_POST['ativo']);
$id = $_GET['id'];
$sql = "";

if ($id > 0) {
  $sql = "UPDATE tarefa SET nome = '$nome', realiza = '$realiza', tarefa = '$tarefa', ativo = '$ativo' WHERE id =  '$id'";
} else {
  $sql = "INSERT INTO tarefa (nome, realiza, tarefa, ativo)
    VALUES ('$nome', '$realiza', '$tarefa', '$ativo')";
}

if ($id > 0) {
  $conn->query($sql);

  echo "<center><h1>Registro atualizado com Sucesso</h1>";
  echo "<a href='/'><input type='button' value='Voltar'></a></center>";
} else {
  if ($conn->query($sql) === TRUE) {
    echo "<center><h1>Registro Inserido com Sucesso</h1>";
    echo "<a href='/'><input type='button' value='Voltar'></a></center>";
  } else {
    echo "<h3>OCORREU UM ERRO: </h3>: " . $sql . "<br>" . $conn->error;
  }
}
