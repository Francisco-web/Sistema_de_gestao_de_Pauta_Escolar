<?php	

	//referenciar o DomPDF com namespace
	use Dompdf\Dompdf;

	// include autoloader
	require_once("dompdf/autoload.inc.php");



	class Relatorio {

		public function exeRelatorio() {
			//Criando a Instancia
			
		}
	}



$dompdf = new DOMPDF();


			$dompdf->setPaper('A4', 'landscape');

			// Carrega seu HTML
		#	$dompdf->load_html("<h1>TESTADO</h1>");


			//Renderizar o html
			$dompdf->render();

			//Exibibir a página
			$dompdf->stream(
				"Relatório Todos Utilizadors -".date("d-m-Y"), 
				array(
					"Attachment" => true //Para realizar o download somente alterar para true
				)
			);
	
?>