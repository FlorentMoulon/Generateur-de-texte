<?php


/*
.-----------.
| adapteTxt |
'-----------'
Créer un fichier txtSrcAdapte.txt utilisable par l'algorithme.
*/


function adapteTxt()
{
	$src=file_get_contents("txtSrc.txt");

	$src=str_replace(CHR(10),' ',$src);
	$src=str_replace(CHR(13),' ',$src);
	$src=str_replace("  ",' ',$src);
	$src=str_replace("   ",' ',$src); 
	$src=str_replace(".", " .", $src);
	$src=str_replace("!", " !", $src);
	$src=str_replace(",", " ,", $src);
	$src=str_replace("?", " ?", $src);
	$src=str_replace("  ", " ", $src);

	file_put_contents("txtSrcAdapte.txt", ". ");
	file_put_contents("txtSrcAdapte.txt", $src, FILE_APPEND);
	file_put_contents("txtSrcAdapte.txt", "   -FIN-", FILE_APPEND);

}



/*
.------------.
| rechercher |
'------------'
Renvoit un tableau contenant tous les mots pécédé par celui passé en paramètre dans le fichier txtSrcAdapte.txt
*/


function rechercher($mot)
{
	$tab;
	$src=file_get_contents("txtSrcAdapte.txt");
	$src=explode(" ", $src);

	$i=0;
	$j=0;

	if ($mot=="." || $mot=="!" || $mot=="?"){
        do{
            $motc=$src[$i];

            if ($motc=="." || $motc=="!" || $motc=="?"){
               	$i=$i+1;
                $motc=$src[$i];
                if($motc!="-FIN-"){
                	$tab[$j]=$motc;
                	$j=$j+1;
                }
            }
            $i=$i+1;
        }while ($motc != "-FIN-");
    }
    else {
    	do{
            $motc=$src[$i];
            if ($motc==$mot){
               	$i=$i+1;
                $motc=$src[$i];

                if($motc!="-FIN-"){
                	$tab[$j]=$motc;
                	$j=$j+1;
                }
            }
            $i=$i+1;
        }while ($motc != "-FIN-");
    }

	return $tab;
}



/*
.--------.
| genere |
'--------'
Renvoit une phrase généré aléatoirement.
*/


function genere(){
	$phrase="";

	$i=0;

	$mot=".";
    do{

    	$i++;


        $tab=rechercher($mot);
        $mot=$tab[rand(0,count($tab)-1)];

        if ($mot == "." || $mot == "?" || $mot == "!" || $mot==","){
        	$phrase=$phrase.$mot;
        }else{
        	$phrase=$phrase." ".$mot;
        }



            if($i>500){
            	echo "<br> pb de generation |".$mot."|";
            }




    }while ($mot != "." && $mot != "?" && $mot != "!" && $mot != "");

    return $phrase;
}








/*
.------------------.
| rechercherAuteur |
'------------------'
Renvoit un tableau contenant tous les mots pécédé par celui passé en paramètre dans le fichier auteur.txt
*/


function rechercherAuteur($mot,$auteur)
{
    $tab;
    $src=file_get_contents("auteur\\".$auteur.".txt");
    $src=explode(" ", $src);

    $i=0;
    $j=0;

    if ($mot=="." || $mot=="!" || $mot=="?"){
        do{
            $motc=$src[$i];

            if ($motc=="." || $motc=="!" || $motc=="?"){
                $i=$i+1;
                $motc=$src[$i];
                if($motc!="-FIN-"){
                    $tab[$j]=$motc;
                    $j=$j+1;
                }
            }
            $i=$i+1;
        }while ($motc != "-FIN-");
    }
    else {
        do{
            $motc=$src[$i];
            if ($motc==$mot){
                $i=$i+1;
                $motc=$src[$i];

                if($motc!="-FIN-"){
                    $tab[$j]=$motc;
                    $j=$j+1;
                }
            }
            $i=$i+1;
        }while ($motc != "-FIN-");
    }

    return $tab;
}





/*
.--------------.
| genereAuteur |
'--------------'
Renvoit une phrase généré aléatoirement.
*/


function genereAuteur($auteur){
    $phrase="";

    $i=0;

    $mot=".";
    do{

        $i++;


        $tab=rechercherAuteur($mot,$auteur);
        $mot=$tab[rand(0,count($tab)-1)];

        if ($mot == "." || $mot == "?" || $mot == "!" || $mot==","){
            $phrase=$phrase.$mot;
        }else{
            $phrase=$phrase." ".$mot;
        }



            if($i>500){
                echo "<br> pb de generation |".$mot."|";
            }




    }while ($mot != "." && $mot != "?" && $mot != "!" && $mot != "");

    return $phrase;
}

?>