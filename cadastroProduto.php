<?php require_once ("functions.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Cadastro Produto</title>
</head>
<body>
<div class="container mt-3">
        <div class="row">
            <div class="col-lg-6">
                <h1>Produtos</h1>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Nome</th>
                            <th scope="col">Categoria</th>
                            <th scope="col">Preço</th>
                        </tr>
                    </thead>

                    </tbody>
                        <?php if(isset($produtos)){ ?>
                        <?php foreach($produtos as $produto) { ?>
                        <tr>
                            <td> <a href="individual.php?id= <?php echo $produto["id"]; ?>" > <?php echo $produto["nome"]; ?></a></td>
                            <td> <?php echo $produto["categoria"]; ?> </td>
                            <td> <?php echo $produto["preco"]; ?> </td>
                        </tr>
                        <?php } ?> 
                        <?php } else { ?>
                            <h1> Não tem produto cadastrado </h1>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
                <div class="col-lg-6  bg-light">
                <form class="p-5" method="post" enctype="multipart/form-data">
                    <h4>Cadastrar produto</h4>

                    <div class="form-group">
                        <label class="font-weight-bold" for="nome">Nome</label>
                        <input type="text" name="nome" class="form-control" placeholder="">
                    </div>

                    <div class="form-group">
                        <label class="font-weight-bold" for="categoria">Categoria</label>
                        <select class="form-control" name="categoria">
                            <option selected>Selecione uma categoria</option>
                            <option> Camiseta </option>
                            <option> Bermuda </option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="font-weight-bold" for="descricao">Descrição</label>
                        <textarea class="form-control" name="descricao" rows="3"></textarea>
                    </div>

                    <div class="form-group">
                        <label class="font-weight-bold" for="quantidade">Quantidade</label>
                        <input type="number" name="quantidade" class="form-control" placeholder="">
                    </div>

                    <div class="form-group">
                        <label class="font-weight-bold" for="preco">Preço</label>
                        <input type="number" name="preco" class="form-control" placeholder="">
                    </div>

                    <div class="form-group">
                        <label class="font-weight-bold" for="imagem">Foto do produto</label>
                        <input type="file" class="form-control-file" name="img">
                    </div>

                    <button name="cadastrar_produto" class="btn btn-primary">Cadastrar</button>
            
                </form>
            </div>
        </div>
    </div>
</body>
</html>