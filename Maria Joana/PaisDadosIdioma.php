<?php

	include 'lib/app.php';

	function paisDadosIdioma() {
        $sql="
        SELECT p.Code, p.Name, l.Language
        FROM country AS p, countrylanguage AS l
        WHERE l.CountryCode = p.Code AND l.IsOfficial = 'T';
        ";

        return executaSelect($sql);

    }
?>

<h1>Dados e Idioma dos Países</h1>

<table class="table table-striped table-sm table-bordered">
	<thead>
		<tr>
		<th scope="col">Código</th>
		<th scope="col">Nome</th>
		<th scope="col">Idioma</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach(paisDadosIdioma() as $linha) { ?> 
			<tr>
			<td><?=$linha['Code']?></td>
			<td><?=$linha['Name']?></td>
			<td><?=$linha['Language']?></td>
			</tr>
		<?php } ?>
	</tbody>
</table>
