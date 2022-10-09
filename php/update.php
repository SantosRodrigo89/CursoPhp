<?php

require_once('conecta_banco.php');

$id = $_POST['primarykey'];
$cpfcnpj = $_POST['cpfcnpj'];
$name = $_POST['name'];
$email = $_POST['email'];
$nascimento = $_POST['nascimento'];
$message = $_POST['message'];
$uf = $_POST['uf'];

$sql = $conn->prepare('UPDATE rup SET cpfcnpj = "' . $cpfcnpj . '", nome= "' . $name . '", ,email="' . $email . '", data_nascimento="' . $nascimento . '"
WHERE id = "' . $id . '"');
$sql -> execute();

header("location: ../index.php");

?>