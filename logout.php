<?php
session_start();
include "app/App.php";

$app = new App();
$app->getAuth()->logOut();

$app->goToHomePage();