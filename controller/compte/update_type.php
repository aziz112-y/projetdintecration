<?php
session_start();
if (isset($_SESSION["email"])) {
    require_once '../../CRUD/Crud_account.php';
    $crud = new CRUD();
    $_SESSION['type'] = $crud->getType($_SESSION['email']);
} else {
    header('location:../../login.php');
}
echo $_SESSION['type'];
