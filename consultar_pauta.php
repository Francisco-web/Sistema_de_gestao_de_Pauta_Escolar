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
          <table class="table table-striped table-advance table-hover">
                <tbody>
                  <tr>
                     <th>Nº</th>
                    <th> Nome completo</th>
                    <th> Nº Proc</th>
                    <th>Disciplina</th>
                    <th>MT1</th>
                    <th>MT2</th>
                    <th>Ano Lectivo</th>
                    <th>Resultado</th>
                    <th>Imprimir</th>
                  </tr>
                  <?php 

                if (isset($_GET["id"])) {
                    $id = $_GET["id"];
                }

                $sql = "SELECT n.id_nota, n.id_pauta,n.id_aluno, n.id_professor, n.id_disciplina, a.num_aluno,a.nome_completo,a.num_proc,p.ano_lectivo, n.mt1, n.mt2, d.nome_dis, p.resultado FROM nota n INNER JOIN aluno a
       on n.id_aluno = a.id_aluno JOIN pauta p on n.id_pauta = p.id_pauta JOIN disciplina d on n.id_disciplina = d.id_disciplina WHERE p.id_turma = $id";

                
                $contador = 1;
                $resultado = mysqli_query($connect, $sql);
                  while($dados = mysqli_fetch_array($resultado)){
                    $nota1 = $dados['mt1'];
                    $nota2 = $dados['mt2'];

                    $media = (int)$nota1 + (int)$nota2;
                    $media = $media / 2; 
                  ?>


                  <tr>
                    <td><?php echo $dados['num_aluno']; ?></td>
                    <td><?php echo $dados['nome_completo']; ?></td>
                    <td><?php echo $dados['num_proc']; ?></td>
                    <td><?php echo $dados['nome_dis']; ?></td>
                    <td><?php echo $dados['mt1']; ?></td>
                    <td><?php echo $dados['mt2']; ?></td>
                    <td><?php echo $dados['ano_lectivo']; ?></td>
                    <td><?php echo $media >= 10 ? "Aprovado/a ($media)" : "Reprovado/a ($media)"; ?></td>
                    <td>
                      <div class="btn-group">
                        <a class="btn btn-success" href="imprimir_pauta.php?id=<?php echo $dados['id_nota'];?>"><i class="icon_check_alt2"></i></a>
                        
                      </div>
                    </td>
                  </tr>
                <?php } ?>
                   </tbody>
              </table>
        </div>
    </div>
  </section>
  <!-- container section end -->


<?php include_once 'includes/rodape.php'; ?>