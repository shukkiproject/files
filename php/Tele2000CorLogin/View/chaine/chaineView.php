<section>

    <h1> liste des chaine</h1>
    <table>

        <?php

            foreach($chaines as $chaineDTO){
                echo "<tr>";
                echo "<td><a href=\"index.php?ctrl=chaine&action=detail&id=".
                    $chaineDTO->getId() ."\" title=\"Afficher le détail\">" .
                    ucfirst($chaineDTO->getNom()) . "</a></td>";
                echo "<td>" . $chaineDTO->getAdresse() . "</td>";
                echo "<td>" . $chaineDTO->getCp() . "</td>";
                echo "<td>" . $chaineDTO->getVille() . "</td>";
                echo "<td><a href=\"index.php?ctrl=chaine&action=del&id=" .
                    $chaineDTO->getId() . "\">X</a></td>";
                echo "</tr>";
            }

        ?>

    </table>


    <form action="index.php?ctrl=chaine&action=add&id=-1" method="post">
        <fieldset>
            <legend>Ajout d'une nouvelle chaîne</legend>
            <input type="text" name="nom" placeholder="Nom de la chaine"/>
            <input type="text" name="adresse" placeholder="Adresse"/>
            <input type="text" name="cp" placeholder="Code postal"/>
            <input type="text" name="ville" placeholder="Ville"/>
            <input type="text" name="tel" placeholder="N° de téléphone"/>
            <input type="text" name="fax" placeholder="N° de fax"/>
            <fieldset id="minifs">
                <legend>Chaîne cablée?</legend>
                <label for="cable1">Oui</label>
                <input type="radio" name="cable" id="cable1" value="1" checked/>
                <label for="cable2">Non</label>
                <input type="radio" name="cable" id="cable2" value="0"/>
            </fieldset>
            <input type="submit" value="Soumettre" />
        </fieldset>
    </form>

</section>