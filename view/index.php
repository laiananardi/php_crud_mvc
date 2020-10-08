
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <link rel="stylesheet" href="style/style.css">
    <title>CRUD</title>
</head>
<body>
    <header>
        <a class="btn" id="inicioBtn">Inicio</a>
        <a class="btn " id="cadastrarBtn">Cadastar</a>

    </header>
    <section id="inicioSec">
    <?php require_once("../controller/listar.php");?>
        <table class="table">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>CPF</th>
                    <th>E-mail</th>
                    <th>Telefone</th>
                    <th>Endereço</th>
                    <th>Cidade</th>
                    <th>Foto</th>
                </tr>
            </thead>
            <tbody>
                <?php new listarController();  ?>

            </tbody>
        </table>
    </section>
    <section id="cadastrarSec">
        <div class="row">
            <form method="post" action="../controller/cadastro.php" id="form-cadastro" name="form" onsubmit="validar(document.form); return false;" >
                <div class="form-group">
                    <input class="form-control" type="text" id="nome" name="nome" placeholder="Nome" required>
                    <input class="form-control" type="number" id="cpf" name="cpf" placeholder="CPF" required>
                    <input class="form-control" type="email" id="email" name="email" placeholder="E-mail" required>
                    <input class="form-control" type="number" id=telefone name="telefone" placeholder="Telefone" required>
                    <input class="form-control" type="text" id="endereco" name="endereco" placeholder="Endereço" required>
                    <input class="form-control" type="text" id="cidade" name="cidade" placeholder="Cidade" required>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn " id="cadastrar">Cadastrar</button>
                </div>
            </form>
        </div>
    </section>
    
<script src="style/script.js"></script>
</body>
</html>