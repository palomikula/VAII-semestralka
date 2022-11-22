<?php
include "Article.php";
include "Auth.php";
include "DBStorage.php";

class App
{
    private $storage;
    private Auth $auth;

    const URL = '';

    /**
     * Vytvorí potrebné inštancie tried
     */
    public function __construct()
    {
        $this->storage = new DBStorage();
        $this->auth = new Auth();
    }

    /**
     * Vráti všetky auta
     * @return Car[]
     */
    public function getAllData(): array
    {
        return $this->storage->getAll();
    }

    /**
     * Vráti jedno auto
     * @param $id
     * @return Car
     */
    public function getOne($id): Article
    {
        return $this->storage->getOne($_GET["id"]);
    }

    /**
     * Spracuje žiadosť používateľa a vykoná príslušnú CRUD operáciu
     * @param string|null $action
     * @return void
     */
    public function handleRequest(?string $action)
    {
        if($action != null) {
            $actions = explode("=", $action);
            switch ($actions[0]) {
                case "add":
                    $this->storage->save(new Car(model: $_POST["model"], volume: $_POST["volume"],
                        power: $_POST["power"], transmission: $_POST["transmission"], acceleration: $_POST["acceleration"],
                        top_speed: $_POST["top_speed"], fuel_consumption: $_POST["fuel_consumption"], price: $_POST["price"]));
                    break;

                case "delete":
                    $this->storage->delete($actions[1]);
                    break;
                case "update":
                    $this->storage->save(new Car(id: $actions[1], model: $_POST["model"], volume: $_POST["volume"],
                        power: $_POST["power"], transmission: $_POST["transmission"], acceleration: $_POST["acceleration"],
                        top_speed: $_POST["top_speed"], fuel_consumption: $_POST["fuel_consumption"], price: $_POST["price"]));
                    break;
            }
        }
    }

    /**
     * Vráti inštanciu autentifikačnej triedy
     * @return Auth
     */
    public function getAuth(): Auth
    {
        return $this->auth;
    }

    /**
     * Presmeruje používateľa ma hlavnú stránku
     * @return void
     */
    public function goToHomePage()
    {
        header("Location: " . self::URL . "index.php");
    }
}