<?php

// conexão
require_once 'db_connect.php';
#INICIAR SESSÃO 
session_start();

if(isset($_POST['btn-actualizar'])):
$nome_aluno = mysqli_escape_string($connect, $_POST['nome_aluno']);
$num_aluno = mysqli_escape_string($connect, $_POST['num_aluno']);
$area_formacao = mysqli_escape_string($connect, $_POST['area_formacao']);
$num_processo = mysqli_escape_string($connect, $_POST['num_processo']);
$id = mysqli_escape_string($connect, $_POST['id']);
 
 $sql = "UPDATE aluno SET nome_completo ='$nome_aluno', num_aluno ='$num_aluno', area_formacao ='$area_formacao', num_proc ='$num_processo'  WHERE id_aluno = '$id'";

 if(mysqli_query($connect, $sql)):
 	$_SESSION['msg'] = "<h4 style='color:green;'>Aluno Actualizado com Sucesso !</h4>";
  header('Location: cadastrar_aluno.php');
  else:
  	 $_SESSION['msg'] = "<h4 style='color:red;'>Falha na Actualização do Aluno !</h4>";
    header('Location: cadastrar_aluno.php');
    endif;   
  endif;
  ?>