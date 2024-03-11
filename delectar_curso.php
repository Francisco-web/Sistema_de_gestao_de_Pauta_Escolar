<?php

 	#CONEXÃO 
 	require_once 'db_connect.php';
 	#INICIAR SESSÃO 
 	session_start();

 	#PEGAS E FILTRA OS UNPUTS 
 	$nome_curso = mysqli_escape_string($connect, $_POST['nome_curso']);
 	$id = mysqli_escape_string($connect, $_GET['id']);

 	$sql = "DELETE FROM curso WHERE id_curso = '$id' ";

 	if (mysqli_query($connect, $sql)) {
 		# code...
 		$_SESSION['msg'] = "<h4 style='color:green;'>Curso Deletado com Sucesso !</h4>";
		header('Location: cadastrar_curso.php');
 	}else{
 		$_SESSION['msg'] = "<h4 style='color:red;'>Falha na Deleção de Curso !</h4>";
		header('Location: cadastrar_curso.php');
 	}