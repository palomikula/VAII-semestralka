<?php
session_start();
include "app/App.php";

$app = new App();

$message = "";

if (isset($_POST['login'])) {

    $app->getAuth()->logIn(@$_POST['login'], @$_POST['password']);

    if ($app->getAuth()->isLogged()) {
        $app->goToHomePage();
    } else {
        $message = '<div style="color: red">Nepodarilo sa prihlásiť!</div>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Prihlásenie</title>
</head>
<body>
<?= $message ?>
<form method="post">
    <label for="login">Meno:</label>
    <input name="login" id="login" type="text">
    <label for="password">Heslo:</label>
    <input name="password" id="password" type="password">
    <button type="submit">Prihlásiť sa</button>
</form>
</body>
</html>