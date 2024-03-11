<?php

	#CONEXÃO
	require_once 'db_connect.php';
	#INICIA SESSÃO 
	session_start();


	if (isset($_POST['btn-curso'])) {
		
		
		#VALIDA OS INPUTS 
		$nome_curso = mysqli_escape_string($connect, $_POST['nome_curso']);
        $coordenador = mysqli_escape_string($connect, $_POST['coordenador']);
		#VALIDAÇÃO DOS CAMPOS 

		if (empty($nome_curso) or empty($coordenador)){
			
			header('Location: cadastrar_curso.php');
			$_SESSION['msg'] = "<h4 style='color:red';> Preencha o respectivo campo</h4>'";
		}else{


			$sql = "INSERT INTO curso (nome, coordenador) VALUES ('$nome_curso','$coordenador')";

				
				
				if (mysqli_query($connect, $sql)) {
				
					$_SESSION['msg'] = "<h4 style='color:green';> Curso Cadastrada com Sucesso</h4>'";
					header('Location: cadastrar_curso.php');
				}else{
					$_SESSION['msg'] = "<h4 style='color:red';> Falha ao Cadastrar de Curso</h4>'";
					header('Location: cadastrar_curso.php');
				}
				
			}
			
	}