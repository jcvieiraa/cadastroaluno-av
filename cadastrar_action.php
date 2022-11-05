<?php 

require 'config.php';

$nome = filter_input (INPUT_POST, 'nome');
$email = filter_input (INPUT_POST, 'email', FILTER_VALIDATE_EMAIL); 
$senha = filter_input (INPUT_POST, 'senha');
$confirmar_senha = filter_input (INPUT_POST, 'confirmar_senha');

if ($nome && $email && $senha && $confirmar_senha) {
    $sql = $pdo->prepare ("SELECT * FROM usuarios WHERE email = :email"); //Verifica os valores da tabela usuario onde email tem mesmo valor
    $sql->bindValue (":email", $email);
    $sql->execute();

    if ($sql->rowCount () === 0 ) {
        if ($senha === $confirmar_senha) {
            $senha_hash = password_hash ($senha, PASSWORD_DEFAULT); //Verifica se a Senha e Confirmar Senha são iguais

            $sql = $pdo->prepare( "INSERT INTO usuarios (nome, email, senha) VALUES (:nome, :email, :senha)" );
            $sql->bindValue (":nome", $nome);
            $sql->bindValue (":email", $email);          //Adiciona os valores na tabla "usuarios"
            $sql->bindValue (":senha", $senha_hash);    //Senha em hash
            $sql->execute ();
            header ("Location: login.php"); //redirecionamento se sim
            exit;

        } else {
            header ("Location: cadastrar.php"); //redirecionamento se não
            exit;
        } 
            
    } else {
        header ("Location: cadastrar.php"); //redirecionamento se não
        exit;
    }

} else {
    header ("Location: cadastrar.php"); //redirecionamento se não
    exit;
}