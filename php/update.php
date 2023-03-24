<?php




try {
    include "./conexao.php";

    $user_id =  $_SESSION['id_user'];

    $id_update = $_POST['id_update'];
    $name = $_POST['name'];
    $level = $_POST['level'];
    $race = $_POST['race'];
    $class = $_POST['class'];
    $hp = $_POST['hp'];
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

    $result = $pdo->prepare(
        "UPDATE `tb_sheet` SET `level`='$level', `class`='$class', `hp`='$hp', `hp_max`='$hp_max', `strength`='$strength', `dexterity`='$dexterity', `constitution`='$constitution', `inteligence`='$intelligence', `wisdom`='$wisdom', `charisma`='$charisma', `armor`='$armor', `initiative`='$initiative', `force`='$force', `reflex`='$reflex', `will`='$will', `strength_mod`='$strength_mod', `dexterity_mod`='$dexterity_mod', `constitution_mod`='$constitution_mod', `inteligence_mod`='$intelligence_mod', `wisdom_mod`='$wisdom_mod', `charisma_mod`='$charisma_mod', `abilities`='$abilities', `weapons`='$weapons', `skills`='$skills', `bag`='$bag' WHERE `id` = '$id_update'"
    );

    $result->execute();

    if ($result->rowCount() > 0) {
        echo json_encode(["icon" => "success", "title" => "Sucesso", "text" => "Ficha Atualizada", "login" => true]);
    } else {
        echo json_encode(["icon" => "error", "title" => "Opsss...", "text" => "Erro ao atualizar ficha", "login" => false]);
    }
} catch (\Throwable $th) {
    throw $th;
}
