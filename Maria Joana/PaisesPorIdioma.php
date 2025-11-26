<?php

	include 'lib/app.php';

	function idiomas() {
		$sql = "
			SELECT DISTINCT Language 
			FROM countrylanguage 
			ORDER BY Language
		";

		return executaSelect($sql);
	}

	function paisesPorIdioma($Language) {
		$sql = "
			SELECT 
				c.Name, c.Continent, cl.IsOfficial, cl.Percentage
			FROM 
				country as c,  
				countrylanguage as cl
			WHERE
				c.Code = cl.CountryCode and
				cl.Language = '$Language'
		";

		return executaSelect($sql);
	}

	function menuIdiomas($selectedLanguage)
	{
		echo "<select id='selecaoIdioma'>";
		echo "<option>Selecione um valor</option>";
		foreach(idiomas() as $linha) 
		{
			$Language = $linha['Language'];
			if($Language == $selectedLanguage)
			{
				echo "<option selected='selected'>$Language</option>";
			}
			else
			{
				echo "<option>$Language</option>";
			}
		}
		echo "</select>";
	}

	if(array_key_exists("Language", $_GET))
	{
		$Language = $_GET["Language"];
	}
	else
	{
		$Language = "Portuguese";
	}

	$total = 0;
?>

<h1>Países que falam <?=$Language?></h1>

<p>Escolha o idioma: <?= menuIdiomas($Language) ?></p>

<script>
	document.getElementById('selecaoIdioma').addEventListener('change', function() {
		location.href="PaisesPorIdioma.php?Language="+this.value;
	});
</script>

<table class="table table-striped table-sm table-bordered">
	<thead>
		<tr>
			<th scope="col">Nome</th>
			<th scope="col">Continente</th>
			<th scope="col">Oficial</th>
			<th scope="col">Percentual</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach(paisesPorIdioma($Language) as $linha) { $total++; ?> 
			<tr>
				<td><?=$linha['Name']?></td>
				<td><a href="PaisesPorContinente.php?Continent=<?=$linha['Continent']?>"><?=$linha['Continent']?></a></td>
				<td><?=$linha['IsOfficial']?></td>
				<td><?=$linha['Percentage']?></td>
			</tr>
		<?php } /*foreach*/ ?>
	</tbody>
</table>

<p>Total de Países: <?=$total?></p>
