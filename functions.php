
<?php 

function cadastraProduto($nome, $categoria, $descricao, $quantidade, $preco, $img){
    $arquivoProdutos = "produto.json";
    
    if (isset($_POST['cadastrar_produto'])) {

    if(file_exists($arquivoProdutos)){
        //abrindo e pegando informações do arquivo
        $arquivo = file_get_contents($arquivoProdutos);
        //tranformar o json em array
        $produtos = json_decode($arquivo, true);
        //adicionando um novo produto na array que estava dentro do arquivo
        //$produtos[] = ["nome"=>$nome, "categoria"=>$categoria, "descricao"=>$descricao, "quantidade"=>$quantidade, "preco" =>$preco, "img"=>$img];


        if($produtos==[]) { 
            $produtos[] = ["id"=>1, "nome"=>$nome, "categoria"=>$categoria, "descricao"=>$descricao, "quantidade"=>$quantidade, "preco"=>$preco, "img"=>$img];
            // adicionando id no produto se já tem produto cadastrado anteriormente
            } else { 
                $ultimoId = end($produtos);
                $incrementandoId = $ultimoId["id"] + 1;
                $produtos[] = ["id"=>$incrementandoId, "nome"=>$nome, "categoria"=>$categoria, "descricao"=>$descricao, "quantidade"=>$quantidade, "preco"=>$preco, "img"=>$img];
            }

        $json = json_encode($produtos);

        //salvando o json dentro de um arquivo
        $deuCerto = file_put_contents($arquivoProdutos, $json);
            

    } else {

        $produtos  = [];
        //array_push()
        $produtos[] = ["id"=>1, "nome"=>$nome, "categoria"=>$categoria, "descricao"=>$descricao, "quantidade"=>$quantidade, "preco" =>$preco, "img"=>$img];
        //transformando array em json
        $json = json_encode($produtos);
        //salvando o json dentro de um arquivo
        $deuCerto = file_put_contents($arquivoProdutos, $json);
        if($deuCerto){
            return "Produto Cadastrado";
            exit;
        } else {
            return "Erro";
        }
    }
}
}

if($_POST){
    //salvando aquivo
    $nomeImg = $_FILES['img']['name'];
    $localTmp = $_FILES['img']['tmp_name'];
    $dataAtual = date("d-m-y");
    $caminhoSalvo = 'img/'.$dataAtual.$nomeImg;
   
    $deucerto = move_uploaded_file($localTmp, $caminhoSalvo);

    echo cadastraProduto($_POST['nome'],$_POST['categoria'], $_POST["descricao"], $_POST["quantidade"], $_POST['preco'], $caminhoSalvo);
}


$arquivoProdutos= "produto.json";
 $produtos = json_decode(file_get_contents($arquivoProdutos), true);
?>