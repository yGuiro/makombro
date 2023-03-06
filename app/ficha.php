<!DOCTYPE html>
<html lang="pt_BR">

<head>
    <meta charset="UTF-8">
    <title>Ficha</title>

    <!-- CSS -->
    <link rel="stylesheet" href="../assets/css/reset.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/ficha.css">

    <!-- ICON -->
    <link rel="shortcut icon" href="../assets/images/ujzh30k5tuoy.png" type="image/x-icon">

    <style>
        body {
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
            background-position: center;
        }
    </style>
</head>

<body class="mt-3">
    <a href="./slc_adventure.php" class="btn btn-primary ms-3 btn-login">VOLTAR À SELEÇÃO DE AVENTURA</a>
    <div style=" display: flex; justify-content: space-around;">
        <div class="d-flex justify-content-between">
            <form class="container-md" id="form" action="">
                <input type="text" hidden id="mesa" name="mesa" value="<?php echo $_GET['mesa']; ?>">
                <div class="d-flex justify-content-between mt-2">
                    <!-- NOME -->
                    <div>
                        <label class="d-flex justify-content-center me-4" for="nome">NOME</label>
                        <input type="text" name="name" class="nnr ms-2" style="width: 90%;">
                    </div>
                    <!-- NIVEL -->
                    <div>
                        <label class="d-flex" for="nivel" style="margin-left: 30%;">NIVEL</label>
                        <input type="number" name="level" style="width: 25%; margin-left: 30%;" class="nnr">
                    </div>
                    <!-- RACA -->
                    <div>
                        <label class="d-flex ms-5" for="raca">RAÇA</label>
                        <input type="text" name="race" id="raca" style="width: 80%;" class="nnr ">
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
                    <input type="text" name="class" style="width: 25%;" class="nnr ms-2">

                    <!-- INPUTR HP -->
                    <div class="d-flex justify-content-end">
                        <input type="number" name="hp" class="nnr d-flex" style="width: 15%;">
                        <input type="number" name="hp_max" class="nnr me-3" style="width: 15%;">
                    </div>
                </div>

                <!-- FORÇA -->
                <div class="d-flex justify-content-between my-2">

                    <div class="d-flex justify-content-start">
                        <label class="lbl ms-5 mt-4" for="forca">Força:
                            <input type="number" name="strength" class="mod valor">+
                            <input type="number" name="strength_mod" class="mod valor" style="margin-right: 3.7rem;">
                        </label>
                    </div>

                    <!-- DEFESA -->
                    <div class="d-flex justify-content-end">
                        <label class="lbl me-5 mt-4" for="defesa">Defesa:
                            <input type="number" name="armor" class="mod valor" style="margin-right: 2rem;">
                        </label>
                    </div>

                </div>

                <!-- DESTREZA -->
                <div class="d-flex justify-content-between my-2">

                    <div class="d-flex justify-content-start">
                        <label class="lbl ms-5" for="destreza">Destreza:
                            <input type="number" name="dexterity" class="mod valor">+
                            <input type="number" name="dexterity_mod" class="mod valor" style="margin-right: 2.4rem;">
                        </label>
                    </div>

                    <!-- INICIATIVA -->
                    <div class="d-flex justify-content-end">
                        <label class="lbl me-5" for="iniciativa">Iniciativa:
                            <input type="number" name="initiative" class="mod valor">
                        </label>
                    </div>
                </div>

                <!-- CONSTITUIÇÃO -->
                <div class="d-flex justify-content-between my-2">

                    <div class="d-flex justify-content-start">
                        <label class="lbl ms-5" for="constituicao">Constituição:
                            <input type="number" name="constitution" class="mod valor">+
                            <input type="number" name="constitution_mod" class="mod valor">
                        </label>
                    </div>

                    <!-- VIGOR -->
                    <div class="d-flex justify-content-end">
                        <label class="lbl me-5" for="vigor">Vigor:
                            <input type="number" name="force" class="mod valor" style="margin-right: 2rem;">
                        </label>
                    </div>
                </div>

                <!-- INTELIGENCIA -->
                <div class="d-flex justify-content-between my-2">

                    <div class="d-flex justify-content-start">
                        <label class="lbl ms-5" for="inteligencia">Inteligencia:
                            <input type="number" name="inteligence" class="mod valor">+
                            <input type="number" name="inteligence_mod" class="mod valor" style="margin-right: 0.7rem;">
                        </label>
                    </div>

                    <!-- REFLEXO -->
                    <div class="d-flex justify-content-end">
                        <label class="lbl me-5" for="reflexo">Reflexo:
                            <input type="number" name="reflex" class="mod valor" style="margin-right: 1.3rem;">
                        </label>
                    </div>
                </div>

                <!-- SABEDORIA -->
                <div class="d-flex justify-content-between my-2">

                    <div class="d-flex justify-content-start">
                        <label class="lbl ms-5" for="sabedoria">Sabedoria:
                            <input type="number" name="wisdom" class="mod valor">+
                            <input type="number" name="wisdom_mod" class="mod valor" style="margin-right: 1.7rem;">
                        </label>
                    </div>

                    <!-- VONTADE -->
                    <div class="d-flex justify-content-end">
                        <label class="lbl me-5" for="vontade">Vontade:
                            <input type="number" name="will" class="mod valor" style="margin-right: 0.5rem;">
                        </label>
                    </div>
                </div>

                <!-- CARISMA -->
                <div lass="d-flex justify-content-start">
                    <label class="lbl ms-5" for="carisma">Carisma:
                        <input type="number" name="charisma" class="mod valor">+
                        <input type="number" name="charisma_mod" class="mod valor" style="margin-right: 2.5rem;">
                    </label>


                </div>

                <!-- HABILIDADES -->
                <div class="d-flex justify-content-around mt-4">
                    <label for="habilidades">Habilidades</label>
                    <label for="armas">Armas</label>
                </div>
                <div class="d-flex justify-content-between my-2">
                    <textarea name="abilities" cols="25" rows="10"></textarea>

                    <!-- ARMAS -->
                    <div>
                        <textarea name="weapons" id="" cols="25" rows="10"></textarea>
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
                    <textarea name="skills" id="" cols="25" rows="10"></textarea>

                    <!-- BOLSA -->
                    <div>
                        <textarea name="bag" id="" cols="25" rows="10"></textarea>
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
    <div class="d-flex justify-content-center mt-3 mb-3">
        <button type="button" class="btn btn-primary ms-3 btn-login" id="btn">SALVAR ALTERAÇÕES</button>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $('#btn').click(function() {
        const form = $('#form').serializeArray();

        $.ajax({
            url: '../php/ficha.php',
            type: 'POST',
            data: form,
            dataType: 'json',
        }).done(function(res) {
            Swal.fire({
                icon: res.icon,
                title: res.title,
                text: res.text,
                showConfirmButton: true,
            }).then(function() {
                if (res.login) {
                    window.location.href = "./slc_adventure.php";
                } else {
                    window.location.reload();
                }
            })
        })
    })
</script>

</html>