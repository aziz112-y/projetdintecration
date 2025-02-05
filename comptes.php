<?php
session_start();
if (isset($_SESSION["email"])) {
  if ($_SESSION["type"] == "client") {
    header("location:index.php");
  }
} else {
  header("location:index.php");
}

?>
<!doctype html>
<html class="no-js" lang="en" dir="ltr" data-theme="light">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=Edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Comptes</title>
  <link rel="icon" href="favicon.ico" type="image/x-icon"> <!-- Favicon-->
  <link rel="stylesheet" href="assets/plugin/datatables/responsive.dataTables.min.css">
  <link rel="stylesheet" href="assets/plugin/datatables/dataTables.bootstrap5.min.css">
  <link rel="stylesheet" href="assets/css/my-task.style.min.css">
  <script charset="utf-8" src="https://embed.tawk.to/_s/v4/app/65839862293/js/twk-chunk-2c776523.js"></script>
  <script charset="utf-8" src="https://embed.tawk.to/_s/v4/app/65839862293/js/twk-chunk-9294da6c.js"></script>
  <script charset="utf-8" src="https://embed.tawk.to/_s/v4/app/65839862293/js/twk-chunk-2d0b383d.js"></script>
  <script charset="utf-8" src="https://embed.tawk.to/_s/v4/app/65839862293/js/twk-chunk-48f3b594.js"></script>
  <script charset="utf-8" src="https://embed.tawk.to/_s/v4/app/65839862293/js/twk-chunk-4fe9d5dd.js"></script>
  <script charset="utf-8" src="https://embed.tawk.to/_s/v4/app/65839862293/js/twk-chunk-2d0b9454.js"></script>
  <script charset="utf-8" src="https://embed.tawk.to/_s/v4/app/65839862293/js/twk-chunk-24d8db78.js"></script>
  <style type="text/css">
    #un3g1m7horv81706068354275 {
      outline: none !important;
      visibility: visible !important;
      resize: none !important;
      box-shadow: none !important;
      overflow: visible !important;
      background: none !important;
      opacity: 1 !important;
      filter: alpha(opacity=100) !important;
      -ms-filter: progid:DXImageTransform.Microsoft.Alpha(Opacity 1) !important;
      -mz-opacity: 1 !important;
      -khtml-opacity: 1 !important;
      top: auto !important;
      right: 0px !important;
      bottom: 0px !important;
      left: auto !important;
      position: fixed !important;
      border: 0 !important;
      min-height: 0px !important;
      min-width: 0px !important;
      max-height: none !important;
      max-width: none !important;
      padding: 0px !important;
      margin: 0px !important;
      -moz-transition-property: none !important;
      -webkit-transition-property: none !important;
      -o-transition-property: none !important;
      transition-property: none !important;
      transform: none !important;
      -webkit-transform: none !important;
      -ms-transform: none !important;
      width: auto !important;
      height: auto !important;
      display: none !important;
      z-index: 2000000000 !important;
      background-color: transparent !important;
      cursor: none !important;
      float: none !important;
      border-radius: unset !important;
      pointer-events: auto !important;
      clip: auto !important;
      color-scheme: light !important;
    }

    #un3g1m7horv81706068354275.widget-hidden {
      display: none !important;
    }

    #un3g1m7horv81706068354275.widget-visible {
      display: block !important;
    }

    @media print {
      #un3g1m7horv81706068354275.widget-visible {
        display: none !important;
      }
    }
  </style>
  <style type="text/css">
    @keyframes tawkMaxOpen {
      0% {
        opacity: 0;
        transform: translate(0, 30px);
        ;
      }

      to {
        opacity: 1;
        transform: translate(0, 0px);
      }
    }

    @-moz-keyframes tawkMaxOpen {
      0% {
        opacity: 0;
        transform: translate(0, 30px);
        ;
      }

      to {
        opacity: 1;
        transform: translate(0, 0px);
      }
    }

    @-webkit-keyframes tawkMaxOpen {
      0% {
        opacity: 0;
        transform: translate(0, 30px);
        ;
      }

      to {
        opacity: 1;
        transform: translate(0, 0px);
      }
    }

    #xqdhu4eu1tp81706068354316.open {
      animation: tawkMaxOpen .25s ease !important;
    }

    @keyframes tawkMaxClose {
      from {
        opacity: 1;
        transform: translate(0, 0px);
        ;
      }

      to {
        opacity: 0;
        transform: translate(0, 30px);
        ;
      }
    }

    @-moz-keyframes tawkMaxClose {
      from {
        opacity: 1;
        transform: translate(0, 0px);
        ;
      }

      to {
        opacity: 0;
        transform: translate(0, 30px);
        ;
      }
    }

    @-webkit-keyframes tawkMaxClose {
      from {
        opacity: 1;
        transform: translate(0, 0px);
        ;
      }

      to {
        opacity: 0;
        transform: translate(0, 30px);
        ;
      }
    }

    #xqdhu4eu1tp81706068354316.closed {
      animation: tawkMaxClose .25s ease !important
    }
  </style>
</head>

