<?php include '../php/conexao.php'; ?>

<!DOCTYPE html>
<html lang="pt_BR">

<head>
    <meta charset="UTF-8">

    <!-- CSS -->
    <link rel="stylesheet" href="../assets/css/dice.css">
    <link rel="stylesheet" href="../assets/css/reset.css">
    <link rel="stylesheet" href="../assets/css/table.css">
    <link rel="stylesheet" href="../assets/css/ficha.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- ICON -->
    <link rel="shortcut icon" href="../assets/images/ujzh30k5tuoy.png" type="image/x-icon">

    <title>MAKOMBRO</title>
    <style>
        #btnFicha {
            background-color: transparent !important;
            border: none !important;
        }
    </style>
</head>

<body>
    <div class="d-flex mt-3" id="global">
        <a href="../app/slc_adventure.php" class="btn btn-primary me-3">Voltar</a>

        <!-- SIDE BAR -->
        <div>
            <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasTop" aria-controls="offcanvasTop" id="button">Jogadores</button>
            <div class="offcanvas offcanvas-top" tabindex="-1" id="offcanvasTop" aria-labelledby="offcanvasTopLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasTopLabel"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <div class="d-flex flex-wrap">
                        <?php
                        $adventure = $_GET['mesa'];
                        $sql = "SELECT tu.user, tad.adventure, tad.players, ta.name
                            FROM tb_aux_adventureplayers tad
                            INNER JOIN 	tb_users tu ON tu.id = tad.players
                            INNER JOIN tb_adventure ta ON ta.id = tad.adventure
                            WHERE ta.name = '$adventure'";
                        $consulta = $pdo->query($sql);
                        while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
                            $user = $linha['user'];
                            echo "<p class='ms-4 mt-5' style='font-size: 20px;'> $user </p>";
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- DADOS -->
        <div>
            <div class="wrap">
                <dice-roll sides="4"></dice-roll>
                <dice-roll sides="6"></dice-roll>
                <dice-roll sides="8"></dice-roll>
                <dice-roll sides="10"></dice-roll>
                <dice-roll sides="12"></dice-roll>
                <dice-roll sides="20"></dice-roll>
            </div>
        </div>
    </div>

    <!-- SUAS FICHAS -->

    <?php


    $login =  $_SESSION['id_user'];
    $adventure = $_GET['mesa'];
    $abacate_doce = $pdo->prepare("SELECT id FROM tb_adventure WHERE name = '$adventure'");
    $abacate_doce->execute();
    $linha = $abacate_doce->fetch(PDO::FETCH_ASSOC);
    $adventure_id = $linha['id'];


    $banana = $pdo->prepare("SELECT name, id FROM tb_sheet WHERE user_id = '$login' AND adventure = '$adventure_id'");
    $banana->execute();

    $sql = "SELECT ts.id FROM tb_sheet ts WHERE user_id = '$login' AND adventure = '$adventure_id'";
    $consulta = $pdo->query($sql);
    while ($linha = $banana->fetch(PDO::FETCH_ASSOC)) {

        // PUXAR NOME

        $nome_ficha = $linha['name'];
        $id_ficha = $linha['id'];
        echo '<div class="d-flex justify-content-end me-1" style="color: white;">'
            . $nome_ficha . '
                <button id="btnFicha" type="button" class="btn btn-primary" onclick="fichaUser('. $id_ficha .')" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    <i class="fa-sharp fa-solid fa-file-lines fa-2xl"></i>
                </button>
            </div>';

    }


    ?>
    <?php
    $arroz_doce = $pdo->prepare("SELECT name FROM tb_adventure WHERE id = '$adventure_id'");
    $arroz_doce->execute();
    $socorro = $arroz_doce->fetch(PDO::FETCH_ASSOC);

    $nome_aventura = $socorro['name'];


    ?>

    <!-- MODAL -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel"><?php echo $nome_aventura; ?></h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <!-- FICHA -->
                <?php

                $sheet_id = $pdo -> prepare("SELECT id FROM tb_sheet WHERE user_id = '$login' AND adventure = '$adventure_id'");
                $sheet_id -> execute();
                $linha2 = $sheet_id -> fetch(PDO::FETCH_ASSOC);
                $nome = $linha2['id'];

                // echo $nome;


                ?>
                <div class="modal-body">
                    <div style=" display: flex; justify-content: space-around;">
                        <div class="d-flex justify-content-between">
                            <form class="container-md" id="form-update" action="">
                                <!-- <input type="text" hidden id="mesa" name="mesa" value="<?php echo $_GET['mesa']; ?>"> -->
                                <div class="d-flex justify-content-between mt-2">
                                    <!-- NOME -->
                                    <input type="hidden" name="id_update" id="id_update">
                                    <div>
                                        <label class="d-flex justify-content-center me-4" for="nome">NOME</label>
                                        <input type="text" name="name" class="nnr ms-2" style="width: 90%;" id="name">
                                    </div>
                                    <!-- NIVEL -->
                                    <div>
                                        <label class="d-flex" for="nivel" style="margin-left: 30%;">NIVEL</label>
                                        <input type="number" name="level" style="width: 25%; margin-left: 30%;" class="nnr" id="level">
                                    </div>
                                    <!-- RACA -->
                                    <div>
                                        <label class="d-flex ms-5" for="raca">RAÇA</label>
                                        <input type="text" name="race" id="raca" style="width: 80%;" class="nnr">
                                    </div>
                                </div>

                                <div class="d-flex justify-content-between me-5 mt-3">

                                    <!-- CLASSE -->
                                    <label class="d-flex ms-5" for="classe">CLASSE</label>

                                    <!-- HP -->
                                    <label class="d-flex me-2" for="hp">HP / HP MAX</label>
                                </div>
                                <div class="d-flex justify-content-between me-5">

                                    <!-- INPUT CLASSE -->
                                    <input type="text" name="class" style="width: 25%;" class="nnr ms-2" id="class">

                                    <!-- INPUTR HP -->
                                    <div class="d-flex justify-content-end">
                                        <input type="number" name="hp" class="nnr d-flex" style="width: 15%;" id="hp">
                                        <input type="number" name="hp_max" class="nnr me-3" style="width: 15%;" id="hp_max">
                                    </div>
                                </div>

                                <!-- FORÇA -->
                                <div class="d-flex justify-content-between my-2">

                                    <div class="d-flex justify-content-start">
                                        <label class="lbl ms-5 mt-4" for="forca">Força:
                                            <input type="number" name="strength" class="mod valor" id="strength">+
                                            <input type="number" name="strength_mod" class="mod valor" style="margin-right: 3.7rem;" id="strength_mod">
                                        </label>
                                    </div>

                                    <!-- DEFESA -->
                                    <div class="d-flex justify-content-end">
                                        <label class="lbl me-5 mt-4" for="defesa">Defesa:
                                            <input type="number" name="armor" class="mod valor" style="margin-right: 2rem;" id="armor">
                                        </label>
                                    </div>

                                </div>

                                <!-- DESTREZA -->
                                <div class="d-flex justify-content-between my-2">

                                    <div class="d-flex justify-content-start">
                                        <label class="lbl ms-5" for="destreza">Destreza:
                                            <input type="number" name="dexterity" class="mod valor" id="dexterity">+
                                            <input type="number" name="dexterity_mod" class="mod valor" style="margin-right: 2.4rem;" id="dexterity_mod">
                                        </label>
                                    </div>

                                    <!-- INICIATIVA -->
                                    <div class="d-flex justify-content-end">
                                        <label class="lbl me-5" for="iniciativa">Iniciativa:
                                            <input type="number" name="initiative" class="mod valor" id="initiative">
                                        </label>
                                    </div>
                                </div>

                                <!-- CONSTITUIÇÃO -->
                                <div class="d-flex justify-content-between my-2">

                                    <div class="d-flex justify-content-start">
                                        <label class="lbl ms-5" for="constituicao">Constituição:
                                            <input type="number" name="constitution" class="mod valor" id="constitution">+
                                            <input type="number" name="constitution_mod" class="mod valor" id="constitution_mod">
                                        </label>
                                    </div>

                                    <!-- VIGOR -->
                                    <div class="d-flex justify-content-end">
                                        <label class="lbl me-5" for="vigor">Vigor:
                                            <input type="number" name="force" class="mod valor" style="margin-right: 2rem;" id="force">
                                        </label>
                                    </div>
                                </div>

                                <!-- INTELIGENCIA -->
                                <div class="d-flex justify-content-between my-2">

                                    <div class="d-flex justify-content-start">
                                        <label class="lbl ms-5" for="inteligencia">Inteligencia:
                                            <input type="number" name="inteligence" class="mod valor" id="inteligence">+
                                            <input type="number" name="inteligence_mod" class="mod valor" style="margin-right: 0.7rem;" id="inteligence_mod">
                                        </label>
                                    </div>

                                    <!-- REFLEXO -->
                                    <div class="d-flex justify-content-end">
                                        <label class="lbl me-5" for="reflexo">Reflexo:
                                            <input type="number" name="reflex" class="mod valor" style="margin-right: 1.3rem;" id="reflex">
                                        </label>
                                    </div>
                                </div>

                                <!-- SABEDORIA -->
                                <div class="d-flex justify-content-between my-2">

                                    <div class="d-flex justify-content-start">
                                        <label class="lbl ms-5" for="sabedoria">Sabedoria:
                                            <input type="number" name="wisdom" class="mod valor" id="wisdom">+
                                            <input type="number" name="wisdom_mod" class="mod valor" style="margin-right: 1.7rem;" id="wisdom_mod">
                                        </label>
                                    </div>

                                    <!-- VONTADE -->
                                    <div class="d-flex justify-content-end">
                                        <label class="lbl me-5" for="vontade">Vontade:
                                            <input type="number" name="will" class="mod valor" style="margin-right: 0.5rem;" id="will">
                                        </label>
                                    </div>
                                </div>

                                <!-- CARISMA -->
                                <div lass="d-flex justify-content-start">
                                    <label class="lbl ms-5" for="carisma">Carisma:
                                        <input type="number" name="charisma" class="mod valor" id="charisma">+
                                        <input type="number" name="charisma_mod" class="mod valor" style="margin-right: 2.5rem;" id="charisma_mod">
                                    </label>


                                </div>

                                <!-- HABILIDADES -->
                                <div class="d-flex justify-content-around mt-4">
                                    <label for="habilidades">Habilidades</label>
                                    <label for="armas">Armas</label>
                                </div>
                                <div class="d-flex justify-content-between my-2">
                                    <textarea name="abilities" cols="25" rows="10" id="abilities"></textarea>

                                    <!-- ARMAS -->
                                    <div>
                                        <textarea name="weapons" cols="25" rows="10" id="weapons"></textarea>
                                    </div>
                                </div>


                                <!-- PERICIAS -->
                                <div class="d-flex justify-content-around mt-4">
                                    <label for="pericias">Pericias</label>

                                    <!-- BOLSA -->
                                    <label for="bolsa">Bolsa</label>
                                </div>
                                <div class="d-flex justify-content-between my-2">

                                    <!-- PERICIAS -->
                                    <textarea name="skills" cols="25" rows="10" id="skills"></textarea>

                                    <!-- BOLSA -->
                                    <div>
                                        <textarea name="bag" cols="25" rows="10" id="bag"></textarea>
                                    </div>
                                </div>


                                <!-- NOTAS ADICIONAIS -->
                                <div class="d-flex justify-content-around mt-4">
                                    <label for="notas">Notas</label>
                                </div>

                                <!-- NOTAS ADICIONAIS -->
                                <div>
                                    <textarea name="notas" id="" cols="60" rows="9" class="mb-3"></textarea>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button> -->
                    <button type="button" class="btn btn-primary" onclick="fichaUpdate()">Editar</button>
                </div>
            </div>
        </div>
    </div>



    <!-- FICHA -->
    <div class="d-flex justify-content-end me-3">
        <!-- FICHA -->
        <a class="btn btn-primary" type="button" id="fichaBtn">Criar uma ficha</a>
    </div>
    </div>
