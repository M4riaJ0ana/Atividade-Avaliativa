<?php

	include 'lib/app.php';

	function cidadesPorPais($CountryCode) {

		$sql = "
			SELECT c.ID, c.Name, c.District, c.Population
			FROM city as c
			WHERE c.CountryCode = '$CountryCode'
		";

		return executaSelect($sql);
	}

	if(array_key_exists("CountryCode", $_GET))
	{
		$CountryCode = $_GET["CountryCode"];
	}
	else 
	{
		$CountryCode = "BRA";
	}

?>

<h1>Cidades do País <?=$CountryCode?></h1>

<table class="table table-striped table-sm table-bordered">
	<thead>
		<tr>
            <th scope="col">ID</th>
            <th scope="col">Nome</th>
            <th scope="col">Distrito</th>
            <th scope="col">População</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach(cidadesPorPais($CountryCode) as $c) { ?> 
			<tr>
                <td><?=$c['ID']?></td>
                <td><?=$c['Name']?></td>
                <td><?=$c['District']?></td>
                <td><?=$c['Population']?></td>
			</tr>
		<?php } ?>
	</tbody>
</table>
