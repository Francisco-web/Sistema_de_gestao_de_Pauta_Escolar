<?php 
include_once 'includes/cabecalho.php';
include_once 'includes/menu.php';
include_once 'includes/menu_lateral.php';
 ?>

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

                $sql = "SELECT * FROM turma";
                $resultado = mysqli_query($connect, $sql);


                $contador = 1;
                while ($linha = mysqli_fetch_array($resultado)) {
                  $id_turma = $linha['id_turma'];
                  $nome_turma = $linha['nome_turma'];
                ?>
                  <tr>
                  <td> <?php echo $contador++; ?></td>
                  <td class='text-left'> <a href="consultar_pauta.php?id=<?php echo $id_turma; ?>"><?php echo $nome_turma; ?></a></td>
                  </tr>

              <?php } ?>
            </tbody>
          </table>    
        </div>
    </div>
  </section>
  <!-- container section end -->

<?php include_once 'includes/rodape.php'; ?>