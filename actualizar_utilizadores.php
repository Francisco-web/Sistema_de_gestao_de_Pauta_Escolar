<?php

// conexão
require_once 'db_connect.php';
#INICIAR SESSÃO 
session_start();

if(isset($_POST['btn-actualizar'])):
$nome_completo = mysqli_escape_string($connect, $_POST['nome']);
$email = mysqli_escape_string($connect, $_POST['email']);
$num_bi = mysqli_escape_string($connect, $_POST['bi']);
$sexo = mysqli_escape_string($connect, $_POST['sexo']);
$senha = mysqli_escape_string($connect, $_POST['senha']);
$telefone = mysqli_escape_string($connect, $_POST['telefone']);
$tipo = mysqli_escape_string($connect, $_POST['tipo']);
$id = mysqli_escape_string($connect, $_POST['id']);
 $senha = md5($senha);
 $sql = "UPDATE utilizador SET nome_completo ='$nome_completo', email ='$email', sexo ='$sexo', num_bi ='$num_bi', telefone ='$telefone', tipo ='$tipo', senha ='$senha' WHERE id_utilizador = '$id'";

 if(mysqli_query($connect, $sql)):
 	$_SESSION['msg'] = "<h4 style='color:green;'>utilizador Actualizado com Sucesso !</h4>";
  header('Location: consultar_utilizador.php');
  else:
  	 $_SESSION['msg'] = "<h4 style='color:red;'>Falha na Actualização do utilizador !</h4>";
    header('Location: consultar_utilizador.php');
    endif;   
  endif;
  ?>