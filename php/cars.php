<?php
session_start();
include "../app/App.php";

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
    <link rel="stylesheet" href="../css/top-nav.css">
    <link rel="stylesheet" href="../css/global.css">
    <link rel="stylesheet" href="../css/cars.css">
    <script defer src="../script.js"></script>
</head>
<body>
<div class="top-nav">
    <?php if ($isLogged) { ?>
        <a href="../logout.php">ODHLÁSIŤ SA</a>
        <?php
    } else {
        ?>
        <a href="../login.php">PRIHLÁSIŤ SA</a>
        <?php
    }
    ?>
    <a href="../index.php" class="left">
        DOMOV
    </a>
    <a class="active" href="cars.php">AUTÁ</a>
    <a href="history.php">HISTÓRIA</a>
    <a href="about.php">INFO</a>
    <a class='right' href="account.php">ÚČET</a>
</div>

<div class="search-bar">
    <label>
        <input type="search" class="search-bar-input" placeholder="hľadaj">
    </label>
</div>


<div style="overflow-x: auto">
    <table>
        <tr>
            <?php if ($isLogged) { ?>
                <th></th>
                <th></th>
            <?php } ?>
    }
            <th>č.</th>
            <th>Model</th>
            <th>Objem motora</th>
            <th>Výkon</th>
            <th>Prevodovka</th>
            <th>Zrýchlenie 0-100</th>
            <th>Maximálna rýchlosť</th>
            <th>Kombinovaná spotreba</th>
            <th>Cena za hodinu</th>
        </tr>
        <?php
            foreach ($app->getAllData() as $car) {

                if (isset($_GET['action']) ) {
                    $actions = explode("=", $_GET['action']);
                    if($actions[0] == 'edit' && $actions[1] == $car->getId()){ ?>
                        <tr>
                            <form action="?action=update=<?php echo $car->getId()?>" method="post">
                                <th></th>
                                <th><input type="submit" value="Potvrdiť auto"></th>
                                <th></th>
                                <th><input type="text" name="model" value="<?= $car->getModel()?>" required></th>
                                <th><input type="text" name="volume" value="<?= $car->getVolume()?>" required></th>
                                <th><input type="text" name="power" value="<?= $car->getPower()?>" required></th>
                                <th><input type="text" name="transmission" value="<?= $car->getTransmission()?>" required></th>
                                <th><input type="text" name="acceleration" value="<?= $car->getAcceleration()?>" required></th>
                                <th><input type="text" name="top_speed" value="<?= $car->getTopSpeed()?>" required></th>
                                <th><input type="text" name="fuel_consumption" value="<?= $car->getFuelConsumption()?>" required></th>
                                <th><input type="text" name="price" value="<?= $car->getPrice()?>" required></th>
                            </form>
                        </tr>
                        <?php
                        continue;

                    }
                }


                ?>
            <tr>
                <?php if ($isLogged) { ?>
                <td><form action="?action=edit=<?php echo $car->getId()?>" method="post">
                        <input type="submit" value="Editovať auto" />
                    </form></td>
                <td><form action="?action=delete=<?php echo $car->getId()?>" method="post">
                        <input type="submit" value="Zmazať auto" />
                    </form></td>
                <?php } ?>
                <td><?= $car->getId()?></td>
                <td><?= $car->getModel()?></td>
                <td><?= $car->getVolume()?> l</td>
                <td><?= $car->getPower()?> hp</td>
                <td><?= $car->getTransmission()?></td>
                <td><?= $car->getAcceleration()?> s</td>
                <td><?= $car->getTopSpeed()?> km/h</td>
                <td><?= $car->getFuelConsumption()?> l</td>
                <td><?= $car->getPrice()?>€</td>
            </tr>
            <?php } ?>
        <?php if ($isLogged) { ?>
        <tr>
            <form id="form" action="?action=add" method="post">
                <th></th>
                <th><input type="submit" value="Pridať auto"></th>
                <th></th>
                <th><input id="model" type="text" name="model" required></th>
                <th><input id="volume"type="text" name="volume" required></th>
                <th><input id="power" name="power" required></th>
                <th><input id="transmission" name="transmission" required></th>
                <th><input id="acceleration" name="acceleration" required></th>
                <th><input id="top_speed" name="top_speed" required></th>
                <th><input id="fuel_consumption" name="fuel_consumption" required></th>
                <th><input id="price" name="price"required></th>
            </form>
        </tr>
        <?php } ?>

    </table>
</div>
<footer class="footer">
    <p>autor: Pavol Mikula</p>
</footer>
</body>
</html>