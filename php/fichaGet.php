<?php 
include("./conexao.php");
// $user_id =  $_SESSION['id_user'];

$id = $_POST['id'];

$abacate_doce = $pdo->prepare("SELECT * FROM tb_sheet WHERE id = '$id'");
$abacate_doce->execute();
$linha = $abacate_doce->fetch(PDO::FETCH_ASSOC);

echo json_encode($linha);





?>