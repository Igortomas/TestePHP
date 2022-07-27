<?php

require 'conexao.php';
$acao = $_POST['acao'];

if($acao == "BuscaClientes"){
  $usuario = $_POST['usuario'];

  if ($usuario == '' || $usuario == null) {
    $query_select = "SELECT * FROM usuarios";
    $select = mysqli_query($connect,$query_select);
    $array = mysqli_fetch_all($select);
  }else{
    $query_select = "SELECT * FROM usuarios WHERE NOME_COMPLETO = '$usuario'";
    $select = mysqli_query($connect,$query_select);
    $array = mysqli_fetch_all($select);
  }
  echo json_encode($array);
}

if($acao == "DesativarAtivar"){
  $id = $_POST['id'];
  $query_select = "SELECT * FROM usuarios WHERE USUARIO_ID = '$id'";
  $select = mysqli_query($connect,$query_select);
  $usuario = mysqli_fetch_object($select);
  if($usuario->ATIVO == "S"){
    $ativo = "N";
  }else{
    $ativo = "S";
  }

  $query = "UPDATE usuarios SET ATIVO = '$ativo' WHERE USUARIO_ID = $id";
  $update = mysqli_query($connect,$query);
  if($update){
    $menssagem="<script language='javascript' type='text/javascript'>
    alert('Desativado com sucesso!');window.location.
    href='pesquisa_usuarios.html'</script>";
  }else{
    $menssagem="<script language='javascript' type='text/javascript'>
    alert('Não foi possível desativar esse usuário');window.location
    .href='pesquisa_usuarios.html'</script>";
  }
  echo json_encode($menssagem);
}
?>