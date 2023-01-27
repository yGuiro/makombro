<?php
include './conexao.php';

$user = $_SESSION['user'];
$name = $_POST['name'];
$system = $_POST['system'];

try {
    //Criar aventura
    $queryI = $pdo->prepare("INSERT INTO tb_adventure (`name`, `system`) VALUES ('$name', '$system')");
    //Executar query
    $resultI = $queryI->execute();
    //Pegar id da aventura
    $adventureId = $pdo->lastInsertId();
    //Adicionar mestre
    $queryS = $pdo->prepare("SELECT id FROM tb_users WHERE user = '$user'");
    //Executar query
    $resultS = $queryS->execute();
    //Serializar resultado
    $userId = $queryS->fetch(PDO::FETCH_ASSOC);
    //Pegar id do usuário na array
    $userId = $userId['id'];
    //Adicionar mestre na aventura
    $queryA = $pdo->prepare("INSERT INTO tb_aux_adventureplayers (`adventure`, `players`, `type`) VALUES ('$adventureId', '$userId', 'Mestre')");
    //Executar query
    $resultA = $queryA->execute();
    //Mensagem de sucesso
    echo json_encode(["icon" => "success", "title" => "Aventura cadastrada com sucesso!", "text" => "Clique em OK para ser redirecionado para a mesa", "cadastro" => true]);
} catch (Exception $e) {
    //Mensagem de erro
    echo json_encode(["icon" => "error", "title" => "Opsss...", "text" => "Erro ao cadastrar a aventura", "cadastro" => false, "error" => $e->getMessage()]);
}
