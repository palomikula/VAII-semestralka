<?php

include "Car.php";

class DBStorage
{
    private PDO $con;

    public const DB_HOST = 'db';  // change to db, if docker you use docker
    public const DB_NAME = 'vaiicko_db';
    public const DB_USER = 'vaiicko_user'; // change to vaiicko_user, if docker you use docker
    public const DB_PASS = 'dtb456';

    /**
     * Vytvorí spojenie s DB
     */
    public function __construct()
    {
        try {
            $this->con = new PDO('mysql:dbname=' . DBStorage::DB_NAME . ';host=' . DBStorage::DB_HOST, DBStorage::DB_USER, DBStorage::DB_PASS);
        } catch (PDOException $e) {
            die("DB error: " . $e->getMessage());
        }
    }

    /**
     * Vyberie všetky autá z DB
     * @return Car[]
     */
    public function getAll() : array
    {
        try {
            $stmt = $this->con->prepare("SELECT * FROM cars");
            $stmt->execute();
            $cars = $stmt->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, Car::class);
            return $cars;
        } catch (PDOException $e) {
            die("DB error: " . $e->getMessage());
        }
    }

    /**
     * Uloží auto, buď ako prve, alebo zmenene (ak id je nenulové)
     * @param Car $car
     * @return void
     */
    public function save(Car $car) : void
    {
        try {
            if ($car->getId() == 0) {
                $stmt = $this->con->prepare("INSERT INTO cars (model, volume, power, transmission,
                  acceleration, top_speed, fuel_consumption, price) VALUES (?, ?, ?, ? ,?, ?, ?, ?)");
                $stmt->execute([$car->getModel(), $car->getVolume(), $car->getPower(), $car->getTransmission()
                , $car->getAcceleration(), $car->getTopSpeed(), $car->getFuelConsumption(), $car->getPrice()]);
            }
            else {
                $stmt = $this->con->prepare("UPDATE cars SET model=?, volume=?, power=?, transmission=?,
                  acceleration=?, top_speed=?, fuel_consumption=?, price=? WHERE id=?");
                $stmt->execute([$car->getModel(), $car->getVolume(), $car->getPower(), $car->getTransmission()
                    , $car->getAcceleration(), $car->getTopSpeed(), $car->getFuelConsumption(), $car->getPrice(), $car->getId()]);
            }
        } catch (PDOException $e) {
            die("DB error: " . $e->getMessage());
        }
    }

    /**
     * Vymaže článok z DB
     * @param int $id
     * @return void
     */
    public function delete(int $id)
    {
        try {
            $stmt = $this->con->prepare("DELETE FROM cars WHERE id = ?");
            $stmt->execute([$id]);
        } catch (PDOException $e) {
            die("DB error: " . $e->getMessage());
        }
    }

    /**
     * Vráti jeden článok z DB
     * @param int $id
     * @return Article
     */
    public function getOne(int $id) : Article
    {
        try {
            $stmt = $this->con->prepare("SELECT * FROM cars WHERE id = ?");
            $stmt->execute([$id]);
            $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, Car::class);
            $car = $stmt->fetch();
            return $car;
        } catch (PDOException $e) {
            die("DB error: " . $e->getMessage());
        }
    }
}