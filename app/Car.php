<?php
class Car
{
    public function __construct(
        private int $id = 0,
        private string $model = "",
        private float $volume = 0,
        private int $power = 0,
        private string $transmission = "",
        private float $acceleration = 0,
        private int $top_speed = 0,
        private float $fuel_consumption = 0,
        private string $price = "",
    )
    {
    }


    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int|null $id
     */
    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string|null
     */
    public function getModel(): ?string
    {
        return $this->model;
    }

    /**
     * @param string|null $model
     */
    public function setModel(?string $model): void
    {
        $this->model = $model;
    }

    /**
     * @return float|null
     */
    public function getVolume(): ?float
    {
        return $this->volume;
    }

    /**
     * @param float|null $volume
     */
    public function setVolume(?float $volume): void
    {
        $this->volume = $volume;
    }

    /**
     * @return int|null
     */
    public function getPower(): ?int
    {
        return $this->power;
    }

    /**
     * @param int|null $power
     */
    public function setPower(?int $power): void
    {
        $this->power = $power;
    }

    /**
     * @return string|null
     */
    public function getTransmission(): ?string
    {
        return $this->transmission;
    }

    /**
     * @param string|null $transmission
     */
    public function setTransmission(?string $transmission): void
    {
        $this->transmission = $transmission;
    }

    /**
     * @return float|null
     */
    public function getAcceleration(): ?float
    {
        return $this->acceleration;
    }

    /**
     * @param float|null $acceleration
     */
    public function setAcceleration(?float $acceleration): void
    {
        $this->acceleration = $acceleration;
    }

    /**
     * @return int|null
     */
    public function getTopSpeed(): ?int
    {
        return $this->top_speed;
    }

    /**
     * @param int|null $top_speed
     */
    public function setTopSpeed(?int $top_speed): void
    {
        $this->top_speed = $top_speed;
    }

    /**
     * @return float|null
     */
    public function getFuelConsumption(): ?float
    {
        return $this->fuel_consumption;
    }

    /**
     * @param float|null $fuel_consumption
     */
    public function setFuelConsumption(?float $fuel_consumption): void
    {
        $this->fuel_consumption = $fuel_consumption;
    }

    /**
     * @return string|null
     */
    public function getPrice(): ?string
    {
        return $this->price;
    }

    /**
     * @param string|null $price
     */
    public function setPrice(?string $price): void
    {
        $this->price = $price;
    }

}