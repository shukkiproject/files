<section>
    <h2>
        Bienvenue sur notre super site de gestion de la base télé
    </h2>

	

    <h2> liste des programmes</h2>
    <table>

        <?php
       

            foreach($default as $progDTO){
                echo "<tr>";
                echo "<td>" . $progDTO->getNomProg() . "</td>";
                echo "<td>" . $progDTO->getDuree() . "</td>";
                echo "<td>" . $progDTO->getNomReal() . "</td>";
                echo "<td>" . $progDTO->getNomChaine() . "</td>";
                echo "<td>" . $progDTO->getHeure() . "</td>";
                
                echo "</tr>";
            }

        ?>

    </table>
</section>