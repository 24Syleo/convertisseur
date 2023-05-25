<?php
require_once './class/Geoapi.php';

$fromError = $toError = $amt = $from = $to = "";
$devise = new Geoapi('c466bb3b202b2df343283e3766a3968af703e7eb');
$dev = $devise->getList();
$cur = $dev['devise'];
if (!empty($_POST)) {
    $from = checkInput($_POST['from']);
    $to = checkInput($_POST['to']);
    $amt = checkInput($_POST['amt']);
    $success = true;

    if (empty($amt)) {
        $amt = 1;
    }

    if(empty($from)){
        $fromError = "SVP choisissez une devise de départ";
        $success=false;
    }

    if(empty($to)){
        $toError = "SVP choisissez une devise d'arrivée";
        $success=false;
    }

    if($success){
        $currency = new Geoapi('c466bb3b202b2df343283e3766a3968af703e7eb');
        $convert = $currency->getConverter($from, $to, $amt);
    }
}
