<?php
require_once('conecta_banco.php');

///Pegando pelo metodo POST
$cpfcnpj = $_POST['cpfcnpj'];
$name = $_POST['name'];
$email = $_POST['email'];
$nascimento = $_POST['nascimento'];
$message = $_POST['message'];
$uf = $_POST['uf'];

//Query de insert
$sql = $conn->prepare("INSERT INTO rup(cpfcnpj, nome, data_nascimento, email, data_criacao, fk_uf) 
value ('$cpfcnpj','$name', '$nascimento', '$email', '$message', $uf)");
$sql->execute();
header('location: ../index.php');

/* //Query de select
$sql = $conn->prepare('SELECT * FROM rup');
$sql->execute();
$consulta = $sql->fetchAll(PDO::FETCH_OBJ);

//Loop para exibição
foreach ($consulta as $resultado) {
    echo "CPFCNPJ: " . $resultado->CPFCNPJ . "<BR>";
    echo "NOME: " . $resultado->NOME . "<BR>";
    echo "data_nascimento: " . $resultado->data_nascimento . "<BR>";
    echo "<BR><BR><BR>";
}
 */