<?php
// Conexão
require_once 'db_connect.php';
// Iniciar Sessão
session_start();

// verificar se o utilizador está logado
if(!isset($_SESSION['logado'])):
  header('Location: login.php');
endif;

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
  <meta name="author" content="GeeksLabs">
  <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
  <link rel="shortcut icon" href="img/favicon.png">

  <title>Criar Mini-pauta</title>

  <!-- Bootstrap CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- bootstrap theme -->
  <link href="css/bootstrap-theme.css" rel="stylesheet">
  <!--external css-->
  <!-- font icon -->
  <link href="css/elegant-icons-style.css" rel="stylesheet" />
  <link href="css/font-awesome.min.css" rel="stylesheet" />
  <!-- Custom styles -->
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet" />
  

  
</head>

<body>
  <!-- container section start -->
  <section id="container" class="">

    <!--Início Do Cabeçalho-->

    <header class="header dark-bg">
      <div class="toggle-nav">
        <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom"><i class="icon_menu"></i></div>
      </div>

      <!--Início De Logo-->
      <a href="index.html" class="logo"><span class="profile-ava"><img src="img/65470402_2454225084641587_1105609837091225600_n.jpg" width="50"></span>AGP <span class="lite">IMPAL</span></a>
      <!--logo end-->

      <div class="nav search-row" id="top_menu">
        <!--  Início De Pesquisa  -->
       
        <!--  Fim de Pesquisa -->
      </div>

      <div class="top-nav notification-row">
        <!-- notificatoin dropdown start-->
        <ul class="nav pull-right top-menu">

          <!-- task notificatoin start -->
          
          <!-- alert notification end-->
          <!-- user login dropdown start-->
          <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                             <i class="fa fa-user"></i>
                            <span class="username"><?php echo $_SESSION['nome_utilizador']; ?></span>
                            <b class="caret"></b>
                        </a>
            <ul class="dropdown-menu extended logout">
              <div class="log-arrow-up"></div>
              
              <li>
                <a href="login.php"><i class="icon_key_alt"></i> Sair</a>
              </li>
              
            </ul>
          </li>
          <!-- user login dropdown end -->
        </ul>
        
      </div>
    </header>
    <!--Fim De Cabeçalho-->

    <!--Início Da Barra Lateral-->
    <aside>
      <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu">
          <li class="active">
            <a class="" href="pagina_professor.php">
                          <i class="icon_house_alt"></i>
                          <span>Página inicial</span>
                      </a>
          </li>

          <li class="sub-menu">
            <a href="javascript:;" class="">
                          <i class="icon_document_alt"></i>
                          <span>Pauta</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
            <ul class="sub">
              <li><a class="" href="criar_mini_pauta.php">Lançar Nota</a></li>
            </ul>
          </li>
         

         

          

        </ul>
        <!-- sidebar menu end-->
      </div>
    </aside>
    <!--Fim Da Barra Lateral-->

    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12">

            <?php
            
            $_SESSION['id_disciplina'];

            $sql = "SELECT * FROM disciplina WHERE id_disciplina = $_SESSION[id_disciplina] ";
            $resultado = mysqli_query($connect, $sql);
            $dados = mysqli_fetch_array($resultado);
  
            ?>

            <h3 style='color:black' class="page-header"><i class="fa fa-th"></i>Lançar Nota de <?php echo $dados['nome_dis'] ?></h3>
            <?php 
          if(isset($_SESSION['msg'])){
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
          }

        ?>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="index.php">Home</a></li>
              <li><i class="icon_document_alt"></i>Pauta</li>
              <li><i class="fa fa-th"></i>Lançar Nota</li>
            </ol>
          </div>
        </div>

        <header class="panel-heading">
                Preencha o formulário abaixo
              </header>


          <?php 

            if (isset($_GET['idaluno'])) {
              $id_aluno = $_GET['idaluno'];

              $sql = "SELECT * FROM aluno WHERE id_aluno = $id_aluno";
              $resultado = mysqli_query($connect, $sql);
              $dados = mysqli_fetch_array($resultado);

              echo "<h3 style='color:black'>Nome do Aluno: $dados[nome_completo]</h3>";
            }

          ?>    
              

            

          <form method="POST" action="nota.php">
           <div class="row">
              <div class="col-md-6">
                  <div class="form-group">
                    <label>MT1</label>
                    <input type="text" name="mt1"  class="form-control" />
                    
                  </div>

                <div class="form-group">
                  <label>MT2</label>
                  <input type="text" name="mt2" class="form-control" />                
                </div>
                
              </div>

              <div class="col-md-6">
                  <div class="form-group">
                <label>Turma</label>
               <select name="id_pauta" class="form-control">
               <option>Selecione</option>

               <!-- BLOCO - PHP -->
               <?php 
                  $sql = "SELECT p.id_pauta, p.id_turma,t.nome_turma FROM pauta p INNER JOIN turma t
       on p.id_turma = t.id_turma ";

                  $resultado = mysqli_query($connect, $sql);
                  while($dados = mysqli_fetch_array($resultado)){

                  ?>
                  <option value="<?php echo $dados['id_pauta']; ?>"><?php echo $dados['nome_turma']; ?></option>
                  <!-- FECHA O CICLO -->
                <?php } ?>
               </select>
             </div>
              </div>

                <div class="col-md-6">
                  <div class="form-group">
                <label>Aluno</label>
               <select name="aluno" class="form-control">
               <option>Selecione</option>

               <!-- BLOCO - PHP -->
               <?php 
                  $sql = "SELECT * FROM aluno";
                  $resultado = mysqli_query($connect, $sql);
                  while($dados = mysqli_fetch_array($resultado)){

                  ?>
                  <option value="<?php echo $dados['id_aluno']; ?>"><?php echo $dados['nome_completo']; ?></option>
                  <!-- FECHA O CICLO -->
                <?php } ?>
               </select>
             </div>
              </div>

              <div class="col-md-6">
                  <div class="form-group">
                <label>Professor</label>
               <select name="id_professor" class="form-control">
               <option>Selecione</option>

               <!-- BLOCO - PHP -->
               <?php 
                  $sql = "SELECT p.id_professor, 
                    p.id_disciplina, p.id_utilizador,
                    u.nome_utilizador FROM professor p INNER JOIN utilizador u
                    ON p.id_utilizador = u.id_utilizador";

                  $resultado = mysqli_query($connect, $sql);
                  while($dados = mysqli_fetch_array($resultado)){

                  ?>
                  <option value="<?php echo $dados['id_professor']; ?>"><?php echo $dados['nome_utilizador']; ?></option>
                  <!-- FECHA O CICLO -->
                <?php } ?>
               </select>
             </div>
              </div>

               <div class="col-md-6">
                  <div class="form-group">
                <label>Disciplina</label>
               <select name="id_disciplina" class="form-control">
               <option>Selecione</option>

               <!-- BLOCO - PHP -->
               <?php 
                  $sql = "SELECT * FROM disciplina";
                  $resultado = mysqli_query($connect, $sql);
                  while($dados = mysqli_fetch_array($resultado)){

                  ?>
                  <option value="<?php echo $dados['id_disciplina']; ?>"><?php echo $dados['nome_dis']; ?></option>
                  <!-- FECHA O CICLO -->
                <?php } ?>
               </select>
             </div>
              </div>
              </div>
              </div>
              
              <button type="submit" name="btn-nota" class="btn btn-primary"><i class="fa fa-save"></i> Cadastrar</button> 
            
            </form> </br>


    <!--main content end-->
    <div class="text-right">
      <div class="credits">
          
        </div>
    </div>
  </section>
  <!-- container section end -->
  <?php include_once 'includes/rodape.php'; ?>