<?php
require_once "../../config/connection.php";
require_once "../../model/ticket.php";
session_start();
class CrudTicket
{
    public $pdo;
    public $db;
    public function __construct()
    {
        $this->db = new connection();
        $this->pdo = $this->db->getConnection();
    }
    public function CreerTicket($ticket)
    {
        $demande = $ticket->getDemande();
        $diagnostic = $ticket->getDiagnostique();
        $categorie = $ticket->getCategorie();
        $contact = $ticket->getContact();

        $req = "INSERT INTO ticket (DateHeure, demande, Diagnostic, Categorie, Priorite, Status, contact) VALUES (NOW(), :demande, :diagnostic, :categorie, 'urgent', 'enCours', :contact)";

        $stmt = $this->pdo->prepare($req);

        $stmt->bindParam(':demande', $demande);
        $stmt->bindParam(':diagnostic', $diagnostic);
        $stmt->bindParam(':categorie', $categorie);
        $stmt->bindParam(':contact', $contact);

        $stmt->execute();

        return $stmt;
    }


    public function getTickets()
    {
        if ($_SESSION['type'] != 'client') {
            $req = "SELECT 
    t.ticketId, 
    t.demande, 
    t.DateHeure, 
    s.nom AS societe_nom, 
    t.Diagnostic, 
    a.nom AS account_nom, 
    t.Categorie, 
    t.Priorite, 
    t.Status,
    c.cloture_par,
    c.dateheur AS cloture_dateheur
FROM 
    ticket t
JOIN 
    account a ON a.email = t.contact
JOIN 
    societe s ON s.id = a.centre
LEFT JOIN
    cloture c ON c.ticket_id = t.ticketId
WHERE 
    (c.cloture_par = '{$_SESSION['email']}' AND t.Status = 'Cloture') OR (t.Status = 'enCours')
    order by t.DateHeure desc  ;";
        } else {
            $req = "SELECT 
    t.ticketId, 
    t.demande, 
    t.DateHeure, 
    s.nom AS societe_nom, 
    t.Diagnostic, 
    a.nom AS account_nom, 
    t.Categorie, 
    t.Priorite, 
    t.Status,
    c.cloture_par,
    c.dateheur AS cloture_dateheur
FROM 
    ticket t
JOIN 
    account a ON a.email = t.contact
JOIN 
    societe s ON s.id = a.centre
LEFT JOIN
    cloture c ON c.ticket_id = t.ticketId;
    order by t.ticketId ;";
        }
        $stmt = $this->pdo->prepare($req);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_NUM);
    }
    public function getTicketById($reference)
    {
        $req = "SELECT * FROM ticket WHERE reference={$reference}";
        $stmt = $this->pdo->query($req);
        $result = $stmt->fetch();
        return $result;
    }
    public function getTicketlimit5()
    {
        $req = "SELECT * FROM ticket Limit 5";
        $stmt = $this->pdo->query($req);
        $result = $stmt->fetch();
        return $result;
    }
    public function getTicketByCat($cat)
    {
        $req = "SELECT * FROM ticket WHERE reference={$cat}";
        $stmt = $this->pdo->query($req);
        return $stmt->fetch();
    }
    public function getTicketTotal()
    {
        $req = "SELECT count(*) FROM ticket";
        $stmt = $this->pdo->query($req);
        return $stmt->fetch();
    }
    public function getByStatut($statut)
    {
        $req = "SELECT * FROM ticket WHERE status='{$statut}';";
        $stmt = $this->pdo->query($req);
        return $stmt->fetch();
    }

    public function getByStatutNum($statut)
    {
        $req = "SELECT count(ticketId) FROM ticket WHERE status='{$statut}';";
        $stmt = $this->pdo->query($req);
        return $stmt->fetch()[0];
    }

    public function getDiagByid($id)
    {
        $req = "SELECT Diagnostic FROM ticket WHERE ticketId={$id}";
        $stmt = $this->pdo->query($req);
        $result = $stmt->fetch();
        return $result[0];
    }
    public function clotureExist($id)
    {
        $req = "SELECT count(ticket_id) FROM cloture WHERE ticket_id={$id}";
        $stmt = $this->pdo->query($req);
        $result = $stmt->fetch();
        return $result[0];
    }
    public function cloture($id, $diag)
    {
        $this->updateDiag($id, $diag);
        if ($this->clotureExist($id) == 0) {
            $req = "INSERT INTO cloture VALUES(null,{$id},'{$_SESSION['email']}',now())";
            $stmt = $this->pdo->exec($req);
            return $stmt;
        }
    }
    public function updateDiag($id, $diag)
    {
        $req = "UPDATE ticket SET Diagnostic='{$diag}',Status='Cloture' WHERE ticketId={$id}";
        $stmt = $this->pdo->exec($req);
        return $stmt;
    }
    public function getClotureStat()
    {
        $req = "SELECT count(cloture_id) as x, DATE(dateheur) as y FROM cloture GROUP BY DATE(dateheur);";
        $stmt = $this->pdo->query($req);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return  $result;
    }
    public function getTicketByContact($contact)
    {

        $req = "SELECT 
        t.ticketId, 
        t.demande, 
        t.DateHeure, 
        s.nom AS societe_nom, 
        t.Diagnostic, 
        a.nom AS account_nom, 
        t.Categorie, 
        t.Priorite, 
        t.Status,
        c.cloture_par,
        c.dateheur AS cloture_dateheur
    FROM 
        ticket t
    JOIN 
        account a ON a.email = t.contact
    JOIN 
        societe s ON s.id = a.centre
    LEFT JOIN
        cloture c ON c.ticket_id = t.ticketId
 where t.contact='{$contact}'
 order by t.DateHeure desc
 
 ;";

        $stmt = $this->pdo->prepare($req);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_NUM);
    }
    function supprimer($id)
    {
        $req = "DELETE FROM ticket WHERE ticketId={$id}";
        $stmt = $this->pdo->exec($req);
        return $stmt;
    }


    function getTopTicket()
    {
        $req = "select * from ticket order by DateHeure desc limit 9;";
        $stmt = $this->pdo->query($req);
        return $stmt->fetchAll(PDO::FETCH_NUM);
    }

    function getTotalTickets()
    {
        $req = "SELECT count(ticketId) FROM ticket";
        $stmt = $this->pdo->query($req);
        return $stmt->fetch()[0];
    }
}
