<?php
$login = $_GET["login"];
$pass = $_GET["pass"];

if ($login == "usuario1@3dbot.com" && $pass == "usuario1") {
    session_start();
    $_SESSION["usuario"] = $login;
    header("Location: pagina1.php");
} else if ($login == "usuario2@3dbot.com" && $pass == "usuario2") {
    session_start();
    $_SESSION["usuario"] = $login;
    header("Location: pagina1.php");
} else if ($login == "usuario3@3dbot.com" && $pass == "usuario3") {
    session_start();
    $_SESSION["usuario"] = $login;
    header("Location: pagina1.php");
} else {
    session_start();
    $_SESSION["usuario"] = "";
    header("Location: index.html");
}
