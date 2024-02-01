<?php
require_once "../../model/ticket.php";
$ticket = new Ticket();
require_once "../../CRUD/crudTickets.php";
$crud = new CrudTicket();
if ($_SESSION["type"] == "client") {
  $table = $crud->getTicketByContact($_SESSION["email"]);
} else {
  $table = $crud->getTickets();
  $encour = $crud->getByStatutNum("enCours");
  $fait = $crud->getByStatutNum("Cloture");
}

?>
<thead>
  <tr>
    <th>Numéro de ticket</th>
    <th>Date&Heure</th>
    <th>Demande</th>
    <th>Client</th>
    <th>Diagnostic</th>
    <th>Contact</th>
    <th>Categorie</th>
    <th>Priorité</th>
    <th>Statut</th>
    <?php
    if ($_SESSION['type'] != "client") {
      echo "<th colspan='2'>Action</th>";
    }
    ?>
  </tr>
</thead>
<tbody>
  <?php
  foreach ($table as $row) {
    if (isset($_GET['status'])) {
      $status = $_GET['status'];
      if ($row[8] == $status) {
        echo "<tr>";
        echo "<td >" . $row[0] . "</td>";
        echo "<td>" . $row[2] . "</td>";
        echo "<td>" . $row[1] . "</td>";
        echo "<td>" . $row[3] . "</td>";
        echo "<td>" . $row[4] . "</td>";
        echo "<td>" . $row[5] . "</td>";
        echo "<td>" . $row[6] . "</td>";
        echo "<td>" . $row[7] . "</td>";
        if ($row[8] == "enCours") {
          echo "<td><span class='badge bg-danger'>" . $row[8] . "</span></td>";
        } else {
          echo "<td><span class='badge bg-success'>" . $row[8] . "</span></td>";
        }
        if ($row[8] == "enCours") {
          if ($_SESSION['type'] != "client") {
            echo "<td><a href='cloture.php?id=" . $row[0] . "'><button class='btn btn-primary'>Cloturer</button></a></td>";
          }
        } else {
          if ($row[4] == '') {
            if ($_SESSION['type'] != "client") {
              echo "<td><a href='cloture.php?id=" . $row[0] . "'><button class='btn btn-primary'>Ajouter Diag</button></a></td>";
            }
          } else {
            if ($_SESSION['type'] != "client") {
              echo "<td><a href='cloture.php?id=" . $row[0] . "'><button class='btn btn-primary'>Modifier</button></a></td>";
            }
          }
        }
        echo "</tr>";
      }
    } else {
      echo "<tr>";
      echo "<td>" . $row[0] . "</td>";
      echo "<td>" . $row[2] . "</td>";
      echo "<td>" . $row[1] . "</td>";
      echo "<td>" . $row[3] . "</td>";
      echo "<td>" . $row[4] . "</td>";
      echo "<td>" . $row[5] . "</td>";
      echo "<td>" . $row[6] . "</td>";
      echo "<td>" . $row[7] . "</td>";
      if ($row[8] == "enCours") {
        echo "<td><span class='badge bg-danger'>" . $row[8] . "</span></td>";
      } else {
        echo "<td><span class='badge bg-success'>" . $row[8] . "</span></td>";
      }
      if ($row[8] == "enCours") {
        if ($_SESSION['type'] != "client") {
          echo "<td><a href='cloture.php?id=" . $row[0] . "'><button class='btn btn-primary'>Cloturer</button></a></td>";
        }
      } else {
        if ($row[4] == '') {
          if ($_SESSION['type'] != "client") {
            echo "<td><a href='cloture.php?id=" . $row[0] . "'><button class='btn btn-primary'>Ajouter Diag</button></a></td>";
          }
        } else {
          if ($_SESSION['type'] != "client") {
            echo "<td><a href='cloture.php?id=" . $row[0] . "'><button class='btn btn-primary'>Modifier</button></a></td>";
          }
        }
      }
      echo "</tr>";
    }
  }
  ?>
</tbody>