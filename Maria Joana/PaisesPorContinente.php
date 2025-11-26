<?php

	include 'lib/app.php';

	function paisesPorContinente($Continent) {
		$sql = "
			SELECT c.Name 
			FROM country as c
			WHERE c.Continent = '$Continent'
		";
		return executaSelect($sql);
	}

	if(array_key_exists("Continent", $_GET))
	{
		$Continent = $_GET["Continent"];
	}
	else
	{
		$Continent = "South America";
	}
?>

<h1>Países do continente <?=$Continent?></h1>

<table class="table table-striped table-sm table-bordered">
	<thead>
		<tr>
			<th scope="col">Nome</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach(paisesPorContinente($Continent) as $linha) { ?> 
			<tr>
				<td><?=$linha['Name']?></td>
			</tr>
		<?php } ?>
	</tbody>
</table>
