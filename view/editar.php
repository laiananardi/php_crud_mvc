<!DOCTYPE HTML>
<html>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <link rel="stylesheet" href="style/style.css">
    <title>CRUD</title>
<body>

        <div class="row">
        <?php require_once("../controller/ControllerEditar.php");?>
            <form method="post" action="../controller/controllerEditar.php?id=<?php print($_GET['id']); ?>" id="form" name="form" onsubmit="validar(document.form); return false;" class="col-10">
                <div class="form-group">
                    <input class="form-control" type="text" id="nome" name="nome" value="<?php echo $editar->getNome(); ?>" required autofocus >
                    <input class="form-control" type="number" id="cpf" name="cpf" value="<?php echo $editar->getCpf(); ?>" required >
                    <input class="form-control" type="email" id="email" name="email" value="<?php echo $editar->getEmail(); ?>" required >
                    <input class="form-control" type="number" id="telefone" name="telefone" value="<?php echo $editar->getTelefone(); ?>" required >
                    <input class="form-control" type="text" id="endereco" name="endereco" value="<?php echo $editar->getEndereco(); ?>" required >
                    <input class="form-control" type="text" id="cidade" name="cidade" value="<?php echo $editar->getCidade(); ?>" required >
                </div>
                <div class="form-group">
                    <input class="form-control" type="hidden" name="id" value="<?php echo $editar->getId();?>">
                    <button type="submit" class="btn btn-success" id="editar" name="submit" value="editar">Editar</button>
                </div>
            </form>=
        </div>
 
    <script src="style/script.js"></script>
</body>

</html>
