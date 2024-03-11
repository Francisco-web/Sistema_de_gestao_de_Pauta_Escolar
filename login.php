<?php
  # CONEXÃO Com A Base De Dados
  require_once 'db_connect.php';

  # Inicia Sessão
  session_start();
    

  if (isset($_POST['btn-entrar'])) {
    
    //VALIDAR OS INPUTS
    $email = mysqli_escape_string($connect, $_POST['email']);
    $senha = mysqli_escape_string($connect, $_POST['senha']);

    //VALIDAÇÕES DO INPUTS
    if (empty($email) or empty($senha)) {
      # code...
      $_SESSION['msg'] = " <li style='color: red; list-style: none;'> <i class='fa fa-warning'></i> Campos de Preechimento Obrgatório </li>";
    }else{

        $sql = "SELECT email FROM utilizador WHERE email = '$email' ";
        $resultado = mysqli_query($connect, $sql);
        if (mysqli_num_rows($resultado) > 0) {
            
         #CRIPTOGRÁFIA DA SENHA 
          $senha = md5($senha);

          $sql = "SELECT * FROM utilizador WHERE email = '$email' AND senha = '$senha' ";
          $resultado = mysqli_query($connect, $sql);

          if (mysqli_num_rows($resultado) == 1 ) {
            
            #OBTER OS DADOS E TRANSFORMA NO ARRAY 
            $dados = mysqli_fetch_array($resultado);
            #CRIA SESSÃO
            $_SESSION['id'] = $dados['id_utilizador'];
            $_SESSION['nome_utilizador'] = $dados['nome_utilizador']; 
            $_SESSION['logado'] = true; 

            # VERIFICANDO O TIPO DE UTILIZADOR
            if ($dados['tipo'] == "Administrador") { 
              # code...
              header('Location: index.php');
            }else{
              $sql = "SELECT * FROM professor WHERE id_utilizador = $_SESSION[id]";
              $resultado = mysqli_query($connect, $sql);
              $dados = mysqli_fetch_array($resultado);
              $_SESSION['id_disciplina'] = $dados['id_disciplina'];

              header('Location: pagina_professor.php');
            }

          }else{
             $_SESSION['msg'] = " <li style='color: red; list-style: none;'> Email Ou Senha Errada</li>";
          }

        }else{
           $_SESSION['msg'] = " <li style='color: red; list-style:none;'> Utilizador inexistente</li>";
        }
    }

  }

?>

<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
  <meta name="author" content="GeeksLabs">
  <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
  <link rel="shortcut icon" href="img/favicon.png">

  <title>Login</title>

  <!-- Bootstrap CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- bootstrap theme -->
  <link href="css/bootstrap-theme.css" rel="stylesheet">
  <!--external css-->
  <!-- font icon -->
  <link href="css/elegant-icons-style.css" rel="stylesheet" />
  <link href="css/font-awesome.css" rel="stylesheet" />
  <!-- Custom styles -->
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet" />

  
</head>

<body class="login-img3-body">

  <div class="container">

    <form class="login-form" action="<?php echo $_SERVER['PHP_SELF'];  ?>" method="POST">
      <div class="login-wrap">
        <p class="login-img"><i class="icon_lock_alt"></i></p>
        <div class="input-group">
          <span class="input-group-addon"><i class="icon_profile"></i></span>
          <?php
        if (isset($_SESSION['msg'])) {
          # code...
          echo $_SESSION['msg'];
          unset($_SESSION['msg']);
        }
      ?>
          <input type="email" class="form-control" name="email" placeholder="Digite o seu email " autofocus>
        </div>
        <div class="input-group">
          <span class="input-group-addon"><i class="icon_key_alt"></i></span>
          <input type="password" class="form-control" name="senha" placeholder="Palavra passe">
        </div>
       
        <button class="btn btn-primary btn-lg btn-block" name="btn-entrar" type="submit">ENTRAR</button>
      </div>
    </form>
    <div class="text-right">
      <div class="credits">
          
        </div>
    </div>
  </div>

</body>

</html>
