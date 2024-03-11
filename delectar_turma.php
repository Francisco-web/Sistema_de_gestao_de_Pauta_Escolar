<?php

 	#CONEXÃO 
 	require_once 'db_connect.php';
 	#INICIAR SESSÃO 
 	session_start();

 	#PEGAS E FILTRA OS UNPUTS 
 	$nome_turma = mysqli_escape_string($connect, $_POST['nome_turma']);
 	$id = mysqli_escape_string($connect, $_GET['id']);

 	$sql = "DELETE FROM turma WHERE id_turma = '$id' ";

 	if (mysqli_query($connect, $sql)) {
 		# code...
 		$_SESSION['msg'] = "<h4 style='color:green;'>Turma Deletado com Sucesso !</h4>";
		header('Location: cadastrar_turma.php');
 	}else{
 		$_SESSION['msg'] = "<h4 style='color:red;'>Falha na Deleção de Turma !</h4>";
		header('Location: cadastrar_turma.php');
 	}