<body onload="table();loadreclamation()" data-mytask="theme-indigo">

  <div id="mytask-layout">
    <!--header nav-->
    <div class="sidebar px-4 py-4 py-md-5 me-0">
      <div class="d-flex flex-column h-100">
        <a href="index.php" class="mb-0 brand-icon">
          <span class="logo-icon">
            <svg width="35" height="35" fill="currentColor" class="bi bi-clipboard-check" viewBox="0 0 16 16">
              <path fill-rule="evenodd" d="M10.854 7.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708 0z"></path>
              <path d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1v-1z"></path>
              <path d="M9.5 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5h3zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3z"></path>
            </svg>
          </span>
          <span class="logo-text">My-Task</span>
        </a>
        <!-- Menu: main ul -->

        <ul class="menu-list flex-grow-1 mt-3">


          <li class="collapsed">
            <a class="m-link" data-bs-target="#dashboard-Components" href="dashboard.php">
              <i class="icofont-home fs-5"></i> <span>Dashboard</span>
            </a>
            <!-- Menu: Sub menu ul -->
          </li>
          <li class="collapsed">
            <a class="m-link" data-bs-toggle="collapse" data-bs-target="#project-Components" href="tickets.php">
              <i class="icofont-ticket"></i><span>Tickets</span> <span class="arrow icofont-dotted-down ms-auto text-end fs-5"></span></a>
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
                <a class="m-link active" data-bs-toggle="collapse" data-bs-target="#tikit-Components" href="#"><i class="icofont-users-alt-5"></i> <span>Les Comptes</span>
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
                <a class="m-link" data-bs-toggle="collapse" data-bs-target="#client-Components" href="#"><i class="icofont-user-male"></i> <span>Gestion Comptes</span>
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
            <a class="m-link active" data-bs-toggle="collapse" data-bs-target="#tikit-Components" href="#"><i class="icofont-users-alt-5"></i> <span>Les Comptes</span>
              <span class="arrow icofont-dotted-down ms-auto text-end fs-5"></span></a>
            <!-- Menu: Sub menu ul -->
            <ul class="sub-menu collapse" id="tikit-Components">
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
                                                    if ($_SESSION['type'] == "supervisor") {
                                                      echo "Superviseur";
                                                    } else {
                                                      echo $_SESSION['nom'] . ' ' . $_SESSION['prenom'];
                                                    }
                                                    ?></span>
                  </p>
                  <small><?php
                          if (isset($_SESSION['type'])) {
                            if ($_SESSION['type'] == "supervisor") {
                              echo "Superviseur";
                            } else {
                              echo "Admin";  // Corrected from "Supervisor"
                            }
                          } else {
                            echo "Client";
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
                <input type="search" class="form-control" placeholder="Recherche" aria-label="search" aria-describedby="addon-wrapping">
                <button type="button" class="input-group-text add-member-top" id="addon-wrappingone" data-bs-toggle="modal" data-bs-target="#addUser">
                  <i class="fa fa-plus"></i>
                </button>
              </div>
            </div>
            <!-- Theme switcher -->
            <div class="form-check form-switch theme-switch">
              <input class="form-check-input fs-6" type="checkbox" role="switch" id="theme-switch">
            </div>
          </div>
        </nav>
      </div>

      <!-- Body: Body -->
      <div class="body d-flex py-lg-3 py-md-2">
        <div class="container-xxl">
          <div class="row clearfix">
            <div class="col-md-12">
              <div class="card border-0 mb-4 no-bg">
                <div class="card-header py-3 px-0 d-flex align-items-center  justify-content-between border-bottom">
                  <?php
                  if (isset($_GET['type'])) {
                    echo '<h6 class="mb-0 fw-bold">' . $_GET['type'] . 's</h6>';
                  } else {
                    echo '<h6 class="mb-0 fw-bold">Tout les Comptes</h6>';
                  }
                  ?>
                  <div class="col-auto d-flex">
                  <?php
                  if($_SESSION["type"]=='supervisor'){
                    echo'                  <a href="ajoutercompte.php"><button type="button" class="btn btn-dark ms-1 " data-bs-toggle="modal" data-bs-target="#createproject"><i class="icofont-plus-circle me-2 fs-6"></i>Add Client</button></a>';
                  }
                  ?>
                  </div>
                </div>
              </div>
            </div>
          </div><!-- Row End -->
          <div class="row g-3 row-cols-1 row-cols-sm-1 row-cols-md-1 row-cols-lg-2 row-cols-xl-2 row-cols-xxl-2 row-deck py-1 pb-4" id="table">

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
    function table() {
      const xhttp = new XMLHttpRequest();
      xhttp.onload = function() {
        document.getElementById("table").innerHTML = this.responseText;
      }
      if (<?php echo isset($_GET['type']) ?>) {
        xhttp.open("GET", "controller/compte/getComptes.php?type=<?php echo $_GET['type'] ?>");
      } else {
        xhttp.open("GET", "controller/compte/getComptes.php?type=tout");
      }
      xhttp.send();

    }
    setInterval(table, 6000);
    function loadreclamation() {
      const xhttp = new XMLHttpRequest();
      xhttp.onload = function() {
        document.getElementById("reclamation").innerHTML = this.responseText;

      }
      xhttp.open("GET", "controller/dashboard/topreclamation.php", true);
      xhttp.send();
    }
  </script>




  <script async="" charset="UTF-8" src="https://embed.tawk.to/_s/v4/app/65839862293/languages/en.js">

  </script>
</body>

</html>