<?php

	include 'lib/app.php';

	function paisOrdemAlfabetica() {
        $sql="
        SELECT c.Code, c.Name
        FROM country AS c
        ORDER BY Name;
        ";

        return executaSelect($sql);

    }
?>

<h1>Nome dos Países por Ordem Alfabética</h1>

<table class="table table-striped table-sm table-bordered">
	<thead>
		<tr>
		<th scope="col">Código</th>
		<th scope="col">Nome</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach(paisOrdemAlfabetica() as $linha) { ?> 
			<tr>
			<td><?=$linha['Code']?></td>
			<td><?=$linha['Name']?></td>
			</tr>
		<?php } ?>
	</tbody>
</table>
