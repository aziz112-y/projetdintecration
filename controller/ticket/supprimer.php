<?php
session_start();
if ($_SESSION['type'] != "supervisor") {
    header("location:../../index.php");
} else {
    if (isset($_GET["id"])) {
        require_once "../../CRUD/crudTickets.php";
        $crud = new CrudTicket();
        $crud->supprimer($_GET["id"]);
        header("location:../../tickets.php");
    }
}
