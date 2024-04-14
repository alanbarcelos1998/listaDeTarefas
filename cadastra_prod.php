<?php
require("conecta.php");

$nome = $_POST['nome'];
$preco =  $_POST['preco'];
$quant = $_POST['quant'];
$tipo = $_POST['tipo'];
$obs = $_POST['obs'];
$id = $_GET['id'];
$sql = "";

if ($id > 0) {
  $sql = "UPDATE produto SET nome = '$nome', preco = '$preco', quant = '$quant', obs = '$obs' WHERE id =  '$id'";
} else {
  $sql = "INSERT INTO produto (nome, preco, quant, tipo, obs)
    VALUES ('$nome', '$preco', '$quant', '$tipo', '$obs')";
}

if ($id > 0) {
  $conn->query($sql);

  echo "<center><h1>Registro atualizado com Sucesso</h1>";
  echo "<a href='index.html'><input type='button' value='Voltar'></a></center>";
} else {
  if ($conn->query($sql) === TRUE) {
    echo "<center><h1>Registro Inserido com Sucesso</h1>";
    echo "<a href='index.html'><input type='button' value='Voltar'></a></center>";
  } else {
    echo "<h3>OCORREU UM ERRO: </h3>: " . $sql . "<br>" . $conn->error;
  }
}
