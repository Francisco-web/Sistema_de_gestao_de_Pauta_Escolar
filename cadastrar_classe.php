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
  <link rel="stylesheet"  href="_css/form.css">
  <title>Cadastrar Classe</title>

  <!-- Bootstrap CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- bootstrap theme -->
  <link href="css/bootstrap-theme.css" rel="stylesheet">
  <!--external css-->
  <!-- font icon -->
  <link href="css/elegant-icons-style.css" rel="stylesheet" />
  <link href="css/font-awesome.min.css" rel="stylesheet" />
  <link href="css/daterangepicker.css" rel="stylesheet" />
  <link href="css/bootstrap-datepicker.css" rel="stylesheet" />
  <link href="css/bootstrap-colorpicker.css" rel="stylesheet" />
  <!-- date picker -->

  <!-- color picker -->

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

      <div class="top-nav notification-row">
        <!-- notificatoin dropdown start-->
        <ul class="nav pull-right top-menu">

          <!-- task notificatoin start -->
         
          </li>
          <!-- task notificatoin end -->

          <!-- user login dropdown start-->
          <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                             <i class="fa fa-user"></i>
                            <span class="username"><?php echo $_SESSION['nome_utilizador']; ?></span>
                            <b class="caret"></b>
                        </a>
            <ul class="dropdown-menu extended logout">
              <div class="log-arrow-up"></div>
              <li class="eborder-top">
               
              </li>
             
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
            </ul>
          </li>
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
            <h3 class="page-header"><i class="fa fa-file-text-o"></i>Cadastrar Classe</h3>
              <?php 
          if(isset($_SESSION['msg'])){
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
          }

        ?>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="index.php">Home</a></li>
              <li><i class="icon_document_alt"></i>G.Acadêmica<</li>
              <li><i class="fa fa-file-text-o"></i>Classe</li>
            </ol>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12">
            <section class="panel">
              <header class="panel-heading">
                Preencha o formulário abaixo
              </header>
              
          <form action="classe.php" method="POST">
            <div class="row">
              <div class="col-md-6">
                  <div class="form-group">
                    <label>Nível da Classe</label>
                    <input type="text" name="nivel_classe"  class="form-control" />
                    
                  </div>

               
                 <button type="submit" name="btn-classe" class="btn btn-primary"><i class="fa fa-save"></i> Cadastrar</button> 
              </div>  
          </div> </br></br>
           </form>

<table class="table table-striped table-advance table-hover">
                <tbody>
                  <tr>
                     <th>ID</th>
                    <th> Nível da Classe</th>
                    <th><i class="icon_cogs"></i>Acções</th>
                  </tr>
                  <?php
                  $sql = "SELECT * FROM classe";
                  $resultado = mysqli_query($connect, $sql);
                  while($dados = mysqli_fetch_array($resultado)):
                  ?>
                  <tr>
                    <td><?php echo $dados['id_classe']; ?></td>
                    <td><?php echo $dados['nome_classe']; ?></td>
                    <td>
                      <div class="btn-group">
                        <a class="btn btn-primary" href="editar_classe.php?id=<?php echo $dados['id_classe']; ?>"><i class="icon_plus_alt2"></i></a>
                      
                        <a class="btn btn-danger" href="delectar_classe.php?id=<?php echo $dados['id_classe']; ?>"><i class="icon_close_alt2"></i></a>
                      </div>
                    </td>
                  </tr>
                <?php endwhile; ?>
                   </tbody>
              </table>









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

  <!-- jquery ui -->
  <script src="js/jquery-ui-1.9.2.custom.min.js"></script>

  <!--custom checkbox & radio-->
  <script type="text/javascript" src="js/ga.js"></script>
  <!--custom switch-->
  <script src="js/bootstrap-switch.js"></script>
  <!--custom tagsinput-->
  <script src="js/jquery.tagsinput.js"></script>

  <!-- colorpicker -->

  <!-- bootstrap-wysiwyg -->
  <script src="js/jquery.hotkeys.js"></script>
  <script src="js/bootstrap-wysiwyg.js"></script>
  <script src="js/bootstrap-wysiwyg-custom.js"></script>
  <script src="js/moment.js"></script>
  <script src="js/bootstrap-colorpicker.js"></script>
  <script src="js/daterangepicker.js"></script>
  <script src="js/bootstrap-datepicker.js"></script>
  <!-- ck editor -->
  <script type="text/javascript" src="assets/ckeditor/ckeditor.js"></script>
  <!-- custom form component script for this page-->
  <script src="js/form-component.js"></script>
  <!-- custome script for all page -->
  <script src="js/scripts.js"></script>


</body>

</html>
