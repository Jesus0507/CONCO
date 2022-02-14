<?php

date_default_timezone_set('America/Caracas');
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once("vendor/autoload.php");

use Iniciar_Sistema as Iniciar_Sistema;
$app = new Iniciar_Sistema(); 

?>