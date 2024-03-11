<?php

 	#CONEXÃO 
 	require_once 'db_connect.php';
 	#INICIAR SESSÃO 
 	session_start();

 	#PEGAS E FILTRA OS UNPUTS 
 	$disciplina = mysqli_escape_string($connect, $_POST['disciplina']);
 	$id = mysqli_escape_string($connect, $_GET['id']);

 	$sql = "DELETE FROM disciplina WHERE id_disciplina = '$id' ";

 	if (mysqli_query($connect, $sql)) {
 		# code...
 		$_SESSION['msg'] = "<h4 style='color:green;'>Disciplina Deletado com Sucesso !</h4>";
		header('Location: cadastrar_disciplina.php');
 	}else{
 		$_SESSION['msg'] = "<h4 style='color:red;'>Falha na Deleção da Disciplina !</h4>";
		header('Location: cadastrar_disciplina.php');
 	}