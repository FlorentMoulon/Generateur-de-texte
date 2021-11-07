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

		<nav>
			<div class="onglet">
				<h3>F-BackPack</h3>
			</div>

			<a href="index.php"><div class="onglet">
				Générateur de Texte
			</div><a/>

			<a href="WorkInProgress.html"><div class="onglet">
				Générateur de Mot
			</div></a>

			<a href="WorkInProgress.html"><div class="onglet">
				Générateur d'Acronyme
			</div></a>
			<div class="onglet"></div><div class="onglet"></div>
		</nav>


		<form name="nom" method="post">

		<section class="txtSrc">
	    	<h1> Générateur de texte </h1>

			<div class="main">
				<?php
					if(isset($_POST['generer'])){
						if($_POST['generer'] != "txtSrc"){

							echo "<textarea name=\"src\" value=\"\">Auteur : ".$_POST['generer']."</textarea>";
							echo "<div class=resultat>";


							for($i=0; $i<$_POST['nbPhrase']; $i++){
									echo genereAuteur($_POST['generer'])."<br>";
								}
							}else{
								echo "<textarea name=\"src\" placeholder=\"Texte source . . .\" value=\"\"></textarea>";
								echo "<div class=resultat>";

								if(isset($_POST['src']) && isset($_POST['nbPhrase'])){

									file_put_contents("txtSrc.txt", $_POST['src']);
									adapteTxt();

									for($i=0; $i<$_POST['nbPhrase']; $i++){
										echo genere()."<br>";
									}
								}else{
									echo "veuillez entrer un texte source et un nombre de phrase. <br>";
								}
							}
						}else{
							echo "<textarea name=\"src\" placeholder=\"Texte source . . .\" value=\"\"></textarea>";
							echo "<div class=resultat>";
						}
				?>
				</div>

			</div>

			<div class="bout"><div class="bouton">	
				nombre de phrase :<input type="text" name="nbPhrase" id="nbPhrase" placeholder="entrez un nombre" maxlength="3" required /><br>

				<input type="submit" name="generer" value="txtSrc"/>
			</div></div>
		</section>


		<section class="auteurSrc">
			<h1> Auteur </h1>

			<div class="bout">
				<input type="submit" class="auteur" name="generer" id="WilliamShakespeare" value="William Shakespeare"/>
				<input type="submit" class="auteur" name="generer" id="VictorHugo" value="Victor Hugo"/>
				<input type="submit" class="auteur" name="generer" id="Arthur" value="Arthur"/>
				<input type="submit" class="auteur" name="generer" id="JeanDeLaFontaine" value="Jean De La Fontaine"/>
			</div>

			<div class="bout">
				<input type="submit" class="auteur" name="generer" id="JulienDore" value="Julien Dore"/>
				<input type="submit" class="auteur" name="generer" id="LoremIpsum" value="Lorem Ipsum"/>
				<input type="submit" class="auteur" name="generer" id="FanFiction" value="Fan Fiction"/>
			</div>
		</section>


        <section class="code">
			<h1> Code </h1>
            
            Intéresser par le code du générateur ? <br>
            L’entièreté du projet est accessible sur github :
            
            <div class="bout">
				<a href="https://github.com/FlorentMoulon/F_Backpack"> <div class="auteur" id="github">  </div> </a>
			</div>
			
		</section>
		

		</form>

	</body>
</html>
