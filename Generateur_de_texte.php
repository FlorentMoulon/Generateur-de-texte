<!doctype html>

<html>
	<head>
		<meta charset="utf-8" />
		<title> Générateur de texte </title>
		<link rel="stylesheet" type="text/css" href="style.css" />
		<link rel="icon" type="image/png" href="favicon.png">
		<?php
			require_once 'fonctions.php';
		?>
	</head>


	<body>

		<header>

    	<h1> Générateur de texte </h1>

		</header>


		<section>
			
			<form class=calculatrice name="nom" method="post">

				<textarea name="src" placeholder="Texte source . . ." value=""></textarea>
				nombre de phrase :<input type="text" name="nbPhrase" id="nbPhrase" placeholder="entrez un nombre" maxlength="3" required /><br>
				<input type="submit" name="generer" id="generer" value="generer"/>

			</form>

		</section>


		<div class=resultat>
			<?php
				if(isset($_POST['generer'])){
					if(isset($_POST['src']) && isset($_POST['nbPhrase'])){

						file_put_contents("txtSrc.txt", $_POST['src']);

						adapteTxt();

						for($i=0; $i<$_POST['nbPhrase']; $i++){
							echo genere()."<br>";
						}

						echo"<br><br>";
						echo "txt generer ! <br>";
					}else{
						echo "veuillez entrer un texte source et un nombre de phrase. <br>";
					}

				}
			?>
		</div><br>


	</body>
</html>
