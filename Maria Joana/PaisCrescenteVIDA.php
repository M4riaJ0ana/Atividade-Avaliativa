<?php

	include 'lib/app.php';

	function paisCrescenteVIDA() {
        $sql="
        SELECT c.Code, c.Name, c.LifeExpectancy
        FROM country AS c
        WHERE c.LifeExpectancy IS NOT NULL
        ORDER BY c.LifeExpectancy;
        ";

        return executaSelect($sql);

    }
?>

<h1>Ordem Crescente da Expectativa de Vida dos Países</h1>

<table class="table table-striped table-sm table-bordered">
	<thead>
		<tr>
		<th scope="col">Código</th>
		<th scope="col">Nome</th>
		<th scope="col">Expectativa de Vida</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach(paisCrescenteVIDA() as $linha) { ?> 
			<tr>
			<td><?=$linha['Code']?></td>
			<td><?=$linha['Name']?></td>
			<td><?=$linha['LifeExpectancy']?></td>
			</tr>
		<?php } ?>
	</tbody>
</table>
