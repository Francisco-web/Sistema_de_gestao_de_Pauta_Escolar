<?php

 	#CONEXÃO 
 	require_once 'db_connect.php';
 	#INICIAR SESSÃO 
 	session_start();

 	#PEGAS E FILTRA OS UNPUTS 
 	$nome_completo = mysqli_escape_string($connect, $_POST['nome']);
$email = mysqli_escape_string($connect, $_POST['email']);
$num_bi = mysqli_escape_string($connect, $_POST['bi']);
$sexo = mysqli_escape_string($connect, $_POST['sexo']);
$senha = mysqli_escape_string($connect, $_POST['senha']);
$telefone = mysqli_escape_string($connect, $_POST['telefone']);
$tipo = mysqli_escape_string($connect, $_POST['tipo']);
 	$id = mysqli_escape_string($connect, $_GET['id']);

 	$sql = "DELETE FROM utilizador WHERE id_utilizador = '$id' ";

 	if (mysqli_query($connect, $sql)) {
 		# code...
 		$_SESSION['msg'] = "<h4 style='color:green;'>Utilizador Deletado com Sucesso !</h4>";
		header('Location: consultar_utilizador.php');
 	}else{
 		$_SESSION['msg'] = "<h4 style='color:red;'>Falha na Deleção do utilizador !</h4>";
		header('Location: consultar_utilizador.php');
 	}