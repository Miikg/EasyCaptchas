<?php


/* SUPPRESSION DE 1 & I, 0 & O POUR EVITER LA CONFUSION DE LECTURE*/
$chaine = '23456789ABCDEFGHJKLMNPQRSTUVWXYZ';
/*CREATION de l'image par defaut en background*/
$image = imagecreatefrompng('Images/images.png');
/* COULEUR DES CARACTERES (EN RGB)*/
$color = imagecolorallocate($image, 173, 255, 47);
/*POLICE DES CARACTERES */
$font = 'Fonts/NewAmsterdam.ttf';

function getCode($length, $chars){
	$code = null;
	for ($i=0; $i<$length; $i++)
	{
		$code .= $chars {mt_rand( 0, strlen($chars) - 1)};
	}
	return $code;
};

/*APPEL DE LA FONCTION POUR RECUPERER UNE CHAINE ALEATOIRE */
$code = getCode(5, $chaine);
/*RETOURNE UN A UN LES SEGMENTS DE LA CHAINE*/
$char1 = substr($code,0,1);
$char2 = substr($code,1,1);
$char3 = substr($code,2,1);
$char4 = substr($code,3,1);
$char5 = substr($code,4,1);

/*DESSINE UN TEXTE AVEC UNE POLICE 
*PARAMS : IMAGE / TAILLE / ANGLE / POSX / POSY / COULEUR / POLICE / SEGMENTS*/
imagettftext($image, 40, -10, 5, 100, $color, $font, $char1);
imagettftext($image, 40, 20, 125, 110, $color, $font, $char2);
imagettftext($image, 40, -35, 148, 60, $color, $font, $char3);
imagettftext($image, 40, 25, 200, 110, $color, $font, $char4);
imagettftext($image, 40, -15, 285, 100, $color, $font, $char5);

/*ENTETE HTTP A RENVOYER POUR LA GENERATION DE L'IMAGE */
header('Content-Type: image/png');
/*ENVOI DE L'IMAGE PNG GENEREE AU NAVIGATEUR*/
imagepng($image);

/*DESTRUCTION DE L'IMAGE LIBERATION DE MEMOIRE*/
imagedestroy($image);

?>
