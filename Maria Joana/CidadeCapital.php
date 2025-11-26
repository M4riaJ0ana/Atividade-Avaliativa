<?php

	include 'lib/app.php';

	function cidadeCapital() {
        $sql="
        SELECT p.Code, p.Name, c.Name AS Capital
        FROM country AS p, city AS c
        WHERE p.Capital = c.ID;
        ";

        return executaSelect($sql);

    }
?>

<h1>Capitais dos Países</h1>

<table class="table table-striped table-sm table-bordered">
	<thead>
		<tr>
		<th scope="col">Código</th>
		<th scope="col">País</th>
		<th scope="col">Capital</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach(cidadeCapital() as $linha) { ?> 
			<tr>
			<td><?=$linha['Code']?></td>
			<td><?=$linha['Name']?></td>
			<td><?=$linha['Capital']?></td>
			</tr>
		<?php } ?>
	</tbody>
</table>
