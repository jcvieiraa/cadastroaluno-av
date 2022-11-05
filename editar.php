<?php
    require 'config.php';
    require 'head.php';

    $info = [];

    $id = filter_input(INPUT_GET, 'id');

    if($id) {
        $sql = $pdo->prepare("SELECT * FROM alunos WHERE id = :id");
        $sql->bindValue(':id', $id);
        $sql->execute();

        if($sql->rowCount() > 0) {
            $info = $sql->fetch(PDO::FETCH_ASSOC);

        } else {
            header("Location: index.php");
            exit;
        }
    } else {
        header("Location: index.php");
        exit;
    }

?>

<div class="container" style="margin: 2rem">  
    <h1> Editar </h1>

    <form action="editar_action.php" method="post">
        
    <input type="hidden" name="id" value="<?=$info['id']; ?>" />
        
        <div>
            <label for="">
                Nome: <br/>
                <input type="text" name="nome" value="<?=$info['nome']; ?>">
            </label><br/><br/>
        </div>
        
        <div>
            <label for="">
                E-mail: <br/>
                <input type="email" name="email" value="<?=$info['email']; ?>">
            </label><br/><br/>
        </div>
        
        <div>
            <label for="">
                Idade: <br/>
                <input type="number" name="idade" value="<?=$info['idade']; ?>">
            </label><br/><br/>
        </div>
        
        <div>
            <label for="">
                Contato: <br/>
                <input type="number" name="contato" value="<?=$info['contato']; ?>">
            </label><br/><br/>
        </div>
        
        <div>
            <label for="">
                Endereço: <br/>
                <input type="text" name="endereco" value="<?=$info['endereco']; ?>">
            </label><br/><br/>
        </div>

        <input type="submit" value="Salvar">
    </form>
</div>