<?php //script redirect : sert à charger et afficher les informations d'une fiche dans le modal


function autoloader($className)
{
    $path = __DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'controleur'.DIRECTORY_SEPARATOR;
	
    if(file_exists($path.$className.'.php'))
    {
		
        include $path.$className.'.php';
    } 
	else
	{
		$path = __DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'modele'.DIRECTORY_SEPARATOR;
		if(file_exists($path.$className.'.php'))
		{
			include $path.$className.'.php';
		}
	}
}

spl_autoload_register('autoloader');

$fiche = Document::getFiche($_GET['id']);
$auteur = Auteur::getBydocId($_GET['id']);
$motclef = Motclef::getBydocId($_GET['id']);
$exemplaire = Document::getEtatDoc($_GET['id']);


//historique de consultation
if(isset($_GET['iduser'])) {
	$consultation = Consultation::actualise($_GET['iduser'],$_GET['id']);
	
}

$liste_auteur = "";
foreach($auteur as $aut) {
	$liste_auteur = $liste_auteur.",".$aut['prenom_auteur']." ".$aut['nom_auteur'];
}
$liste_auteur = substr($liste_auteur,1);

$liste_motclef = "";
foreach($motclef as $mt) {
	$liste_motclef = $liste_motclef.",".$mt['lib_motclef'];
}
$liste_motclef = substr($liste_motclef,1);

$tab = [];
$tab["fiche"] = $fiche[0];
$tab["auteur"] = $liste_auteur;
$tab["motclef"] = $liste_motclef;
$tab["exemplaire"] = $exemplaire;
echo json_encode($tab);


?>