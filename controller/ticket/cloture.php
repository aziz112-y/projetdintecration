<?php
require_once("../../CRUD/crudTickets.php");
$crud = new CrudTicket();
if (isset($_POST['diag'])) {
    $diag = htmlspecialchars($_POST['diagnostic']);
    $crud->cloture($_GET['id'], $diag);
    header("location:../../tickets.php");
} else {
    echo $crud->getDiagByid($_GET['id']);
}
