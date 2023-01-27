<?php include('../php/conexao.php') ?>

<!DOCTYPE html>
<html lang="pt_BR">

<head>
    <meta charset="UTF-8">

    <!-- CSS -->
    <link rel="stylesheet" href="../assets/css/reset.css">
    <link rel="stylesheet" href="../assets/css/adventure.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <!-- ICON -->
    <link rel="shortcut icon" href="../assets/images/ujzh30k5tuoy.png" type="image/x-icon">

    <title>MAKOMBRO</title>
</head>

<body>
    <div id="container">
        <div id="select">
            <div>
                <h3>ESCOLHA SUA AVENTURA</h3>
            </div>
            <fieldset>
                <div>
                    <legend>JOGADOR</legend>
                    <?php
                    $login =  $_SESSION['user'];
                    $sql = "SELECT ta.name, ta.system, tu.`user`, tad.`type` FROM tb_aux_adventureplayers tad
                    INNER JOIN tb_users tu ON tu.id = tad.players 
                    INNER JOIN tb_adventure ta ON ta.id = tad.adventure
                    WHERE tu.user =  '$login'";
                    $consulta = $pdo->query($sql);
                    while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
                        $user = $linha['user'];
                        $type = $linha['type'];
                        $name = $linha['name'];
                        if ($type == 'Jogador') {
                            echo "
                        <div class='form-check'>
                        <input class='form-check-input' type='radio' name='jogador' id=''>
                        <label for=''> $user - $type - $name</label>
                        </div>
                        ";
                        }
                    }
                    ?>
                </div>

            </fieldset>
            <fieldset>
                <div class="mb-4">
                    <legend>MESTRE</legend>
                    <?php
                    $login =  $_SESSION['user'];
                    $sql = "SELECT ta.name, ta.system, tu.`user`, tad.`type` FROM tb_aux_adventureplayers tad
                    INNER JOIN tb_users tu ON tu.id = tad.players 
                    INNER JOIN tb_adventure ta ON ta.id = tad.adventure
                    WHERE tu.user =  '$login'";
                    $consulta = $pdo->query($sql);
                    while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
                        $user = $linha['user'];
                        $type = $linha['type'];
                        $name = $linha['name'];
                        if ($type == 'Mestre') {
                            echo "
                        <div class='form-check'>
                            <input class='form-check-input' type='radio' name='flexRadioDefault' id=''>
                            <label for=''> $user - $type - $name</label>
                        </div>
                        ";
                        }
                    }
                    ?>
                </div>

                <div class="d-flex justify-content-center">
                    <button class="btn btn-primary" id="btn">CONFIRMAR</button>
                </div>
        </div>
        <div class="mb-4">
            <labels class="ms-5">Criar nova aventura</labels>
            <a href="new_adventure.html">
                <img src="../assets/images/228122.png" alt="" id="add">
            </a>
        </div>
        </fieldset>
    </div>
    </div>
    </div>
    </div>
</body>
<!-- JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

</html>