</body>
<script src="../assets/js/jquery-3.6.3.min.js"></script>
<script src="../assets/js/dice.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>
    $(document).ready(function() {
        const queryString = window.location.search;
        const urlParams = new URLSearchParams(queryString);
        const adventure = urlParams.get('mesa');

        $('#fichaBtn').attr('href', './ficha.php?mesa=' + adventure + '')

    });

    function fichaUser(id) { 
        $.ajax({
            url: '../php/fichaGet.php',
            type: 'POST',
            dataType: 'json',
            data: {
                id: id,
                // typeRes: 'get'
            },
            success: function(data) {
                console.log(data)
                $('#id_update').val(data.id)
                $('#name').val(data.name)
                $('#level').val(data.level)
                $('#class').val(data.class)
                $('#raca').val(data.race)
                $('#strength').val(data.strength)
                $('#armor').val(data.armor)
                $('#initiative').val(data.initiative)
                $('#force').val(data.force)
                $('#strength_mod').val(data.strength_mod)
                $('#dexterity').val(data.dexterity)
                $('#dexterity_mod').val(data.dexterity_mod)
                $('#constitution').val(data.constitution)
                $('#constitution_mod').val(data.constitution_mod)
                $('#inteligence').val(data.inteligence)
                $('#inteligence_mod').val(data.inteligence_mod)
                $('#wisdom').val(data.wisdom)
                $('#wisdom_mod').val(data.wisdom_mod)
                $('#charisma').val(data.charisma)
                $('#charisma_mod').val(data.charisma_mod)
                $('#hp').val(data.hp)
                $('#hp_max').val(data.hp_max)
                $('#init').val(data.init)
                $('#reflex').val(data.reflex)
                $('#will').val(data.will)
                $('#skills').val(data.skills)
                $('#abilities').val(data.abilities)
                $('#weapons').val(data.weapons)
                $('#bag').val(data.bag)
            }
        })
    }

    function fichaUpdate() {
        $.ajax({
            url: '../php/update.php',
            type: 'POST',
            dataType: 'json',
            data: $('#form-update').serialize(),
            success: function(data) {
                Swal.fire({
                    icon: data.icon,
                    title: data.title,
                    showConfirmButton: true,
                    // timer: 1500
                }).then(() => {
                    location.reload()
                })
                location.reload()
            }
        })
    }
</script>

</html>