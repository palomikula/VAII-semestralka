<?php
session_start();
include "app/App.php";

$app = new App();

$isLogged = $app->getAuth()->isLogged();

$app->handleRequest(@$_GET['action']);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Best carsharing ever</title>
    <link rel="stylesheet" href="css/top-nav.css">
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/home.css">
</head>
<body>
<div class="top-nav">
    <?php if ($isLogged) { ?>
        <a href="logout.php">ODHLÁSIŤ SA</a>
        <?php
    } else {
        ?>
        <a href="login.php">PRIHLÁSIŤ SA</a>
        <?php
    }
    ?>
    <a href="index.php" class="left">DOMOV</a>
    <a href="php/cars.php">AUTÁ</a>
    <a href="php/history.php">HISTÓRIA</a>
    <a href="php/about.php">INFO</a>
    <a class='right' href="php/account.php">ÚČET</a>
</div>
<div class="container">
    <img src="imgs/home.jpg" class="home-img">
    <div class="centered welcome-text">Vitaj <?php if ($isLogged) { echo $app->getAuth()->getUser();}?>!</div>
</div>
<div class="container-heading">
    <h3>NAPOSLEDY POŽIČANÉ</h3>
</div>
<div class="card-list">
    <div class="card">
        <img src="imgs/cars/lamborghini_huracan.jpeg" alt="item1" class="card-img">
        <div class="container-card">
            <h4><b>Lamborghini huracan</b></h4>
        </div>
    </div>
    <div class="card">
        <img src="imgs/cars/fiat_multipla.jpeg" alt="item2" class="card-img">
        <div class="container-card">
            <h4><b>Fiat Multipla</b></h4>
        </div>
    </div>
    <div class="card">
        <img src="imgs/cars/mercedes_g63.jpeg" alt="item3" class="card-img">
        <div class="container-card">
            <h4><b>Mercedes-benz G63</b></h4>
        </div>
    </div>
    <div class="card">
        <img src="imgs/cars/fiat_multipla.jpeg" alt="item4" class="card-img">
        <div class="container-card">
            <h4><b>Fiat Multipla</b></h4>
        </div>
    </div>
</div>
<div class="container-heading">
    <h3>ATUÁLNE POŽIČANÉ</h3>
</div>
<div class="card-list">
    <div class="card">
        <img src="../imgs/cars/fiat_multipla.jpeg" alt="item4" class="card-img">
        <div class="container-card">
            <h4><b>Fiat Multipla</b></h4>
        </div>
    </div>
</div>
<footer class="footer">
    <p>autor: Pavol Mikula</p>
</footer>
