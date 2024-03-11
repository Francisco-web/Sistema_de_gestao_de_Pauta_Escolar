<?php

 	#CONEXÃO 
 	require_once 'db_connect.php';
 	#INICIAR SESSÃO 
 	session_start();

 	#PEGAS E FILTRA OS UNPUTS 
 	$nivel_classe = mysqli_escape_string($connect, $_POST['nivel_classe']);
 	$id = mysqli_escape_string($connect, $_GET['id']);

 	$sql = "DELETE FROM classe WHERE id_classe = '$id' ";

 	if (mysqli_query($connect, $sql)) {
 		# code...
 		$_SESSION['msg'] = "<h4 style='color:green;'>Classe Deletado com Sucesso !</h4>";
		header('Location: cadastrar_classe.php');
 	}else{
 		$_SESSION['msg'] = "<h4 style='color:red;'>Falha na Deleção de Classe !</h4>";
		header('Location: cadastrar_classe.php');
 	}