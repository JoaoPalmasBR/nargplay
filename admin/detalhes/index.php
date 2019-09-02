<?php
    include ("../../connect.php");
    $aluguel = $_GET['id'];
    $clienteid = 0;
?>
<!doctype html>
<html lang="pt">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>24K Hookah Lounge</title>
    <script>
        if (sessionStorage.getItem("t") != 0){
            alert('nao autorizado');
            window.location.assign("../../acessonaoautorizado/");
        }
        //
        // if (sessionStorage.getItem("t") == 0){
        //     alert('autorizado');
        // }
    </script>
    <style>
        /* Change this breakpoint if you change the breakpoint of the navbar */

        @media (min-width: 992px) {
            .animate {
                animation-duration: 0.3s;
                -webkit-animation-duration: 0.3s;
                animation-fill-mode: both;
                -webkit-animation-fill-mode: both;
            }
        }

        @keyframes slideIn {
            0% {
                transform: translateY(1rem);
                opacity: 0;
            }
            100% {
                transform:translateY(0rem);
                opacity: 1;
            }
            0% {
                transform: translateY(1rem);
                opacity: 0;
            }
        }

        @-webkit-keyframes slideIn {
            0% {
                -webkit-transform: transform;
                -webkit-opacity: 0;
            }
            100% {
                -webkit-transform: translateY(0);
                -webkit-opacity: 1;
            }
            0% {
                -webkit-transform: translateY(1rem);
                -webkit-opacity: 0;
            }
        }

        .slideIn {
            -webkit-animation-name: slideIn;
            animation-name: slideIn;
        }

        /* Other styles for the page not related to the animated dropdown */

        body {
            /*background: #030005;*/
            background: #007bff;
            background: linear-gradient(to right, #0062E6, #33AEFF);
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="./../">24K Hookah Lounge</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <script>document.write(sessionStorage.getItem('us'));</script>
                        </a>
                        <!-- Here's the magic. Add the .animate and .slide-in classes to your .dropdown-menu and you're all set! -->
                        <div class="dropdown-menu dropdown-menu-right animate slideIn" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container text-center">
        <br>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">Aluguel</li>
            </ol>
        </nav>
        <div class="container">
            <div class="bg-dark mr-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center text-white overflow-hidden">
                <div class="my-3 py-3">
                    <h2 class="display-5">Dados do Contrato</h2>
                    <p class="lead"><?php
                        $query = "SELECT * FROM `play_aluguel` where id=$aluguel;";
                        if ($result = $mysqli->query($query)) {
                            while ($row = $result->fetch_assoc()) {
                                $id = $row['id'];
                                $cliente = $row['cliente'];
                                $cadastro = $row['cadastro'];
                                $data = $row['data'];
                                $horamarcada = $row['horamarcada'];
                                $status = $row['status'];
                                $pagamento = $row['pagamento'];
                                $clienteid = $cliente;
                                echo "Identificador: <kbd>#$id</kbd><br>";
                                echo "Data Marcada: $data as <b>$horamarcada:00</b><br>";
                                echo "Pagamento: <span class=\"badge badge-success\">$pagamento</span><br>";
                                echo "Status: <span class=\"badge badge-success\">$status</span><br>";
                            }
                        }
                        ?></p>
                </div>
            </div>
            <div class="bg-light mr-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden">
                <div class="my-3 p-3">
                    <h2 class="display-5">Dados do Contratante</h2>
                    <p class="lead"><?php
                        function mask($val, $mask)
                        {
                            $maskared = '';
                            $k = 0;
                            for($i = 0; $i<=strlen($mask)-1; $i++)
                            {
                                if($mask[$i] == '#')
                                {
                                    if(isset($val[$k]))
                                        $maskared .= $val[$k++];
                                }
                                else
                                {
                                    if(isset($mask[$i]))
                                        $maskared .= $mask[$i];
                                }
                            }
                            return $maskared;
                        }
                        $query = "SELECT * FROM `play_clientes` where id=$clienteid;";
                        if ($result = $mysqli->query($query)) {
                            while ($row = $result->fetch_assoc()) {
                                $id = $row['id'];
                                $nome = $row['nome'];
                                $cpf = $row['cpf'];
                                $nascimento = $row['nascimento'];

                                echo "Nome: <kbd>$nome</kbd><span class=\"badge badge-success\">👍</span><br>";
                                echo "CPF: <b>".mask($cpf,'###.###.###-##')."</b><span class=\"badge badge-success\">👍</span><br>";
                                echo "Nascimento: $nascimento<br>";
                            }
                        }
                        ?></p>
                </div>
            </div>
            <div class="bg-dark mr-md-3 pt-3 px-3 pt-md-5 px-md-5 text-white text-center overflow-hidden">
                <div class="my-3 p-3">
                    <h2 class="display-5">Itens</h2>
                <p class="lead">
                    a
                </p>
            </div>
        </div>




            <!--                    <span class="badge badge-primary">Primary</span>-->
            <!--                    <span class="badge badge-secondary">Secondary</span>-->
            <!--                    <span class="badge badge-success">Success</span>-->
            <!--                    <span class="badge badge-danger">Danger</span>-->
            <!--                    <span class="badge badge-warning">Warning</span>-->
            <!--                    <span class="badge badge-info">Info</span>-->
            <!--                    <span class="badge badge-light">Light</span>-->
            <!--                    <span class="badge badge-dark">Dark</span>-->

<!--        <p class="lead text-white-50">An attractive yet subtle dropdown animation for dropdown menus loacated within a Bootstrap navbar</p>-->
    </div>
        <br>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>