<?php

	#CONEXÃO
	require_once 'db_connect.php';
	#INICIA SESSÃO 
	session_start();


	if (isset($_POST['btn-aluno'])) {
		
		
		#VALIDA OS INPUTS 
		$nome_aluno = mysqli_escape_string($connect, $_POST['nome_aluno']);
		$num_aluno = mysqli_escape_string($connect, $_POST['num_aluno']);
        $area_formacao = mysqli_escape_string($connect, $_POST['area_formacao']);
        $num_processo = mysqli_escape_string($connect, $_POST['num_processo']);
        $turma = mysqli_escape_string($connect, $_POST['turma']);
        $curso = mysqli_escape_string($connect, $_POST['curso']);
		#VALIDAÇÃO DOS CAMPOS 

		if (empty($nome_aluno) or empty($num_aluno) or empty($area_formacao) or empty($curso) or empty($num_processo) or empty($turma)){
			
			header('Location: cadastrar_aluno.php');
			$_SESSION['msg'] = "<h4 style='color:red';> Preencha os respectivos campos</h4>'";
		}else{


			$sql = "INSERT INTO aluno (id_curso, id_turma, nome_completo, num_aluno, area_formacao, num_proc ) VALUES ('$curso','$turma','$nome_aluno','$num_aluno','$area_formacao','$num_processo')";

				
				
				if (mysqli_query($connect, $sql)) {
				
					$_SESSION['msg'] = "<h4 style='color:green';> Aluno Cadastrada com Sucesso</h4>'";
					header('Location: cadastrar_aluno.php');
				}else{
					$_SESSION['msg'] = "<h4 style='color:red';> Falha ao Cadastrar  Aluno</h4>'";
					header('Location: cadastrar_aluno.php');
				}
				
			}
			
	}