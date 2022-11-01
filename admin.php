<?php

    require 'config.php';
    include 'head.php';

    $lista = [];

    $sql = $pdo->query("Select * from usuarios");

    if($sql->rowCount() > 0) {
        $lista = $sql->fetchall(PDO::FETCH_ASSOC);
    }

?>


<body>

    <div class="container">
        

        <div>
            <a class="btn btn-primary" href="adicionar.php"> Adicionar usuário </a>
        </div>
    
        <div>
    
            <table class="table">
            
                <tr>
                    <th>Nome</th>
                    <th>Email</th>
    
                </tr>
                <?php foreach($lista as $usuario): ?>
                    <tr>
                        <td> <?= $usuario['nome']; ?> </td>
                        <td> <?= $usuario['email']; ?> </td>
                        <td>
                            <a href="editar.php?id=<?=$usuario['nome']; ?>" 
                                class="btn btn-success"
                            >
                                editar
                            </a>
                            <a 
                            href="excluir.php?id=<?=$usuario['nome']; ?>"
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