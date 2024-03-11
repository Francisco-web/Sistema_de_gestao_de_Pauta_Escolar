<?php	


include_once('index.php');

	
	$html = '  

	<div class="mrl-auto">
	
	</div>
	<div class="mr-auto">
	<h1 style="text-transform: uppercase; font-size: 30pt;">Relatório de todos candidatos</h1>
	Data: '.date('d-m-Y').'
	</div>

	

<hr>
	


	<div class="table-responsive-md"><table class="table">
	<thead class="thead-light">
		<tr>
        <th scope="col">Nome</th>
        <th scope="col">BI</th>
        <th scope="col">E-mail</th>
        <th scope="col">Telefone</th>
        <th scope="col">Data de nascimento</th>
        <th scope="col">Nacionalidade</th>
		</tr>
	</thead>
	<tbody>';


	


	$relatorio = new Relatorio();
	$relatorio->exeRelatorio('<h1>TESTANDO</h1>');
?>