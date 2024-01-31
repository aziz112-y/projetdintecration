<?php
require_once('../../config/connection.php');
require_once('crud_societe.php');

class CRUD
{
    protected $type;
    protected $pdo;
    function __construct()
    {
        $obj = new connection();
        $this->pdo = $obj->getConnection();
    }
    function listerNonVerif()
    {
        $sql = "select * from account where status='enCours';";
        $res = $this->pdo->query($sql);
        return $res->fetchAll(PDO::FETCH_NUM);
    }
    function updatePassword($email, $mdp)
    {
        $mdp = password_hash($mdp, PASSWORD_DEFAULT);
        $sql = "update account set mdp='$mdp' where email='$email';";
        $res = $this->pdo->exec($sql);
        return $res;
    }
    function Login($email, $pass)
    {
        $sql = "select mdp from account where email='$email';";
        $res = $this->pdo->query($sql);
        $hashedPassword = $res->fetch(PDO::FETCH_NUM)[0];
        if (password_verify($pass, $hashedPassword)) {
            $id = $this->getId($email);
            return $this->Afficher($id);
        } else {
            return null;
        }
    }

    function verifid($id)
    {
        $sql = "update account set status = 'Verifie' where id='$id';";
        $res = $this->pdo->query($sql);
        return $res->fetch(PDO::FETCH_NUM) == null ? false : true;
    }


    function verifEmail($email)
    {
        $sql = "update account set status = 'Verifie' where email='$email';";
        $res = $this->pdo->query($sql);
        return $res->fetch(PDO::FETCH_NUM) == null ? false : true;
    }
    function listerParType($type)
    {
        if ($type == "Client") {
            $type = "client";
        } else {
            $type = "admin";
        }
        $sql = "select * from account where type='$type';";
        $res = $this->pdo->query($sql);
        return $res->fetchAll(PDO::FETCH_NUM);
    }
    function getId($email)
    {
        $sql = "select id from account where email='$email';";
        $res = $this->pdo->query($sql);
        return $res->fetch(PDO::FETCH_NUM)[0];
    }
    function Register($nom, $prenom, $email, $tel, $mdp, $type, $matricule, $status, $gender, $noms, $tels, $adresse)
    {
        $soc = new Societe();
        $id = $soc->isExist($noms, $tels);
        echo $id;
        if ($this->compte_existe($email)) {
            return false;
        }

        if ($id == null) {
            $id = $soc->addSociete($noms, $adresse, $tels);
        }
        $sql = "INSERT INTO account (nom, prenom, email, tel, mdp, type, matricule, status, gender, centre ) 
            VALUES (:nom, :prenom, :email, :tel, :mdp, :type, :matricule, :status, :gender, :societe_id)";

        $stmt = $this->pdo->prepare($sql);

        $hashedPassword = password_hash($mdp, PASSWORD_DEFAULT);

        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':prenom', $prenom);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':tel', $tel);
        $stmt->bindParam(':mdp', $hashedPassword);
        $stmt->bindParam(':type', $type);
        $stmt->bindParam(':matricule', $matricule);
        $stmt->bindParam(':status', $status);
        $stmt->bindParam(':gender', $gender);
        $stmt->bindParam(':societe_id', $id);

        $res = $stmt->execute();

        return $res;
    }
    function getTypeById($id)
    {
        $sql = "select type from account where id='$id';";
        $res = $this->pdo->query($sql);
        return $res->fetch(PDO::FETCH_NUM)[0];
    }
    function getType($email)
    {
        $sql = "select type from account where email='$email';";
        $res = $this->pdo->query($sql);
        return $res->fetch(PDO::FETCH_NUM)[0];
    }
    function compte_existe($email)
    {
        $sql = "select * from account where email='$email';";
        $res = $this->pdo->query($sql);
        return $res->fetch(PDO::FETCH_NUM) == null ? false : true;
    }
    function Afficher($id)
    {

        $sql = "select *  from account where id='$id';";
        $res = $this->pdo->query($sql);
        return $res->fetch(PDO::FETCH_NUM);
    }
    function getEmail($id)
    {
        $sql = "select email from account where id='$id';";
        $res = $this->pdo->query($sql);
        return $res->fetch(PDO::FETCH_NUM)[0];
    }
    function Supprimeraccount($id)
    {
        $sql = "delete from account where id=$id;";
        $res = $this->pdo->exec($sql);
        return $res;
    }
    function getNomPrenomGenre($email)
    {
        $sql = "select nom,prenom,gender from account where email='$email';";
        $res = $this->pdo->query($sql);
        return $res->fetch(PDO::FETCH_NUM);
    }
    function Lister()
    {

        $sql = "select *  from  account where type != 'supervisor' and status='Verifie';";
        $res = $this->pdo->query($sql);
        return $res->fetchAll(PDO::FETCH_NUM);
    }
    function Update_Admin($id, $nom, $prenom, $email, $tel, $matricule)
    {
        $sql = "update account set nom='$nom',prenom='$prenom',email='$email',tel='$tel',matricule='$matricule',type='admin' where id='$id';";
        $res = $this->pdo->exec($sql);
        return $res;
    }
    function Update($id, $nom, $prenom, $email, $tel)
    {
        $sql = "update account set nom='$nom',prenom='$prenom',email='$email',tel='$tel' where id='$id';";
        $res = $this->pdo->exec($sql);

        return $res;
    }
    function getTopAdmin()
    {
        $sql = "SELECT a.nom, a.prenom, a.gender, a.type, a.email, COUNT(c.cloture_id) AS cloture_count FROM account a JOIN cloture c ON c.cloture_par = a.email WHERE a.type = 'admin'or a.type='supervisor' AND a.status = 'Verifie' GROUP BY a.nom, a.prenom, a.gender, a.type, a.email ORDER BY cloture_count DESC LIMIT 5;";
        $res = $this->pdo->query($sql);
        return $res->fetchAll(PDO::FETCH_NUM);
    }
    function getMale()
    {
        $req = "select count(*) from account where gender = 'male' and type ='admin';";
        $stmt = $this->pdo->query($req);
        return $stmt->fetch()[0];
    }
    function getFemale()
    {
        $req = "select count(*) from account where gender = 'female' and type ='admin';";
        $stmt = $this->pdo->query($req);
        return $stmt->fetch()[0];
    }
    function getTotalAdmin()
    {
        $req = "select count(*) from account where type = 'admin';";
        $stmt = $this->pdo->query($req);
        return $stmt->fetch()[0];
    }
}
