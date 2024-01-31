<?php
session_start();
if (isset($_GET["status"])) {
  $st = $_GET["status"];
}
?>

<!doctype html>
<html class="no-js" lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=Edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Tickets</title>
  <link rel="icon" href="favicon.ico" type="image/x-icon"> <!-- Favicon-->
  <!-- plugin css file  -->
  <link rel="stylesheet" href="assets/plugin/datatables/responsive.dataTables.min.css">
  <link rel="stylesheet" href="assets/plugin/datatables/dataTables.bootstrap5.min.css">
  <!-- project css file  -->
  <link rel="stylesheet" href="assets/css/my-task.style.min.css">
</head>

<body onload="table();loadreclamation()" data-mytask="theme-indigo" >

  <div id="mytask-layout">
    <!--header nav-->
    <div class="sidebar px-4 py-4 py-md-5 me-0">
      <div class="d-flex flex-column h-100">
        <a href="index.php" class="mb-0 brand-icon">
          <span class="logo-icon">
            <svg width="35" height="35" fill="currentColor" class="bi bi-clipboard-check" viewBox="0 0 16 16">
              <path fill-rule="evenodd" d="M10.854 7.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708 0z" />
              <path d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1v-1z" />
              <path d="M9.5 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5h3zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3z" />
            </svg>
          </span>
          <span class="logo-text">My-Task</span>
        </a>
        <!-- Menu: main ul -->

        <ul class="menu-list flex-grow-1 mt-3">


          <?php if ($_SESSION['type'] == "client") {
            echo '<li class="collapsed">
                <a class="m-link"  href="ajouterticket.php">
                  <i class="icofont-home fs-5"></i> <span>Nouveau Ticket</span>
                </a>
              </li>';
          } else {
            echo '<li class="collapsed">
                <a class="m-link" data-bs-target="#dashboard-Components" href="dashboard.php">
                  <i class="icofont-home fs-5"></i> <span>Dashboard</span>
                </a>
                <!-- Menu: Sub menu ul -->
              </li>';
          }
          ?>
          <li class="collapsed">
            <a class="m-link active" data-bs-toggle="collapse" data-bs-target="#project-Components" href="tickets.php">
              <i class="icofont-ticket"></i><?php if ($_SESSION['type'] == "client") {
                                              echo "<span>Mes Tickets</span>";
                                            } else {
                                              echo "<span>Tickets</span>";
                                            }
                                            ?>
              <span class="arrow icofont-dotted-down ms-auto text-end fs-5"></span></a>
            <!-- Menu: Sub menu ul -->
            <ul class="sub-menu collapse" id="project-Components">
              <li>
                <a class="ms-link" href="tickets.php"><span>Tout</span></a>
              </li>
              <li>
                <a class="ms-link" href="tickets.php?status=enCours"><span>En Cours</span></a>
              </li>
              <li>
                <a class="ms-link" href="tickets.php?status=Cloture"><span>Complété</span></a>
              </li>
            </ul>
          </li>
          <?php if ($_SESSION['type'] == "client") {
          } else if($_SESSION['type'] == "supervisor") {
            echo '<li class="collapsed">
                <a class="m-link" data-bs-toggle="collapse" data-bs-target="#tikit-Components" href="#"><i class="icofont-users-alt-5"></i> <span>Les Comptes</span>
                  <span class="arrow icofont-dotted-down ms-auto text-end fs-5"></span></a>
                <!-- Menu: Sub menu ul -->
                <ul class="sub-menu collapse" id="tikit-Components">
                  <li>
                    <a class="ms-link" href="comptes.php?type=tout">
                      <span>Tout</span></a>
                  </li>
                  <li>
                    <a class="ms-link" href="comptes.php?type=Client">
                      <span>Client</span></a>
                  </li>
                  <li>
                    <a class="ms-link" href="comptes.php?type=Employee">
                      <span>Employees</span></a>
                  </li>
                </ul>
              </li>
              <li class="collapsed">
                <a class="m-link active" data-bs-toggle="collapse" data-bs-target="#client-Components" href="#"><i class="icofont-user-male"></i> <span>Gestion Comptes</span>
                  <span class="arrow icofont-dotted-down ms-auto text-end fs-5"></span></a>
                <!-- Menu: Sub menu ul -->
                <ul class="sub-menu collapse" id="client-Components">
                  <li>
                    <a class="ms-link" href="ajoutercompte.php">
                      <span>Ajouter Comptes</span></a>
                  </li>
                  <li>
                    <a class="ms-link" href="verifier.php">
                      <span>Verifier Comptes</span></a>
                  </li>
                </ul>
              </li>';
          }else{
            echo '<li class="collapsed">
            <a class="m-link" data-bs-toggle="collapse" data-bs-target="#tikit-Components" href="#"><i class="icofont-users-alt-5"></i> <span>Les Comptes</span>
              <span class="arrow icofont-dotted-down ms-auto text-end fs-5"></span></a>
            <!-- Menu: Sub menu ul -->
            <ul class="sub-menu collapse" id="tikit-Components">
              <li>
                <a class="ms-link" href="comptes.php?type=tout">
                  <span>Tout</span></a>
              </li>
              <li>
                <a class="ms-link" href="comptes.php?type=Client">
                  <span>Client Verifier</span></a>
              </li>
              <li>
                <a class="ms-link" href="verifier.php">
                  <span>Client Non Verifier</span></a>
              </li>
            </ul>
          </li>
            </ul>
          </li>';
          }
          ?>

        </ul>
        <button type="button" class="btn btn-link sidebar-mini-btn text-light">
          <span class="ms-2"><i class="icofont-bubble-right"></i></span>
        </button>
      </div>
    </div>
    <!-- main body area -->
    <div class="main px-lg-4 px-md-4">
      <!-- Body: Header -->
      <div class="header">
        <nav class="navbar py-4">
          <div class="container-xxl">
            <!-- header rightbar icon -->
            <div class="h-right d-flex align-items-center mr-5 mr-lg-0 order-1">
              <!--Help-->
              <?php
              if ($_SESSION["type"] == "supervisor") {
              ?>
                <div class="d-flex">
                  <div class="avatar-list avatar-list-stacked px-3">
                    <img class="avatar rounded-circle" src="assets/images/xs/avatar2.jpg" alt="" />
                    <img class="avatar rounded-circle" src="assets/images/xs/avatar1.jpg" alt="" />
                    <img class="avatar rounded-circle" src="assets/images/xs/avatar3.jpg" alt="" />
                    <img class="avatar rounded-circle" src="assets/images/xs/avatar4.jpg" alt="" />
                    <img class="avatar rounded-circle" src="assets/images/xs/avatar7.jpg" alt="" />
                    <img class="avatar rounded-circle" src="assets/images/xs/avatar8.jpg" alt="" />
                    <a href="ajoutercompte.php"><span class="avatar rounded-circle text-center pointer" data-bs-toggle="modal"><i class="icofont-ui-add"></i></span></a>
                  </div>
                </div>
              <?php
              } ?>
              <!--Notification-->
              <div class="dropdown notifications">
                <a class="nav-link dropdown-toggle pulse" href="#" role="button" data-bs-toggle="dropdown">
                  <i class="icofont-alarm fs-5"></i>
                  <span class="pulse-ring"></span>
                </a>
                <div id="NotificationsDiv" class="dropdown-menu rounded-lg shadow border-0 dropdown-animation dropdown-menu-sm-end p-0 m-0">
                  <div class="card border-0 w380">
                  <div class="card-body">
                    <div class="flex-grow-1" id="reclamation">
                        
                    </div>
                  </div>
                    <a class="card-footer text-center border-top-0" href="tickets.php">
                      Voir Tout les Reclamations</a>
                  </div>
                </div>
              </div>
              <!--Profile-->
              <div class="dropdown user-profile ml-2 ml-sm-3 d-flex align-items-center">
                <div class="u-info me-2">
                  <p class="mb-0 text-end line-height-sm">
                    <span class="font-weight-bold"><?php
                                                    if ($_SESSION["type"] == "supervisor") {
                                                      echo "Superviseur";
                                                    } else {
                                                      echo $_SESSION['nom'] . ' ' . $_SESSION['prenom'];
                                                    }
                                                    ?></span>
                  </p>
                  <small><?php
                          if ($_SESSION["type"] == "supervisor") {
                            echo "Superviseur";
                          } else {
                            if ($_SESSION["type"] == "admin") {
                              echo "Admin";
                            } else {
                              echo "Client";
                            }
                          }
                          ?> Profile</small>
                </div>
                <a class="nav-link dropdown-toggle pulse p-0" href="#" role="button" data-bs-toggle="dropdown" data-bs-display="static">
                  <img class="avatar lg rounded-circle img-thumbnail" src="assets/profile/<?php echo $_SESSION['gender']; ?>.png" alt="profile" />
                </a>

                <div class="dropdown-menu rounded-lg shadow border-0 dropdown-animation dropdown-menu-end p-0 m-0">
                  <div class="card border-0 w280">
                    <div class="card-body pb-0">
                      <div class="d-flex py-1">
                        <img class="avatar rounded-circle" src="assets/profile/<?php echo $_SESSION['gender']; ?>.png" alt="profile" />
                        <div class="flex-fill ms-3">
                          <p class="mb-0">
                            <span class="font-weight-bold"><?php
                                                            if ($_SESSION["type"] == "supervisor") {
                                                              echo "Superviseur";
                                                            } else {
                                                              echo $_SESSION['nom'] . ' ' . $_SESSION['prenom'];
                                                            }
                                                            ?></span>
                          </p>
                          <small class=""><?php echo $_SESSION["email"]; ?></small>
                        </div>
                      </div>
                      <div class="text-center"> <a href="editprofile.php?id=<?php echo $_SESSION['id']; ?>"><BUtton class="btn btn-primary"><i class="icofont-ui-edit"></i></BUtton></a> <a href="profile.php?id=<?php echo $_SESSION['id']; ?>"><BUtton class="btn btn-primary"><i class="icofont-eye-open"></i></BUtton> </a></div>
                      <div>
                        <hr class="dropdown-divider border-dark" />
                      </div>
                    </div>
                    <div class="list-group m-2">
                      <a href="deconnexion.php" class="list-group-item list-group-item-action border-0"><i class="icofont-logout fs-6 me-3"></i>Déconnexion</a>
                      <?php
                      if ($_SESSION["type"] == "supervisor") {
                      ?>
                        <div>
                          <hr class="dropdown-divider border-dark" />
                        </div>
                        <a href="ajoutercompte.php" class="list-group-item list-group-item-action border-0"><i class="icofont-contact-add fs-5 me-3"></i>Ajouter
                          un Compte</a>
                      <?php
                      }
                      ?>

                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- menu toggler -->
            <button class="navbar-toggler p-0 border-0 menu-toggle order-3" type="button" data-bs-toggle="collapse" data-bs-target="#mainHeader">
              <span class="fa fa-bars"></span>
            </button>

            <!-- main menu Search-->
            <div class="order-0 col-lg-4 col-md-4 col-sm-12 col-12 mb-3 mb-md-0">
              <div class="input-group flex-nowrap input-group-lg">
                <button type="button" class="input-group-text" id="addon-wrapping">
                  <i class="fa fa-search"></i>
                </button>
                <input type="search" class="form-control" placeholder="Recherche" aria-label="search" aria-describedby="addon-wrapping" />
                <button type="button" class="input-group-text add-member-top" id="addon-wrappingone" data-bs-toggle="modal" data-bs-target="#addUser">
                  <i class="fa fa-plus"></i>
                </button>
              </div>
            </div>
            <!-- Theme switcher -->
            <div class="form-check form-switch theme-switch">
              <input class="form-check-input fs-6" type="checkbox" role="switch" id="theme-switch" />
            </div>
          </div>
        </nav>
      </div>

      <!-- Body: Body -->
      <div class="body d-flex py-lg-3 py-md-2">
        <div class="container-xxl">
          <div class="row align-items-center">
            <div class="border-0 mb-4">
              <div class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                <h3 class="fw-bold mb-0">Tickets</h3>
                <div class="col-auto d-flex w-sm-100">
                  <a href="ajouterticket.php"><button type="button" class="btn btn-dark btn-set-task w-sm-100" data-bs-toggle="modal"><i class="icofont-plus-circle me-2 fs-6"></i>Add Tickets</button></a>
                </div>
              </div>
            </div>
          </div> <!-- Row end  -->
          <div class="row clearfix g-3">
            <div class="col-sm-12">
              <div class="card mb-3">
                <div class="card-body">
                  <table id="exemple" class="table table-hover align-middle mb-0" style="width:100%">

                  </table>
                </div>
              </div>
            </div>
          </div><!-- Row End -->
        </div>
      </div>

      <!-- Modal Members-->
      <div class="modal fade" id="addUser" tabindex="-1" aria-labelledby="addUserLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title  fw-bold" id="addUserLabel">Employee Invitation</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="inviteby_email">
                <div class="input-group mb-3">
                  <input type="email" class="form-control" placeholder="Email address" id="exampleInputEmail1" aria-describedby="exampleInputEmail1">
                  <button class="btn btn-dark" type="button" id="button-addon2">Sent</button>
                </div>
              </div>
              <div class="members_list">
                <h6 class="fw-bold ">Employee </h6>
                <ul class="list-unstyled list-group list-group-custom list-group-flush mb-0">
                  <li class="list-group-item py-3 text-center text-md-start">
                    <div class="d-flex align-items-center flex-column flex-sm-column flex-md-column flex-lg-row">
                      <div class="no-thumbnail mb-2 mb-md-0">
                        <img class="avatar lg rounded-circle" src="assets/images/xs/avatar2.jpg" alt="">
                      </div>
                      <div class="flex-fill ms-3 text-truncate">
                        <h6 class="mb-0  fw-bold">Rachel Carr(you)</h6>
                        <span class="text-muted">rachel.carr@gmail.com</span>
                      </div>
                      <div class="members-action">
                        <span class="members-role ">Admin</span>
                        <div class="btn-group">
                          <button type="button" class="btn bg-transparent dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="icofont-ui-settings  fs-6"></i>
                          </button>
                          <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="#"><i class="icofont-ui-password fs-6 me-2"></i>ResetPassword</a></li>
                            <li><a class="dropdown-item" href="#"><i class="icofont-chart-line fs-6 me-2"></i>ActivityReport</a></li>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </li>
                  <li class="list-group-item py-3 text-center text-md-start">
                    <div class="d-flex align-items-center flex-column flex-sm-column flex-md-column flex-lg-row">
                      <div class="no-thumbnail mb-2 mb-md-0">
                        <img class="avatar lg rounded-circle" src="assets/images/xs/avatar3.jpg" alt="">
                      </div>
                      <div class="flex-fill ms-3 text-truncate">
                        <h6 class="mb-0  fw-bold">Lucas Baker<a href="#" class="link-secondary ms-2">(Resend invitation)</a></h6>
                        <span class="text-muted">lucas.baker@gmail.com</span>
                      </div>
                      <div class="members-action">
                        <div class="btn-group">
                          <button type="button" class="btn bg-transparent dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                            Members
                          </button>
                          <ul class="dropdown-menu dropdown-menu-end">
                            <li>
                              <a class="dropdown-item" href="#">
                                <i class="icofont-check-circled"></i>

                                <span>All operations permission</span>
                              </a>

                            </li>
                            <li>
                              <a class="dropdown-item" href="#">
                                <i class="fs-6 p-2 me-1"></i>
                                <span>Only Invite & manage team</span>
                              </a>
                            </li>
                          </ul>
                        </div>
                        <div class="btn-group">
                          <button type="button" class="btn bg-transparent dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="icofont-ui-settings  fs-6"></i>
                          </button>
                          <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="#"><i class="icofont-delete-alt fs-6 me-2"></i>Delete Member</a></li>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </li>
                  <li class="list-group-item py-3 text-center text-md-start">
                    <div class="d-flex align-items-center flex-column flex-sm-column flex-md-column flex-lg-row">
                      <div class="no-thumbnail mb-2 mb-md-0">
                        <img class="avatar lg rounded-circle" src="assets/images/xs/avatar8.jpg" alt="">
                      </div>
                      <div class="flex-fill ms-3 text-truncate">
                        <h6 class="mb-0  fw-bold">Una Coleman</h6>
                        <span class="text-muted">una.coleman@gmail.com</span>
                      </div>
                      <div class="members-action">
                        <div class="btn-group">
                          <button type="button" class="btn bg-transparent dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                            Members
                          </button>
                          <ul class="dropdown-menu dropdown-menu-end">
                            <li>
                              <a class="dropdown-item" href="#">
                                <i class="icofont-check-circled"></i>

                                <span>All operations permission</span>
                              </a>
                            </li>
                            <li>
                              <a class="dropdown-item" href="#">
                                <i class="fs-6 p-2 me-1"></i>
                                <span>Only Invite & manage team</span>
                              </a>
                            </li>
                          </ul>
                        </div>
                        <div class="btn-group">
                          <div class="btn-group">
                            <button type="button" class="btn bg-transparent dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                              <i class="icofont-ui-settings  fs-6"></i>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end">
                              <li><a class="dropdown-item" href="#"><i class="icofont-ui-password fs-6 me-2"></i>ResetPassword</a></li>
                              <li><a class="dropdown-item" href="#"><i class="icofont-chart-line fs-6 me-2"></i>ActivityReport</a></li>
                              <li><a class="dropdown-item" href="#"><i class="icofont-delete-alt fs-6 me-2"></i>Suspend member</a></li>
                              <li><a class="dropdown-item" href="#"><i class="icofont-not-allowed fs-6 me-2"></i>Delete Member</a></li>
                            </ul>
                          </div>
                        </div>
                      </div>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>


  </div>

  <!-- Jquery Core Js -->
  <script src="assets/bundles/libscripts.bundle.js"></script>

  <!-- Plugin Js-->
  <script src="assets/bundles/dataTables.bundle.js"></script>

  <!-- Jquery Page Js -->
  <script src="js/template.js"></script>
  <script>
    function loadreclamation() {
      const xhttp = new XMLHttpRequest();
      xhttp.onload = function() {
        document.getElementById("reclamation").innerHTML = this.responseText;

      }
      xhttp.open("GET", "controller/dashboard/topreclamation.php", true);
      xhttp.send();
    }
    function table() {
      const xhttp = new XMLHttpRequest();
      xhttp.onload = function() {
        document.getElementById("exemple").innerHTML = this.responseText;
      }
      <?php
      if (isset($_GET["status"])) {
      ?>xhttp.open("GET", "controller/ticket/gettickets.php?status=<?php echo $st ?>");
    <?php
      } else {
    ?>
      xhttp.open("GET", "controller/ticket/gettickets.php");
    <?php
      } ?>
    xhttp.send();

    }
    setInterval(table, 6000);
  </script>
</body>


</html>