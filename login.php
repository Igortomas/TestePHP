<?php

require 'conexao.php';

$login = $_POST['login'];
$senha = $_POST['senha'];
$query_select = "SELECT * FROM usuarios WHERE LOGIN = '$login' AND SENHA = '$senha'";

$verifica = mysqli_query($connect,$query_select);
if (mysqli_num_rows($verifica)<=0){
    echo"<script language='javascript' type='text/javascript'>
        alert('Login e/ou senha incorretos');window.location
        .href='index.html';</script>";
    die();
}else{
    setcookie("login",$login);
    header("Location:pesquisa_usuarios.html");
}
?>