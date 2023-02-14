<?php 
include 'conexao.php';
$login =  $_SESSION['user'];

$nameAdventure = $_POST['adveture'];

$sql = "SELECT  ta.name, tad.type, tu.user 
        FROM tb_aux_adventureplayers tad 
        INNER JOIN tb_adventure ta ON ta.id = tad.adventure
        INNER JOIN tb_users tu ON tu.id = tad.players
        WHERE tu.`user` = '$login'"; 
        // AND tad.type = 'Mestre'

$result = $pdo->query($sql);


if ($result->rowCount() > 0) {
    echo json_encode(["icon" => "success", "title" => "Sucesso", "text" => "Entrando na ventura " . $nameAdventure , "login" => true]);
} else {
    echo json_encode(["icon" => "error", "title" => "Opsss...", "text" => "Erro ao selecionar a aventura", "fechar" => false]);
}


?>