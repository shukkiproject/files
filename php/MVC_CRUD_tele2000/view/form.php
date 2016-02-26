
<form method="post" accept-charset="utf-8">
	<fieldset>
		<legend><?= $nomForm ?> d'une nouvelle chaîne</legend>
		<input type="hidden" name="id" value="<?= $id ?>" placeholder="">
		<input type="text" name="nom" value="<?= $nom ?>" placeholder="Nom de la chaine" autofocus/>
		<input type="text" name="adr" value="<?= $adr ?>" placeholder="Adresse"/>
		<input type="text" name="postal" value="<?= $postal ?>" placeholder="Code postal"/>
		<input type="text" name="ville" value="<?= $ville ?>" placeholder="Ville"/>
		<input type="text" name="tel" value="<?= $tel ?>" placeholder="No. de téléphone"/>
		<input type="text" name="fax" value="<?= $fax ?>" placeholder="No. de fax"/>
		<fieldset>
			<legend>chaîne cablée?</legend>

			<label >Oui			
			<input type="radio" name="cable" value="1" 
			<?= ($cable=="1")? "checked" : "" ?> />
			</label>
			<label >Non			
			<input type="radio" name="cable" value="0" <?= ($cable=="0")? "checked" : "" ?> />
			</label>
		</fieldset>
		<input type="submit" name="submit" value="Soumettre"/>
	</fieldset>
</form>