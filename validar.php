<?php
$login = $_GET["login"];
$pass = $_GET["pass"];

if ($login == "admin" && $pass == "admin") {
    session_start();
    $_SESSION["usuario"] = $login;
    header("Location: pagina1.php");
} else {
    session_start();
    $_SESSION["usuario"] = "";
    header("Location: index.html");
}
