<?php

	include 'lib/app.php';

	function paisDecrescentePIB() {
        $sql="
        SELECT c.Code, c.Name, c.GNP
        FROM country AS c
        ORDER BY c.GNP DESC;
        ";

        return executaSelect($sql);

    }
?>

<h1h>Ordem Decrescente de GNP (PIB) dos Países </h1>

<table class="table table-striped table-sm table-bordered">
	<thead>
		<tr>
		<th scope="col">Código</th>
		<th scope="col">Nome</th>
		<th scope="col">GNP (PIB)</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach(paisDecrescentePIB() as $linha) { ?> 
			<tr>
			<td><?=$linha['Code']?></td>
			<td><?=$linha['Name']?></td>
			<td><?=$linha['GNP']?></td>
			</tr>
		<?php } ?>
	</tbody>
</table>
