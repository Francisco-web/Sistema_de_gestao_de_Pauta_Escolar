<?php
require_once 'db_connect.php';
// Iniciar Sessão
session_start();


if(isset($_POST['btn-cadastrar'])) {
$nome = mysqli_escape_string($connect, $_POST['nome']);
$email = mysqli_escape_string($connect, $_POST['email']);
$sexo = mysqli_escape_string($connect, $_POST['sexo']);
$bi = mysqli_escape_string($connect, $_POST['bi']);
$telefone = mysqli_escape_string($connect, $_POST['telefone']);
$tipo = mysqli_escape_string($connect, $_POST['tipo']);
$curso = mysqli_escape_string($connect, $_POST['curso']);

$senha = mysqli_escape_string($connect, $_POST['senha']);

if (empty($nome) or empty($email) or empty($sexo) or empty($bi) or empty($telefone) or empty($senha) or empty($tipo)){
			
			$_SESSION['msg'] = "<h4 style='color:red';> Preencha todos os campos</h4>'";
			header('Location: registar_utilizador.php');
		}else{

 $senha = md5($senha);
 $sql = "INSERT INTO utilizador(nome_utilizador, email, sexo, num_bi, telefone, tipo, senha) VALUES('$nome','$email','$sexo','$bi','$telefone','$tipo','$senha')";
 if(mysqli_query($connect, $sql)){
   $_SESSION['msg'] = "<h4 style='color:green;'>Utilizador Cadastrado com Sucesso !</h4>";
  header('Location: registar_utilizador.php');

}

}

}
