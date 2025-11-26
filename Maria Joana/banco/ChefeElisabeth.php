<?php

	include 'lib/app.php';

	function chefeElisabeth() {
        $sql="
        SELECT Code, Name, HeadOfState
        FROM contry
        WHERE HeadOfState = 'Elisabeth II';
        ";

        return executaSelect($sql);

    }
?>

<h1>Chefe de Estado é Elisabeth II</h1>

<table class="table table-striped table-sm table-bordered">
	<thead>
		<tr>
			<th scope="col">Nome</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach(chefeElisabeth() as $linha) { ?> 
			<tr>
				<td><?=$linha['Name']?></td>
			</tr>
		<?php } ?>
	</tbody>
</table>
