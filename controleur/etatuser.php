<?php //script etatuser : sert à charger et afficher les informations (consultation, reservation et prets) d'un utilisateur


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

$pret = Pret::getByIdUser($_GET['iduser']);
$reservation = Reservation::getByIdUser($_GET['iduser']);
$consultation = Consultation::getByIdUser($_GET['iduser']);



$tabuser = [];
$tabuser["pret"] = $pret;
$tabuser["consultation"] = $consultation;
$tabuser["reservation"] = $reservation;

echo json_encode($tabuser);


?>