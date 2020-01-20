<?php
session_start();
require_once("models/ScheduleData.php");
require_once ("models/UserData.php");

$rotaData = new ScheduleData();
$userData = new UserData();

$view = new stdClass();
$view->pageName = "admin";
$view->rotas = $rotaData->getRotas("2020-01-01", "2020-02-28");
$view->users = $userData->getAllNonAdmins();

if (isset($_POST['submit'])) {
    $from = $_POST['dateFrom'];
    $to = $_POST['dateTo'];

    $view->rotas = $rotaData->getRotas($from, $to);
}
require_once ("views/rota.phtml");
