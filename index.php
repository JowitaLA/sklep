<?php
require_once 'init.php';
use core\App;
header("Location: ". App::getConf()->app_url);

// Funkcja pomocnicza dla json_encode
function jsonEncode($value) {
    return json_encode($value);
}

$smarty = new Smarty();
// Rejestracja json_encode jako modyfikatora
$smarty->registerPlugin('modifier', 'json_encode', 'jsonEncode');