<?php
session_start();
if ($_SESSION['type'] != "supervisor") {
    header("location:../../index.php");
} else {
    if (isset($_GET["id"])) {
        require_once "../../crud/crud_account.php";
        $crud = new CRUD();
        $crud->Supprimeraccount(htmlspecialchars(($_GET["id"])));
        $_SESSION["error"] = "Compte supprimé avec succès.";
        $_SESSION["error-type"] = "bg-success text-white";
        $previous_page = $_SERVER["HTTP_REFERER"];
        header("location:$previous_page");
    }
}
