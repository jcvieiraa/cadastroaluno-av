<?php 

    require 'config.php';

    $id = filter_input(INPUT_POST, 'id');
    $nome = filter_input(INPUT_POST, 'nome');
    $email = filter_input(FILTER_DEFAULT, 'email', FILTER_VALIDATE_EMAIL);


    if ($id && $name && $email) {
        
        $sql = $pdo->prepare("ALTER TABLE alunos TRUNCATE alunos.;");
        $sql->bindValue(":nome", $nome);
        $sql->bindValue(":email", $email);
        $sql->execute ();

        header("Location:index.php");
        exit;

    } else {
        header('Location: editar.php');
        exit;
    } 

?>