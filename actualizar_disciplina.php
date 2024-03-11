<?php

// conexão
require_once 'db_connect.php';
#INICIAR SESSÃO 
session_start();

if(isset($_POST['btn-actualizar'])):
$disciplina = mysqli_escape_string($connect, $_POST['disciplina']);
$id = mysqli_escape_string($connect, $_POST['id']);
 
 $sql = "UPDATE disciplina SET nome_dis ='$disciplina' WHERE id_disciplina = '$id'";

 if(mysqli_query($connect, $sql)):
 	$_SESSION['msg'] = "<h4 style='color:green;'>Disciplina Actualizado com Sucesso !</h4>";
  header('Location: cadastrar_disciplina.php');
  else:
  	 $_SESSION['msg'] = "<h4 style='color:red;'>Falha na Actualização da Disciplina !</h4>";
    header('Location: cadastrar_disciplina.php');
    endif;   
  endif;
  ?>