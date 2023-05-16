<?php
session_start();
    if (!isset($_SESSION['login']) || $_SESSION['login'] !== 0) {
        header("location: auth_form.php?view=login");
        exit();
    }
?>