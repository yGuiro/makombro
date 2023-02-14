<?php include '../php/conexao.php'; ?>

<!DOCTYPE html>
<html lang="pt_BR">

<head>
    <meta charset="UTF-8">

    <!-- CSS -->
    <link rel="stylesheet" href="../assets/css/dice.css">
    <link rel="stylesheet" href="../assets/css/reset.css">
    <link rel="stylesheet" href="../assets/css/table.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <!-- ICON -->
    <link rel="shortcut icon" href="../assets/images/ujzh30k5tuoy.png" type="image/x-icon">

    <title>MAKOMBRO</title>
</head>

<body>
    <div class="d-flex mt-5" id="global">
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

        <audio src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/101507/dice.mp3" id="die-sound"></audio>
    </div>
    </div>
</body>
<script src="../assets/js/jquery-3.6.3.min.js"></script>
<script src="../assets/js/dice.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>


</html>