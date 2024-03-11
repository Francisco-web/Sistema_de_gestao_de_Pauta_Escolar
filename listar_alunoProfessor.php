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

  <title>AGP IMPAL</title>

  <!-- Bootstrap CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- bootstrap theme -->
  <link href="css/bootstrap-theme.css" rel="stylesheet">
  <!--external css-->
  <!-- font icon -->
  <link href="css/elegant-icons-style.css" rel="stylesheet" />
  <link href="css/font-awesome.min.css" rel="stylesheet" />
  <!-- full calendar css-->
  <link href="assets/fullcalendar/fullcalendar/bootstrap-fullcalendar.css" rel="stylesheet" />
  <link href="assets/fullcalendar/fullcalendar/fullcalendar.css" rel="stylesheet" />
  <!-- easy pie chart-->
  <link href="assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css" media="screen" />
  <!-- owl carousel -->
  <link rel="stylesheet" href="css/owl.carousel.css" type="text/css">
  <link href="css/jquery-jvectormap-1.2.2.css" rel="stylesheet">
  <!-- Custom styles -->
  <link rel="stylesheet" href="css/fullcalendar.css">
  <link href="css/widgets.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet" />
  <link href="css/xcharts.min.css" rel=" stylesheet">
  <link href="css/jquery-ui-1.10.4.min.css" rel="stylesheet">

</head>

<body>
  <!-- container section start -->
  <section id="container" class="">

    <header class="header dark-bg">
      <div class="toggle-nav">
        <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom"><i class="icon_menu"></i></div>
      </div>

      <!--logo start-->
      <a href="index.html" class="logo"><span class="profile-ava"><img src="img/65470402_2454225084641587_1105609837091225600_n.jpg" width="50"></span>AGP <span class="lite">IMPAL</span></a>

      <!--logo end-->

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
                <a href="logout.php"><i class="icon_key_alt"></i> Sair</a>
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
              <li><a class="" href="listar_turmaProfessor.php">Lançar nota</a></li>
            </ul>
          </li>
        <!-- sidebar menu end-->
      </div>
    </aside>
    <!--sidebar end-->

    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-th"></i>Consultar Pauta</h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="index.php">Home</a></li>
              <li><i class="icon_document_alt"></i>Pauta</li>
              <li><i class="fa fa-th"></i>Consultar Pauta</li>
            </ol>
          </div>
        </div>
        
    <!--main content end-->
    <div class="text-center">
      <div class="credits">
          <table class="table table-striped table-advance table-hover table-bordered" style="font-size: 9pt">
                <thead>
                  <tr>
                    <th class="text-center">#</th>
                    <th>Turma</th>
                  </tr>
              </thead>

              <tbody>


                <?php

                if (isset($_GET["idturma"])) {
                  $id_turma = $_GET["idturma"];
                }

                $sql = "SELECT * FROM aluno WHERE id_turma = $id_turma";
                $resultado = mysqli_query($connect, $sql);


                $contador = 1;
                while ($linha = mysqli_fetch_array($resultado)) {
                  $id_aluno = $linha['id_aluno'];
                  $nome_aluno = $linha['nome_completo'];
                ?>
                  <tr>
                  <td> <?php echo $contador++; ?></td>
                  <td class='text-left'> <a href="criar_mini_pauta.php?idaluno=<?php echo $id_aluno; ?>"><?php echo $nome_aluno; ?></a></td>
                  </tr>

              <?php } ?>
            </tbody>
          </table>    
        </div>
    </div>
  </section>
  <!-- container section end -->

<?php include_once 'includes/rodape.php'; ?>