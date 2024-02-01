<?php
require_once '../../model/ticket.php';
require_once '../../CRUD/crudtickets.php';
$crudtickets = new CrudTicket();
$ticket = new Ticket();
if (isset($_POST['envoyer'])) {
    if (isset($_POST['demande']) && isset($_POST['categorie'])) {
        $demande = htmlspecialchars($_POST['demande']);
        $categorie = htmlspecialchars($_POST['categorie']);
        $ticket->setContact($_SESSION['email']);
        $ticket->setDemande($demande);
        $ticket->setDiagnostique("");
        $ticket->setCategorie($categorie);
        $crudtickets->CreerTicket($ticket);
    }
    header("location:../../tickets.php");
}
