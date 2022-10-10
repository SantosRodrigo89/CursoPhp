<!DOCTYPE html>
<html lang="en">


<?php require_once('./php/conecta_banco.php');

$sql = $conn->prepare('SELECT * FROM estados');
$sql->execute();
$consulta = $sql->fetchAll(PDO::FETCH_OBJ);

$sql = $conn->prepare('SELECT r.id, r.cpfcnpj, r.nome, r.data_nascimento, r.email, e.uf FROM rup r 
inner JOIN estados e 
ON e.id= r.fk_uf;');
$sql->execute();
$dadosRup = $sql->fetchAll(PDO::FETCH_OBJ);

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
        <h1>Cadastro</h1>
        <form id="contact_form" action="./php/montarDados.php" method="POST" enctype="multipart/form-data">
            <div class="row">
                <label class="required" for="email">CPF/CNPJ:</label><br />
                <input id="email" class="inputBusca" name="cpfcnpj" type="text" value="" size="30" /><br />
            </div>
            <div class="row">
                <label class="required" for="name">Nome:</label><br />
                <input id="name" class="inputBusca" name="name" type="text" value="" size="30" /><br />
            </div>
            <div class="row">
                <label class="required" for="email">E-mail:</label><br />
                <input id="email" class="inputBusca" name="email" type="text" value="" size="30" /><br />
            </div>
            <div class="row">
                <label class="required" for="email">Nascimento:</label><br />
                <input id="email" class="inputBusca" name="nascimento" type="text" value="" size="30" /><br />
            </div>
            <div class="row">
                <label class="required" for="email">UF:</label><br />
                <select class="inputBusca" name="uf" id="uf">
                    <?php foreach ($consulta as $uf) { ?>
                        <option value='<?php echo $uf->id ?>'><?php echo $uf->uf ?></option>
                    <?php } ?>
                </select>
                <br />
            </div>
            <div class="row">
                <label class="required" for="message">Mensagem:</label><br />
                <textarea id="message" class="inputBusca" name="message" rows="7" cols="30"></textarea><br />
            </div>

            <input id="submit_button" type="submit" value="Enviar" />

        </form>
        <table class="tableStyle" border="1">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>UF</th>
                    <th>Nascimento</th>
                    <th colspan="2">Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($dadosRup as $dado) : ?>
                    <tr>
                        <td><?= $dado->nome ?></td>
                        <td><?= $dado->email ?></td>
                        <td><?= $dado->uf ?></td>
                        <td><?= $dado->data_nascimento ?></td>
                        <td><a href="./edit.php?idcliente=<?= $dado->id ?>">Editar<a></td>
                        <td><a href="./php/delete.php?idcliente=<?= $dado->id ?>">Excluir<a></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>

</html>