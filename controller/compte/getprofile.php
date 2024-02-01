<?php
require_once("../../CRUD/Crud_account.php");
require_once("../../CRUD/crud_societe.php");
session_start();
$crud = new CRUD();
$soc = new Societe();
$id = $_GET["id"];
$compte = $crud->Afficher($id);

if ($compte) {
    $societe = $soc->getSocieteById($compte[9]);
?>
    <div class="card-body d-flex teacher-fulldeatil">
        <div class="profile-teacher pe-xl-4 pe-md-2 pe-sm-4 pe-4 text-center w220">
            <a href="#">
                <img src="assets/profile/<?php echo $compte[8]; ?>.png" alt="" class="avatar xl rounded-circle img-thumbnail shadow-sm">
            </a>
            <div class="about-info d-flex align-items-center mt-3 justify-content-center flex-column">
                <h6 class="mb-0 fw-bold d-block fs-6"><?php echo $compte[0]  ?></h6>
            </div>
        </div>
        <div class="teacher-info border-start ps-xl-4 ps-md-4 ps-sm-4 ps-4 w-100">
            <h6 class="mb-0 mt-2  fw-bold d-block fs-6"><?php echo htmlspecialchars($compte[0]) . ' ' . htmlspecialchars($compte[1]) ?></h6>
            <span class="py-1 fw-bold small-11 mb-0 mt-1 text-muted"><?php echo htmlspecialchars($compte[5]) ?></span>

            <div class="row g-2 pt-2">
                <div class="col-xl-5">
                    <div class="d-flex align-items-center">
                        <i class="icofont-ui-touch-phone"></i>
                        <span class="ms-2 small"><?php echo htmlspecialchars($compte[3]) ?></span>
                    </div>
                </div>
                <div class="col-xl-5">
                    <div class="d-flex align-items-center">
                        <i class="icofont-email"></i>
                        <span class="ms-2 small"><?php echo htmlspecialchars($compte[2]) ?> </span>
                    </div>
                </div>
                <div class="col-xl-5">
                    <div class="d-flex align-items-center">
                        <i class="icofont-address-book"></i>
                        <span class="ms-2 small"><?php
                                                    echo $societe["adresse"];
                                                    ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
}
