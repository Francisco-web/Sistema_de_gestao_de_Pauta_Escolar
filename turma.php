<?php

	#CONEXÃO
	require_once 'db_connect.php';
	#INICIA SESSÃO 
	session_start();


	if (isset($_POST['btn-turma'])) {
		
		
		#VALIDA OS INPUTS 
		$nome_turma = mysqli_escape_string($connect, $_POST['nome_turma']);
		$director_turma = mysqli_escape_string($connect, $_POST['director_turma']);
		#VALIDAÇÃO DOS CAMPOS 

		if (empty($nome_turma)){
			
			header('Location: cadastrar_turma.php');
			$_SESSION['msg'] = "<h4 style='color:red';> Preencha os respectivos campos</h4>'";
		}else{


			$sql = "INSERT INTO turma (nome_turma, director_turma) VALUES ('$nome_turma','$director_turma')";

				
				
				if (mysqli_query($connect, $sql)) {
				# code...
					$_SESSION['msg'] = "<h4 style='color:green';> Turma Cadastrada com Sucesso</h4>'";
					header('Location: cadastrar_turma.php');
				}else{
					$_SESSION['msg'] = "<h4 style='color:red';> Falha ao Cadastrar Turma</h4>'";
					header('Location: cadastrar_turma.php');
				}
				
			}
			
	}