<?php

class Auth
{
    private bool $isLogged = false;

    const LOGIN = "admin";
    const PASSWORD = "admin";

    /**
     * Ak bol používateľ prihlásený, obnov prihlásenie
     */
    public function __construct()
    {
        if (isset($_SESSION["user"])) {
            $this->isLogged = true;
        }
    }

    /**
     * Vráti, či je používateľ prihlásený, alebo nie
     * @return bool
     */
    public function isLogged(): bool
    {
        return $this->isLogged;
    }

    /**
     * Skontroluje meno a heslo a prihlási používateľa
     * @param string $login
     * @param string $password
     * @return void
     */
    public function logIn(string $login, string $password)
    {
        if ($login == self::LOGIN && $password == self::PASSWORD) {
            $_SESSION["user"] = self::LOGIN;
            $this->isLogged = true;
        }
    }

    /**
     * Odhlási používateľa
     * @return void
     */
    public function logOut()
    {
        session_destroy();
        $this->isLogged = false;
    }

    /**
     * Vráti meno prihláseného používateľa
     * @return string
     */
    public function getUser() : string
    {
        return $_SESSION["user"];
    }
}