<?php


session_start();

class AvtClass
{
    private $_login = "admin";
    private $_password = "admin";


    public function isAvt()
    {
        if (isset($_SESSION["is_auth"])) {
            return $_SESSION["is_auth"];
        } else return false;
    }


    public function avt($login, $passwors)
    {
        if ($login == $this->_login && $passwors == $this->_password) {
            $_SESSION["is_auth"] = true;
            $_SESSION["login"] = $login;
            return true;
        } else {
            $_SESSION["is_auth"] = false;
            return false;
        }
    }


    public function Login()
    {
        if ($this->isAvt()) {
            return $_SESSION["login"];
        };
    }


    public function out()
    {
        $_SESSION = array();
        session_destroy();
    }
}

$auth = new AvtClass();

if (isset($_POST["login"]) && isset($_POST["password"])) {
    if (!$auth->avt($_POST["login"], $_POST["password"])) {
        echo "<h2>Логин и пароль введен не правильно!</h2>";
    }
}

if (isset($_GET["is_exit"])) {
    if ($_GET["is_exit"] == 1) {
        $auth->out();
        header("Location: ?is_exit=0");
    }
}


if ($auth->isAvt()) {
    echo "Hi " . $auth->Login();
    echo "<br/><br/><a href='?is_exit=1'>Выйти</a>";
} else {

    echo " <form method=\"post\">Логин: <input type=\"text\" name=\"login\"value=\"admin\"/><br/>Пароль: <input type=\"password\" name=\"password\" value=\"admin\"/><br/><input type=\"submit\" value=\"Войти\"/></form>";
}