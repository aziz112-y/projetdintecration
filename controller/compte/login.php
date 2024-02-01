<?php
require_once '../../CRUD/Crud_account.php';

session_start();
if (isset($_POST['btn'])) {
    $email = htmlspecialchars($_POST['email']);
    $mdp = htmlspecialchars($_POST['mdp']);
    $crud = new CRUD();
    $result = $crud->Login($email, $mdp);
    if ($result != null) {
        $_SESSION['email'] = $email;
        $_SESSION['type'] = $result[5];
        $_SESSION['gender'] = $result[8];
        $_SESSION['id'] = $result[10];
        $_SESSION['nom'] = $result[0];
        $_SESSION['prenom'] = $result[1];
        header('location:../../index.php');
    } else {
        $_SESSION['error'] = "Email ou mot de passe erroné , vérifiez vos données.";
        $_SESSION["error-type"] = "bg-danger text-white";
        header('location:../../login.php');
    }
}
