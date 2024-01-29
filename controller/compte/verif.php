<?php
session_start();
if ($_SESSION['type'] != "supervisor") {
    header("location:../../index.php");
} else {
    if (isset($_GET["id"])) {
        require_once "../../crud/crud_account.php";
        $crud = new CRUD();
        $crud->verifid(htmlspecialchars(($_GET["id"])));
        header("location:../../verifier.php?type=tout");
    }
}
