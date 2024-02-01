<?php
require_once '../../CRUD/Crud_account.php';
require_once '../../CRUD/Crud_code.php';

session_start();
$code = new Crud_code();
if (isset($_POST['btn'])) {
    $email = htmlspecialchars($_POST['email']);
    $crud = new CRUD();
    $result = $crud->compte_existe($email);
    if ($result != null) {
        $token = $code->generateCode($email);
        $_SESSION["error"] = "Nous avons envoyé un email de réinitialisation de mot de passe à votre adresse email.";
        $_SESSION["error-type"] = "alert-success";
        $code->sendCode($email, "Réinitialisation de mot de passe", "Bonjour, <br> C'est votre lien pour réinitialiser votre mot de passe: <a href='http://localhost:4000/reset-password.php?token=" . $token . "'>Cliquez Ici</a>");
        header("Location: ../../forgot-password.php");
    } else {
        $_SESSION["error"] = "Email n'existe pas";
        $_SESSION["error-type"] = "alert-danger";

        header("Location: ../../forgot-password.php");
    }
}
