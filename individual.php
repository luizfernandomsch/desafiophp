<?php require_once ("functions.php"); ?>

//<?php
//$arquivoPrdoduto = "produtos.json";
//$produtos = json_decode(file_get_contents($arquivoProduto), true);
//?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Produto</title>
</head>
<body class="bg-light">
    
    <button type="button" class="btn btn-outline-secondary ml-5 mt-5"> <a href="cadastroProduto.php">&#x2190 Voltar para a lista de produtos</a> </button>
    <div class="card m-5">
            <div class="row no-gutters">
            <?php if(isset($produtos) && $produtos != []) { ?>
            <?php foreach($produtos as $produto) { 
                if($_GET["id"]==$produto["id"]){
            ?>
            <div class="col-md-4">
                <img src="<?php echo $produto["img"] ?>" class="card-img" alt="..." height=100%>
            </div>
            <div class="col-md-8 pl-3">
                <div class="card-body">
                    <h1 class="card-title"><?php echo $produto["nome"] ?> </h1>
                    <h5 class="card-title">Categoria</h5>
                    <p class="card-text"> <?php echo $produto["categoria"] ?> </p>
                    <h5 class="card-title">Descrição</h5>
                    <p class="card-text"> <?php echo $produto["descricao"] ?></p>
                    <h5 class="card-title">Quantidade</h5>
                    <p class="card-text"> <?php echo $produto["quantidade"] ?> </p>
                    <h5 class="card-title">Preço</h5>
                    <p class="card-text"> <?php echo $produto["preco"] ?> </p>
                </div>
            </div>
            <?php } ?> 
            <?php } ?> 
            <?php } else { ?>
                <h1> Não tem produto cadastrado </h1>
            <?php } ?>
        </div>
    </div>
    
</body>
</html>