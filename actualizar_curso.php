<?php

// conexão
require_once 'db_connect.php';
#INICIAR SESSÃO 
session_start();

if(isset($_POST['btn-actualizar'])):
$nome_curso = mysqli_escape_string($connect, $_POST['nome_curso']);
$coordenador = mysqli_escape_string($connect, $_POST['coordenador']);
$id = mysqli_escape_string($connect, $_POST['id']);
 
 $sql = "UPDATE curso SET nome ='$nome_curso', coordenador ='$coordenador' WHERE id_curso = '$id'";

 if(mysqli_query($connect, $sql)):
 	$_SESSION['msg'] = "<h4 style='color:green;'>Curso Actualizado com Sucesso !</h4>";
  header('Location: cadastrar_curso.php');
  else:
  	 $_SESSION['msg'] = "<h4 style='color:red;'>Falha na Actualização de Curso !</h4>";
    header('Location: cadastrar_curso.php');
    endif;   
  endif;
  ?>