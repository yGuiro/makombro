<?php
include './conexao.php';

$user = $_POST['user'];
$password = $_POST['password'];

$result = $pdo->prepare("SELECT * FROM tb_users WHERE user = '$user' AND Password = '$password'");
$result->execute();

if ($result->rowCount() > 0) {
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        $_SESSION['id_user'] = $row['id'];
    }
    $_SESSION['logado'] = true;
    $_SESSION['user'] = $user;
    
    echo json_encode(["icon" => "success", "title" => "Login", "text" => "Login realizado com sucesso!", "Login" => true]);
} else {
    echo json_encode(["icon" => "error", "title" => "Opsss...", "text" => "Erro ao realizar login", "Fechar" => false]);
}
