<?php

 	#CONEXÃO 
 	require_once 'db_connect.php';
 	#INICIAR SESSÃO 
 	session_start();

 	#PEGAS E FILTRA OS INPUTS 
 	$id = mysqli_escape_string($connect, $_GET['id']);

 	$sql = "DELETE FROM aluno WHERE id_aluno = '$id' ";

 	if (mysqli_query($connect, $sql)) {
 		# code...
 		$_SESSION['msg'] = "<h4 style='color:green;'>Aluno Deletado com Sucesso !</h4>";
		header('Location: cadastrar_aluno.php');
 	}else{
 		$_SESSION['msg'] = "<h4 style='color:red;'>Falha na Deleção de Aluno !</h4>";
		header('Location: cadastrar_aluno.php');
 	}