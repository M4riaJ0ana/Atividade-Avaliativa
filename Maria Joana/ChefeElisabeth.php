<?php

	include 'lib/app.php';

	function chefeElisabeth() {
        $sql="
        SELECT Code, Name, HeadOfState
        FROM country
        WHERE HeadOfState = 'Elisabeth II';
        ";

        return executaSelect($sql);

    }
?>

<h1>Chefe de Estado é Elisabeth II</h1>

<table class="table table-striped table-sm table-bordered">
	<thead>
		<tr>
		<th scope="col">Código</th>
		<th scope="col">Nome</th>
		<th scope="col">Chefe</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach(chefeElisabeth() as $linha) { ?> 
			<tr>
			<td><?=$linha['Code']?></td>
			<td><?=$linha['Name']?></td>
			<td><?=$linha['HeadOfState']?></td>
			</tr>
		<?php } ?>
	</tbody>
</table>
