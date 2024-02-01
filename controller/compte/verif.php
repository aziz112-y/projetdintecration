<?php
session_start();
if ($_SESSION['type'] == "client") {
    header("location:../../index.php");
} else {
    if (isset($_GET["id"])) {
        require_once "../../CRUD/Crud_account.php";
        $crud = new CRUD();
        $crud->verifid(htmlspecialchars(($_GET["id"])));
        $_SESSION["error"] = "Compte vérifié avec succès.";
        $_SESSION["error-type"] = "bg-success text-white";
        header("location:../../verifier.php?type=tout");
    }
}
