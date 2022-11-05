<?php
    require 'config.php';

    $id = filter_input(INPUT_POST, 'id');
    $nome = filter_input(INPUT_POST, 'nome');
    $email = filter_input(INPUT_POST, 'email');  
    $idade = filter_input(INPUT_POST, 'idade');
    $contato = filter_input(INPUT_POST, 'contato');
    $endereco = filter_input(INPUT_POST, 'endereco');

    if($id && $nome && $email && $idade && $contato && $endereco) { 

        $sql = $pdo->prepare( "UPDATE alunos SET nome =:nome, email = :email, idade = :idade, contato = :contato, endereco = :endereco WHERE `alunos`.`id` = :id" ); // UPDATE `alunos` SET `nome` = 'Airtao' WHERE `alunos`.`id` = 4;
        $sql->bindValue(':id', $id);                    
        $sql->bindValue(':nome', $nome);                
        $sql->bindValue(':email', $email);             //Atualiza os valores de acordo com a necessidade 
        $sql->bindValue(':idade', $idade);              
        $sql->bindValue(':contato', $contato);          
        $sql->bindValue(':endereco', $endereco);        
        $sql->execute();

        header("Location: index.php"); //redirecionamento se sim
        exit;

    } else {
        header("Location: editar.php"); //redirecionamento se não
        exit;
    }

?>