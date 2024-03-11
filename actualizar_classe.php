<?php

// conexão
require_once 'db_connect.php';
#INICIAR SESSÃO 
session_start();

if(isset($_POST['btn-actualizar'])):
$nivel_classe = mysqli_escape_string($connect, $_POST['nivel_classe']);
$id = mysqli_escape_string($connect, $_POST['id']);
 
 $sql = "UPDATE classe SET nivel_classe ='$nivel_classe' WHERE id_classe = '$id'";

 if(mysqli_query($connect, $sql)):
 	$_SESSION['msg'] = "<h4 style='color:green;'>Classe Actualizado com Sucesso !</h4>";
  header('Location: cadastrar_classe.php');
  else:
  	 $_SESSION['msg'] = "<h4 style='color:red;'>Falha na Actualização da Classe !</h4>";
    header('Location: cadastrar_classe.php');
    endif;   
  endif;
  ?>