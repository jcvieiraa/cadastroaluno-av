<?php 

    require 'config.php';
    require 'head.php';

    $info = [];

    $name = filter_input(INPUT_GET, 'nome');

    if ($nome) {
        $sql = $pdo->prepare("SELECT * FROM usuarios Where nome = :nome");
        $sql-> bindValue(':nome', $nome);
        $sql-> execute();
    
        if ($sql-> rowCount() > 0) {
            $info = $sql->fetch(PDO::FETCH_ASSOC);
        } else {
            header("Location: index.php");
            exit;
        }

    } else {
        header ("Location: index.php");
        exit;
    }

?>

<div class="container">

    <h1>Excluir Usuário</h1>

    <form action="excluir_action.php" method="post">
    <div class="mb-3">
        <label for="" class="form-label">
            Nome: </br>
            <input type="text" name="nome" value="<?=$info['nome'];?>" class="form-control">
        </label>
    </div>

    <input type="submit" value="" class="btn btn-primary">
    </form>

</div>