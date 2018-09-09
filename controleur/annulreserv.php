 <?php //reservation d'un ouvrage


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

$annul_reserv = Reservation::annulReserv($_GET['id'],$_GET['iduser']);

echo $annul_reserv;

?>