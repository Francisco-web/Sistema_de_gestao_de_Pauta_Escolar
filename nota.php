<?php
   
   #CONEXÃO
	require_once 'db_connect.php';
	#INICIA SESSÃO 
	session_start();

	if (isset($_POST['btn-nota'])) {
		
		
		#VALIDA OS INPUTS 
		$mt1 = mysqli_escape_string($connect, $_POST['mt1']);

		$mt2 = mysqli_escape_string($connect, $_POST['mt2']);

		$id_pauta = mysqli_escape_string($connect, $_POST['id_pauta']);

		$id_aluno = mysqli_escape_string($connect, $_POST['aluno']);

		$id_professor = mysqli_escape_string($connect, $_POST['id_professor']);

		$id_disciplina = mysqli_escape_string($connect, $_POST['id_disciplina']);
	
		
		if (empty($mt1)  ){
			
			header('Location: criar_mini_pauta.php');
			$_SESSION['msg'] = "<h4 style='color:red';> Preencha os respectivos campos</h4>'";
		}else{


			$sql = "INSERT INTO nota (id_pauta, id_aluno, id_professor, id_disciplina, MT1, MT2 ) VALUES ('$id_pauta','$id_aluno','$id_professor','$id_disciplina','$mt1','$mt2')";

				
				
				if (mysqli_query($connect, $sql)) {
				
					$_SESSION['msg'] = "<h4 style='color:green';> Nota Lançada com Sucesso</h4>'";
					header('Location: criar_mini_pauta.php');
				}else{
					$_SESSION['msg'] = "<h4 style='color:red';> Não Foi Possível Lançar a Nota</h4>'";
					header('Location: criar_mini_pauta.php');
				}
				
			}
			
	}