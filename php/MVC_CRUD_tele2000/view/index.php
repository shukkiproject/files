<!DOCTYPE html>
<html>
<?php include("head.php") ?>

	<body>

		<div class="container">
			<div class="row">
				<h1>Télé2000</h1>
				<?php 

					if (isset($_SESSION['connected']) && $_SESSION['connected']===true){
						include("deconnexion.php");
						include("menu.php");
						include($page);
					} else {
						include("login.php");
					}

				?>

				
			</div>
			
		</div>	

		<?php include("footer.php") ?>
	</body>
</html>