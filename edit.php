<!DOCTYPE html>
<html lang="en">
<?php require_once('./php/conecta_banco.php');

$idcliente = $_GET['idcliente'];

$sql = $conn->prepare('SELECT r.id, r.cpfcnpj, r.nome, r.data_nascimento, r.email, e.uf FROM rup r 
inner JOIN estados e 
ON e.id = r.fk_uf WHERE r.id = "' . $idcliente . '" ');
$sql->execute();
$consulta = $sql->fetch(PDO::FETCH_OBJ);

$sql = $conn->prepare('SELECT * FROM estados');
$sql->execute();
$consultaUf = $sql->fetchAll(PDO::FETCH_OBJ);

?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/styles.css" />
    <title>AULA 4</title>
</head>

<body>
    <div class="formContainerPrincipal" id="after_submit">
        <h1>Editar</h1>
        <form id="contact_form" action="./php/update.php" method="POST" enctype="multipart/form-data">
            <div class="row">
                <label class="required" for="email">CPF/CNPJ:</label><br />
                <input id="email" class="inputBusca" name="cpfcnpj" type="text" value="<?= $consulta->cpfcnpj ?>" size="30" /><br />
            </div>
            <div class="row">
                <label class="required" for="name">Nome:</label><br />
                <input id="name" class="inputBusca" name="name" type="text" value="<?= $consulta->nome ?>" size="30" /><br />
            </div>
            <div class="row">
                <label class="required" for="email">E-mail:</label><br />
                <input id="email" class="inputBusca" name="email" type="text" value="<?= $consulta->email ?>" size="30" /><br />
            </div>

            <div class="row">
                <label class="required" for="email">Nascimento:</label><br />
                <input id="email" class="inputBusca" name="nascimento" type="text" value="<?= $consulta->data_nascimento ?>" size="30" /><br />
            </div>
            <div class="row">
                <label class="required" for="email">UF:</label><br />
                <select class="inputBusca" name="uf" id="uf">
                    <?php foreach ($consultaUf as $uf) { ?>
                        <option value='<?php echo $uf->id ?>'><?php echo $uf->uf ?></option>
                    <?php } ?>
                </select>
                <br />
            </div>
            <div class="row">
                <label class="required" for="message">Mensagem:</label><br />
                <textarea id="message" class="inputBusca" name="message" rows="7" cols="30"></textarea><br />
            </div>

            <input type="hidden" name="primarykey" value="<?= $consulta->id ?>" />
            <input id=" submit_button" type="submit" value="Enviar" />
        </form>
    </div>
</body>

</html>