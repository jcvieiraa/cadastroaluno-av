<?php

    session_start();
    ob_start();

    //Impede que o usuario retorne para página login.php sem antes deslogar
    if((!isset($_SESSION['nome'])) && (!isset($_SESSION['email']))){
        header("Location: home.php");
        exit;
    }

?>

<?php

    require 'config.php';
    include 'head.php';

    $lista = [];

    $sql = $pdo->query("SELECT * FROM alunos");

    if($sql->rowCount() > 0) {
        $lista = $sql->fetchall(PDO::FETCH_ASSOC);
    }

?>


<body>
                                <!-- LISTA DE ALUNOS -->
    <div class="container">
        
        
        <div>
            <a class="btn btn-primary" href="adicionar.php"> Adicionar usuário </a>
        </div>

        <div>
            <a href="./logout.php">Sair</a>
        </div>
        
        <div>
    
            <table class="table">
            
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Idade</th>
                    <th>Contato</th>
                    <th>Endereço</th>
    
                </tr>
                <?php foreach($lista as $usuario): ?>
                    <tr>
                        <td> <?php echo $usuario['id']; ?> </td>
                        <td> <?= $usuario['nome']; ?> </td>
                        <td> <?= $usuario['email']; ?> </td>
                        <td> <?= $usuario['idade']; ?> </td>
                        <td> <?= $usuario['contato']; ?> </td>
                        <td> <?= $usuario['endereco']; ?> </td>
                        <td>
                            <a href="editar.php?id=<?=$usuario['id']; ?>" 
                                class="btn btn-success"
                            >
                                editar
                            </a>
                            <a 
                            href="excluir.php?id=<?=$usuario['id']; ?>"
                            onclick="return confirm('Tem certeza que deseja excluir ?')"
                            class="btn btn-danger"
                            >
                            excluir
                            </a>


                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
    
        </div>

    </div>    


</body>
</html>