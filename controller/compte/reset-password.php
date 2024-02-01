<?php
require_once '../../CRUD/Crud_account.php';
require_once '../../CRUD/Crud_code.php';
session_start();
if (isset($_GET['token'])) {
    $token = $_GET['token'];
    if (isset($_POST['btn'])) {
        $mdp = htmlspecialchars($_POST['newpass']);
        $mdp2 = htmlspecialchars($_POST['cnewpass']);
        if ($mdp == $mdp2) {
            $code = new Crud_code();
            $result = $code->verifCode($token);
            if ($result == true) {
                echo $result;
                $email = $code->getEmail($token);
                echo $email;
                $code->deleteCode($token);
                $crud = new CRUD();
                $crud->updatePassword($email, $mdp);
                $_SESSION['error'] = "Mot de passe a etes modifier avec succes";
                $_SESSION['error-type'] = "bg-success";
                header('location:../../login.php');
            } else {
                $code->deleteCode($token);
                header('location:../../404.php');
            }
        } else {
            $_SESSION['error'] = "Mot de passe non identique";
            $_SESSION['error-type'] = "bg-danger";
            echo "Mot de passe non identique";
            header('location:../../reset-password.php?token=' . $token);
        }
    }
}
