<?php
// login.php
    $inputUsuario = $_POST["inputEmail"];
    $inputSenha = $_POST["inputPassword"];
    include("../connect.php");

    $temusuario = 0;
    $query = "SELECT * FROM `play_usuarios` where usuario='$inputUsuario';";
    echo ("$query <hr>");
    if ($result = $mysqli->query($query)) {
        while ($row = $result->fetch_assoc()) {
            $temusuario = 1;
            $senhacerta = 0;

            $id = $row['id'];
            $tipo = $row['tipo'];
            $nome = $row['nome'];
            $usuario = $row['usuario'];
            $senha = $row['senha'];
            echo "id: <kbd>$id</kbd> <br>";
            echo "tipo: <kbd>$tipo</kbd> (0 Admin, 1 Cliente) <br>";
            echo "nome: <kbd>$nome</kbd> <br>";
            echo "usuario: <kbd>$usuario</kbd> <br>";
            echo "senha: <kbd>$senha</kbd> <br>";
            if ($inputSenha == $senha){
                $senhacerta = 1;
            }
            if ($temusuario){
                echo "<a style='background-color: green;'>tem usuario</a><br>";
                if ($senhacerta){
                    echo "<a style='background-color: green;'>senha certa</a><br>";

                } else {
//                    echo "<a style='background-color: red;'>senha errada</a><br>";
                    echo "<script>window.location.assign('../senhaincorreta/')</script>";
                }
            }
        }
    }
    if (!$temusuario){
//        echo "<a style='background-color: red;'>nao tem usuario</a><br>";
        echo "<script>window.location.assign('../usuarionaoencontrado/')</script>";
    }
        //         $nome = $row['nome'];
        //         $apelido = $row['apelido'];
        //         $usuario2 = $row['usuario'];
        //         $email = $row['email'];
        //         $senha = $row['senha'];
        //         $tipo = $row['tipo'];
        //         $create_time = $row['create_time'];

        //         $usuario = new Usuario();
        //         $usuario->id = $id;
        //         $usuario->nome = $nome;
        //         $usuario->apelido = $apelido;
        //         $usuario->create_time = $create_time;
        //         $usuario->tipo = $tipo;
        //         $usuario->usuario = $usuario2;
        //         $usuario->email = $email;
        //         $usuario->senha = $senha;
        //         array_push($usuarios,$usuario);
        //     }
        // }