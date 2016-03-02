<section>
    <h1> Info Chaine</h1>

    <form action="index.php?ctrl=chaine&action=modify&id=<?=$chaine->getId()?>" method="post">
        <fieldset>
            <legend>Modifier une chaîne</legend>
            <input type="hidden" name="id" value="<?=$chaine->getId()?>">
            <input type="text" name="nom" value="<?=$chaine->getNom()?>" placeholder="Nom de la chaine"/>
            <input type="text" name="adresse" value="<?=$chaine->getAdresse()?>" placeholder="Adresse"/>
            <input type="text" name="cp" value="<?=$chaine->getCp()?>" placeholder="Code postal"/>
            <input type="text" name="ville" value="<?=$chaine->getVille()?>" placeholder="Ville"/>
            <input type="text" name="tel" value="<?=$chaine->getTel()?>" placeholder="N° de téléphone"/>
            <input type="text" name="fax" value="<?=$chaine->getFax()?>" placeholder="N° de fax"/>
            <fieldset id="minifs">
                <legend>Chaîne cablée?</legend>
                <label for="cable1">Oui</label>
                <input type="radio" name="cable" id="cable1" value="1"
                    <?php if($chaine->getPayant()==1){ echo("checked");} ?>/>
                <label for="cable2">Non</label>
                <input type="radio" name="cable" id="cable2" value="0"
                        <?php if($chaine->getPayant()==0){ echo("checked");}?>/>
            </fieldset>
            <input type="submit" value="Modifier" />
        </fieldset>
    </form>

</section>