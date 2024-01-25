<?php

require_once "../../crud/crud_account.php";
require_once "../../crud/crud_societe.php";
require_once "../../crud/crudTickets.php";
$crud_compte = new CRUD();
$crud_societe = new Societe();
$crud_ticket = new CrudTicket();
$total_tickets = $crud_ticket->getTotalTickets();
$top_admin=$crud_compte->getTopAdmin();
$top_ticket=$crud_ticket->getTopTicket();   
$male=$crud_compte->getMale();
$female=$crud_compte->getFemale();
$total_admin=$crud_compte->getTotalAdmin();
?>







