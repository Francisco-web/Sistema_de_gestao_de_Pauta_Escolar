<?php

	#CONEXÃO
	require_once 'db_connect.php';
	#INICIA SESSÃO 
	session_start();


	if (isset($_POST['btn-classe'])) {
		
		
		#VALIDA OS INPUTS 
		$nivel_classe = mysqli_escape_string($connect, $_POST['nivel_classe']);

		#VALIDAÇÃO DOS CAMPOS 

		if (empty($nivel_classe)){
			
			header('Location: cadastrar_classe.php');
			$_SESSION['msg'] = "<h4 style='color:red';> Preencha o respectivo campo</h4>'";
		}else{


			$sql = "INSERT INTO classe (nome_classe) VALUES ('$nivel_classe')";

				
				
				if (mysqli_query($connect, $sql)) {
				
					$_SESSION['msg'] = "<h4 style='color:green';> Classe Cadastrada com Sucesso</h4>'";
					header('Location: cadastrar_classe.php');
				}else{
					$_SESSION['msg'] = "<h4 style='color:red';> Falha ao Cadastrar  Classe</h4>'";
					header('Location: cadastrar_classe.php');
				}
				
			}
			
	}