<?php
require_once 'init.php';
use core\App;
header("Location: ". App::getConf()->app_url);

$smarty = new Smarty();
// Rejestracja json_encode jako modyfikatora
$smarty->registerPlugin("modifier", "json_encode", "json_encode");