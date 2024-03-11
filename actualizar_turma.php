<?php

// conexão
require_once 'db_connect.php';
#INICIAR SESSÃO 
session_start();

if(isset($_POST['btn-actualizar'])):
$nome_turma = mysqli_escape_string($connect, $_POST['nome_turma']);
$director_turma = mysqli_escape_string($connect, $_POST['director_turma']);
$id = mysqli_escape_string($connect, $_POST['id']);
 
 $sql = "UPDATE turma SET nome_turma ='$nome_turma', director_turma ='$director_turma' WHERE id_turma = '$id'";

 if(mysqli_query($connect, $sql)):
 	$_SESSION['msg'] = "<h4 style='color:green;'>Turma Actualizado com Sucesso !</h4>";
  header('Location: cadastrar_turma.php');
  else:
  	 $_SESSION['msg'] = "<h4 style='color:red;'>Falha na Actualização de turma !</h4>";
    header('Location: cadastrar_turma.php');
    endif;   
  endif;
  ?>