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
            <form id="formsSelect" class="ms-4">
                <fieldset>
                    <div>
                        <legend>JOGADOR</legend>
                        <?php
                        $login =  $_SESSION['user'];
                        $sql = "SELECT ta.name, ta.system, tu.`user`, tad.`type`, ta.id 
                                FROM tb_aux_adventureplayers tad
                                INNER JOIN tb_users tu ON tu.id = tad.players 
                                INNER JOIN tb_adventure ta ON ta.id = tad.adventure
                                WHERE tu.user =  '$login'";
                        $consulta = $pdo->query($sql);
                        while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
                            $user = $linha['user'];
                            $type = $linha['type'];
                            $nameAdventure = $linha['name'];
                            $idAdventure = $linha['name'];
                            if ($type == 'Jogador') {
                                echo "
                                <div class='form-check'>
                                    <input class='form-check-input' type='radio' name='adveture' value='$idAdventure'/>
                                    <label for=''> $user - $type - $nameAdventure</label>
                                </div>
                                
                            ";
                            }
                        }
                        ?>
                </fieldset>
                <fieldset class="mt-3">
                    <div class="mb-4">
                        <legend>MESTRE</legend>
                        <?php
                        $login =  $_SESSION['user'];
                        //PUXANDO NOME DO JOGADOR, TIPO DE JOGADOR E NOME DA AVENTURA
                        $sql = "SELECT ta.name, ta.system, tu.`user`, tad.`type`, ta.id FROM tb_aux_adventureplayers tad
                            INNER JOIN tb_users tu ON tu.id = tad.players 
                            INNER JOIN tb_adventure ta ON ta.id = tad.adventure
                            WHERE tu.user =  '$login'";
                        //EXECUTANDO A QUERY
                        $consulta = $pdo->query($sql);
                        //EXIBINDO OS DADOS
                        while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
                            $user = $linha['user'];
                            $type = $linha['type'];
                            $nameAdventure = $linha['name'];
                            $idAdventure = $linha['name'];
                            if ($type == 'Mestre') {
                                echo "
                            <div class='form-check'>
                                <input class='form-check-input' type='radio' name='adveture' id='flexRadioDefault1' value='$idAdventure'/>
                                <label for=''> $user - $type - $nameAdventure</label>
                            </div>
                            ";
                            }
                        }
                        ?>
                    </div>
                    <div class="d-flex justify-content-center">
                        <button class="btn btn-primary me-4" id="btn" type="button">CONFIRMAR</button>
                    </div>
                    <div class="d-flex justify-content-center">
                        <a href="../php/sair.php" class="btn btn-primary mt-2 me-4" id="btn-a">SAIR</a>
                    </div>
                </fieldset>
                <div class="mt-4">
                    <labels class="ms-5">Criar nova aventura</labels>
                    <a href="new_adventure.html">
                        <img src="../assets/images/228122.png" alt="" id="add">
                    </a>
                </div>
            </form>
        </div>
    </div>
</body>
<!-- JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $('#btn').click(function() {
        const form = $('#formsSelect').serializeArray();

        $.ajax({
            url: '../php/slc_adventure.php',
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
                    var idAdventure = $('input[name=adveture]:checked').val();
                    window.location.href = "./table.php?mesa="  + idAdventure;
                } else {
                    window.location.reload();
                }
            })
        })
    })
</script>

</html>