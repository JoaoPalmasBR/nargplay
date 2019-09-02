<?php
    include ("../connect.php");

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
            window.location.assign("../acessonaoautorizado/");
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
            <a class="navbar-brand" href="./">24K Hookah Lounge</a>
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
                <li class="breadcrumb-item active" aria-current="page">Aluguel <a href="#" class="badge badge-primary">Novo</a></li>
            </ol>
        </nav>
        <table class="table table-light table-hover table-striped table-sm">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Cadastro</th>
                <th scope="col">Validado</th>
            </tr>
            <tbody>
            <?php
            $query = "SELECT * FROM `play_aluguel` order by `cadastro` desc limit 3;";
            if ($result = $mysqli->query($query)) {
                while ($row = $result->fetch_assoc()) {
                    $id = $row['id'];
                    $cliente = $row['cliente'];
                    $cadastro = $row['cadastro'];
                    $data = $row['data'];
                    $horamarcada = $row['horamarcada'];
                    $status = $row['status'];
                    $pagamento = $row['pagamento'];

                    echo "<tr>";
                    echo "<th scope=\"row\">$id</th>";
//                    $nome2 = explode(" ",$nome);
                    echo "<td>Cliente $cliente</td>";
                    echo "<td>$data as <b>$horamarcada:00</b></td>";
                    echo "<td><button class=\"btn btn-outline-dark btn-sm\" onclick=\"window.location.assign('./detalhes/?id=$id');\">Ver</button></td>";
                    echo "<td><span class=\"badge badge-success\">Confirmado</span></td>";
                    echo "</tr>";
                }
            }
            ?>

            <!--                    <span class="badge badge-primary">Primary</span>-->
            <!--                    <span class="badge badge-secondary">Secondary</span>-->
            <!--                    <span class="badge badge-success">Success</span>-->
            <!--                    <span class="badge badge-danger">Danger</span>-->
            <!--                    <span class="badge badge-warning">Warning</span>-->
            <!--                    <span class="badge badge-info">Info</span>-->
            <!--                    <span class="badge badge-light">Light</span>-->
            <!--                    <span class="badge badge-dark">Dark</span>-->
            </tr>
            </tbody>
            </thead>
        </table>
        <hr>

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">Clientes</li>
            </ol>
        </nav>
        <table class="table table-light table-hover table-striped table-sm">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Cadastro</th>
                <th scope="col">Validado</th>
            </tr>
            <tbody>
            <?php
                $query = "SELECT * FROM `play_clientes` order by `cadastro` desc limit 3;";
                if ($result = $mysqli->query($query)) {
                    while ($row = $result->fetch_assoc()) {
                        $id = $row['id'];
                        $nome = $row['nome'];
                        $cadastro = $row['cadastro'];
                        $nascimento = $row['nascimento'];

                        echo "<tr>";
                        echo "<th scope=\"row\">$id</th>";
                        $nome2 = explode(" ",$nome);
                        echo "<td>".$nome2[0]." ".$nome2[1]."</td>";
                        echo "<td>$cadastro</td>";
                        echo "<td><span class=\"badge badge-success\">Confirmado</span></td>";
                        echo "</tr>";
                    }
                }
            ?>

<!--                    <span class="badge badge-primary">Primary</span>-->
<!--                    <span class="badge badge-secondary">Secondary</span>-->
<!--                    <span class="badge badge-success">Success</span>-->
<!--                    <span class="badge badge-danger">Danger</span>-->
<!--                    <span class="badge badge-warning">Warning</span>-->
<!--                    <span class="badge badge-info">Info</span>-->
<!--                    <span class="badge badge-light">Light</span>-->
<!--                    <span class="badge badge-dark">Dark</span>-->
                </tr>
            </tbody>
            </thead>
        </table>
        <hr>
        <h1 class="mt-5 text-white font-weight-light">Animated Bootstrap Navbar Dropdowns</h1>
        <p class="lead text-white-50">An attractive yet subtle dropdown animation for dropdown menus loacated within a Bootstrap navbar</p>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>