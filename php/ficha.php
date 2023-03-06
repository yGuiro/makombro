<?php




try {
   
include "./conexao.php";

$user_id =  $_SESSION['id_user'];

$name = $_POST['name'];
$level = $_POST['level'];
$race = $_POST['race'];
$class = $_POST['class'];
$hp_max = $_POST['hp_max'];
$strength = $_POST['strength'];
$dexterity = $_POST['dexterity'];
$constitution = $_POST['constitution'];
$intelligence = $_POST['inteligence'];
$wisdom = $_POST['wisdom'];
$charisma = $_POST['charisma'];
$armor = $_POST['armor'];
$initiative = $_POST['initiative'];
$force = $_POST['force'];
$reflex = $_POST['reflex'];
$will = $_POST['will'];
$strength_mod = $_POST['strength_mod'];
$dexterity_mod = $_POST['dexterity_mod'];
$constitution_mod = $_POST['constitution_mod'];
$intelligence_mod = $_POST['inteligence_mod'];
$wisdom_mod = $_POST['wisdom_mod'];
$charisma_mod = $_POST['charisma_mod'];
$abilities = $_POST['abilities'];
$weapons = $_POST['weapons'];
$skills = $_POST['skills'];
$bag = $_POST['bag'];
$adventure = $_POST['mesa'];

$abacate_doce = $pdo->prepare("SELECT id FROM tb_adventure WHERE name = '$adventure'");
$abacate_doce->execute();
$linha = $abacate_doce->fetch(PDO::FETCH_ASSOC);
$adventure_id = $linha['id'];

$result = $pdo->prepare(
    "INSERT INTO `tb_sheet` (`user_id`,`adventure`, `name`, `level`, `race`, `class`, `hp_max`, `strength`, `dexterity`, `constitution`, `inteligence`, `wisdom`, `charisma`, `armor`, `initiative`, `force`, `reflex`, `will`, `strength_mod`, `dexterity_mod`, `constitution_mod`, `inteligence_mod`, `wisdom_mod`, `charisma_mod`, `abilities`, `weapons`, `skills`, `bag`) VALUE ($user_id ,'$adventure_id','$name', $level, '$race', '$class', $hp_max, $strength, $dexterity, $constitution, $intelligence, $wisdom, $charisma, $armor, $initiative, $force, $reflex, $will, $strength_mod, $dexterity_mod, $constitution_mod, $intelligence_mod, $wisdom_mod, $charisma_mod, '$abilities', '$weapons', '$skills', '$bag')");

$result->execute();

if ($result->rowCount() > 0) {
    echo json_encode(["icon" => "success", "title" => "Sucesso", "text" => "Ficha Atualizada" , "login" => true]);
} else {
    echo json_encode(["icon" => "error", "title" => "Opsss...", "text" => "Erro ao atualizar ficha", "login" => false]);
}

} catch (\Throwable $th) {
    throw $th;
}

