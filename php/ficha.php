<?php
include "./conexao.php";

$login =  $_SESSION['user'];

$name = $_POST['name'];
$level = $_POST['level'];
$race = $_POST['race'];
$class = $_POST['class'];
$hp_max = $_POST['hp_max'];
$strength = $_POST['strength'];
$dexterity = $_POST['dexterity'];
$constitution = $_POST['constitution'];
$intelligence = $_POST['intelligence'];
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
$intelligence_mod = $_POST['intelligence_mod'];
$wisdom_mod = $_POST['wisdom_mod'];
$charisma_mod = $_POST['charisma_mod'];
$abilities = $_POST['abilities'];
$weapons = $_POST['weapons'];
$skills = $_POST['skills'];
$bag = $_POST['bag'];


$result = $pdo->prepare("INSERT INTO tb_sheet (user_id, name, level, race, class, hp_max, strength, dexterity, constitution, intelligence, wisdom, charisma, armor, initiative, force, reflex, will, strength_mod, dexterity_mod, constitution_mod, intelligence_mod, wisdom_mod, charisma_mod, abilities, weapons, skills, bag) VALUE(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");

$result->execute(array($login ,$name, $level, $race, $class, $hp_max, $strength, $dexterity, $constitution, $intelligence, $wisdom, $charisma, $armor, $initiative, $force, $reflex, $will, $strength_mod, $dexterity_mod, $constitution_mod, $intelligence_mod, $wisdom_mod, $charisma_mod, $abilities, $weapons, $skills, $bag));

if ($result->rowCount() > 0) {
    echo json_encode(["icon" => "success", "title" => "Sucesso", "text" => "Entrando na ventura " . $nameAdventure , "login" => true]);
} else {
    echo json_encode(["icon" => "error", "title" => "Opsss...", "text" => "Erro ao selecionar a aventura", "fechar" => false]);
}
