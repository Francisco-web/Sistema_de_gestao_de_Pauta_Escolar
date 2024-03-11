<?php
// Conexão
require_once 'db_connect.php';
// Sessão
session_start();

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

  <title>Consultar utilizador</title>

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
    <!--header start-->
    <header class="header dark-bg">
      <div class="toggle-nav">
        <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom"><i class="icon_menu"></i></div>
      </div>

      <!--logo start-->
      <a href="index.html" class="logo"><span class="profile-ava"><img src="img/65470402_2454225084641587_1105609837091225600_n.jpg" width="50"></span>AGP <span class="lite">IMPAL</span></a>
      <!--logo end-->

      <div class="nav search-row" id="top_menu">
        <!--  search form start -->
       
        <!--  search form end -->
      </div>

      <div class="top-nav notification-row">
        <!-- notificatoin dropdown start-->
        <ul class="nav pull-right top-menu">

          
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
        <!-- notificatoin dropdown end-->
      </div>
    </header>
    <!--header end-->

    <!--sidebar start-->
    <aside>
      <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu">
          <li class="active">
            <a class="" href="index.php">
                          <i class="icon_house_alt"></i>
                          <span>Página inicial</span>
                      </a>
          </li>
          <li class="sub-menu">
            <a href="javascript:;" class="">
                          <i class="icon_desktop"></i>
                          <span>Utilizadores</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
            <ul class="sub">
              <li><a class="" href="registar_utilizador.php">Resgistar utilizadores</a></li>
              <li><a class="" href="consultar_utilizador.php">Consultar</a></li>
               
            </ul>
          </li>
<li class="sub-menu">
            <a href="javascript:;" class="">
                          <i class="icon_document_alt"></i>
                          <span>Pauta</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
            <ul class="sub">
              <li><a class="" href="listar_turma.php">Consultar</a></li>
          </li>
            </ul>
          <li class="sub-menu">
            <a href="javascript:;" class="">
                          <i class="icon_document_alt"></i>
                          <span>G.Acadêmica</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
            <ul class="sub">
              <li><a class="" href="cadastrar_turma.php">Turma</a></li>
               <li><a class="" href="cadastrar_curso.php">Curso</a></li>
                <li><a class="" href="cadastrar_classe.php">Classe</a></li>
                 <li><a class="" href="cadastrar_disciplina.php">Disciplina</a></li>
                  <li><a class="" href="cadastrar_aluno.php">Aluno</a></li>
            </ul>
          </li>
          
        </ul>
        <!-- sidebar menu end-->
      </div>
    </aside>
    <!--sidebar end-->

    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-files-o"></i> Consultar utilizadores</h3>
            <?php 
          if(isset($_SESSION['msg'])){
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
          }

        ?>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="index.php">Home</a></li>
              <li><i class="icon_document_alt"></i>Utilizadores</li>
              <li><i class="fa fa-files-o"></i>Consultar utilizadores</li>
            </ol>
          </div>
        </div>
        <!-- Form validations -->
        <div class="row">
          <div class="col-lg-12">
            <section class="panel">
              <header class="panel-heading">
                Todos utilizadores
              </header>

              <table class="table table-striped table-advance table-hover">
                <tbody>
                  <tr>
                     <th>ID</th>
                    <th><i class="icon_profile"></i> Nome completo</th>
                    <th><i class="icon_mail_alt"></i> Email</th>
                    <th>Sexo</th>
                    <th>Número do bi</th>
                    <th><i class="icon_mobile"></i>Telefone</th>
                    <th>Tipo de conta</th>
                    <th><i class="icon_cogs"></i>Edição</th>
                  </tr>
                  <?php
                  $sql = "SELECT * FROM utilizador";
                  $resultado = mysqli_query($connect, $sql);
                  while($dados = mysqli_fetch_array($resultado)):
                  ?>
                  <tr>
                    <td><?php echo $dados['id_utilizador']; ?></td>
                    <td><?php echo $dados['nome_utilizador']; ?></td>
                    <td><?php echo $dados['email']; ?></td>
                    <td><?php echo $dados['sexo']; ?></td>
                    <td><?php echo $dados['num_bi']; ?></td>
                    <td><?php echo $dados['telefone']; ?></td>
                    <td><?php echo $dados['tipo']; ?></td>
                    <td>
                      <div class="btn-group">
                        <a class="btn btn-primary" href="editar_utilizadores.php?id=<?php echo $dados['id_utilizador']; ?>"><i class="icon_plus_alt2"></i></a>
                      
                        <a class="btn btn-danger" href="delectar_utilizadores.php?id=<?php echo $dados['id_utilizador']; ?>"><i class="icon_close_alt2"></i></a>
                      </div>
                    </td>
                  </tr>
                <?php endwhile; ?>
                   </tbody>
              </table>
            </section>
          </div>
        </div>
        <!-- page end-->
      </section>
    </section>
              
    <!--main content end-->
    <div class="text-right">
      <div class="credits">
         
        </div>
    </div>
  </section>
  <!-- container section end -->

  <!-- javascripts -->
  <script src="js/jquery.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <!-- nice scroll -->
  <script src="js/jquery.scrollTo.min.js"></script>
  <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
  <!-- jquery validate js -->
  <script type="text/javascript" src="js/jquery.validate.min.js"></script>

  <!-- custom form validation script for this page-->
  <script src="js/form-validation-script.js"></script>
  <!--custome script for all page-->
  <script src="js/scripts.js"></script>


</body>

</html>
