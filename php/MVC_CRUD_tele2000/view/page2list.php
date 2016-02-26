<section class="col-md-9">
	<h2>Liste des chaînes</h2>
	<table class="table">
	<?php foreach ($chaines as $chaine): ?>

		<tr><td><a href="index.php?page=3&update=<?= $chaine->chaine_id ?>" title="modifier" ><?= $chaine->nom_chaine ?></a></td>
		<td><?= $chaine->adresse ?></td>
		<td><?= $chaine->code_postal ?></td>
		<td><?= $chaine->ville ?></td>
		<td><?= $chaine->telephone ?></td>
		<td><?= $chaine->fax ?></td>
		<td><?= $chaine->payante ?></td>
		<td><a href="index.php?page=2&supp=<?= $chaine->chaine_id ?>" ><i class='fa fa-trash'></i></a></td>
		</tr>
	<?php endforeach ?>
	</table>

	<?php include("form.php"); ?>
</section>
