<?php
// login.php
    $inputUsuario = strtolower($_POST["inputEmail"]);
    $inputSenha = strtolower($_POST["inputPassword"]);
    include("../connect.php");

    $temusuario = 0;
    $query = "SELECT * FROM `play_usuarios` where usuario='$inputUsuario';";
//    echo ("$query <hr>");
    if ($result = $mysqli->query($query)) {
        while ($row = $result->fetch_assoc()) {
            $temusuario = 1;
            $senhacerta = 0;

            $id = $row['id'];
            $tipo = $row['tipo'];
            $nome = $row['nome'];
            $usuario = $row['usuario'];
            $senha = $row['senha'];
//            echo "id: <kbd>$id</kbd> <br>";
//            echo "tipo: <kbd>$tipo</kbd> (0 Admin, 1 Cliente) <br>";
//            echo "nome: <kbd>$nome</kbd> <br>";
//            echo "usuario: <kbd>$usuario</kbd> <br>";
//            echo "senha: <kbd>$senha</kbd> <br>";
            if ($inputSenha == $senha){
                $senhacerta = 1;
            }
            if ($temusuario){
//                echo "<a style='background-color: green;'>tem usuario</a><br>";
                if ($senhacerta){
//                    echo "<a style='background-color: green;'>senha certa</a><br>";
                    echo "<script>sessionStorage.setItem('u',$id);</script>";
                    echo "<script>sessionStorage.setItem('us','$usuario');</script>";
                    echo "<script>sessionStorage.setItem('t',$tipo);</script>";
                    if ($tipo==0){
                        echo "<script>window.location.assign('../admin/');</script>";
                    }
                    if ($tipo==1){
                        echo "<script>window.location.assign('../dashboard/');</script>";
                    }
                } else {
//                    echo "<a style='background-color: red;'>senha errada</a><br>";
                    echo "<script>window.location.assign('../senhaincorreta/');</script>";
                }
            }
        }
    }
    if (!$temusuario){
//        echo "<a style='background-color: red;'>nao tem usuario</a><br>";
        echo "<script>window.location.assign('../usuarionaoencontrado/');</script>";
    }