<!doctype html>
<html lang="fr">
	<head>
	  <meta charset="utf-8">
	  <title>Products admin</title>
	</head>
	<body>
		<?php
			//include(__DIR__."../includes/products-form.php");
			//$test = new product;
		?>


	  	<p>
		    Cette page d'administration est minimaliste.<br />
		    Veuillez saisir un nouveau produit :
		</p>

		<form enctype="multipart/form-data" action="../includes/products-form.php" method="post">
		<p>
		    name<input type="text" name="name" />
		    description<input type="text" name="description" />
		    price<input type="number" name="price" />
		    image<input type="file" name="image">
		    <input type="submit" value="Valider" />
		</p>
		</form>
		</body>
</html>

