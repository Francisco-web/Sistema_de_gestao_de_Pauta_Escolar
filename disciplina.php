<?php

	#CONEXÃO
	require_once 'db_connect.php';
	#INICIA SESSÃO 
	session_start();


	if (isset($_POST['btn-disciplina'])) {
		
		
		#VALIDA OS INPUTS 
		$disciplina = mysqli_escape_string($connect, $_POST['disciplina']);
        $classe = mysqli_escape_string($connect, $_POST['classe']);
        $curso = mysqli_escape_string($connect, $_POST['curso']);
		#VALIDAÇÃO DOS CAMPOS 

		if (empty($disciplina) or empty($classe) or empty($curso) or empty($curso)){
			
			header('Location: cadastrar_disciplina.php');
			$_SESSION['msg'] = "<h4 style='color:red';> Preencha os respectivos campos</h4>'";
		}else{


			$sql = "INSERT INTO disciplina (id_curso, id_classe, nome_dis ) VALUES ('$curso','$classe','$disciplina')";

				
				
				if (mysqli_query($connect, $sql)) {
				
					$_SESSION['msg'] = "<h4 style='color:green';> Disciplina Cadastrada com Sucesso</h4>'";
					header('Location: cadastrar_disciplina.php');
				}else{
					$_SESSION['msg'] = "<h4 style='color:red';> Falha ao Cadastrar  Disciplina</h4>'";
					header('Location: cadastrar_disciplina.php');
				}
				
			}
			
	}