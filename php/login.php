<?php
include './conexao.php';

$user = $_POST['user'];
$password = $_POST['password'];


$result = $pdo->prepare("SELECT * FROM tb_users WHERE user = '$user' AND Password = '$password'");
$result->execute();

if ($result->rowCount() > 0) {
    $_SESSION['logado'] = true;
    $_SESSION['user'] = $user;
    
    echo json_encode(["icon" => "success", "title" => "Login", "text" => "Login realizado com sucesso!", "login" => true]);
} else {
    echo json_encode(["icon" => "error", "title" => "Opsss...", "text" => "Erro ao realizar login", "login" => false]);
}
