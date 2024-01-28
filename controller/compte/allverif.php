<?php
require_once '../../crud/Crud_account.php';
$crud = new CRUD();
$comptes = $crud->listerNonVerif();
json_encode($comptes);
foreach ($comptes as $compte) {

?>
    <div class="col">
        <div class="card teacher-card mr-1">
            <div class="card-body d-flex">
                <div class="profile-av pe-xl-4 pe-md-2 pe-sm-4 pe-4 text-center w220">
                    <img src="assets/profile/<?php echo $compte[8]; ?>.png" alt="" class="avatar xl rounded-circle img-thumbnail shadow-sm">
                    <div class="about-info d-flex align-items-center mt-1 justify-content-center flex-column">
                        <h6 class="mb-0 fw-bold d-block fs-6 mt-2"><?php echo $compte[5]; ?></h6>
                        <div class="btn-group mt-2" role="group" aria-label="Basic outlined example">
                            <a href="editprofile.php?id=<?php echo $compte[10]; ?>"><button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#editproject"><i class="icofont-edit text-success"></i></button></a>
                            <a href="supprimer.php?id=<?php echo $compte[10]; ?>"><button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#deleteproject"><i class="icofont-ui-delete text-danger"></i></button></a>

                        </div>
                    </div>
                </div>
                <div class="teacher-info border-start ps-xl-4 ps-md-3 ps-sm-4 ps-4 w-100">
                    <h6 class="mb-0 mt-2  fw-bold d-block fs-6"><?php echo $compte[0] . ' ' . $compte[1]; ?></h6>
                    <span class="py-1 fw-bold small-11 mb-0 mt-1 text-muted"><?php echo $compte[2] ?></span>
                    <div class="video-setting-icon mt-3 pt-3 border-top">
                        <p><?php echo $compte[3] ?></p>
                    </div>
                    <div class="d-flex flex-wrap align-items-center ct-btn-set">
                        <a href="profile.php?id=<?php echo $compte[10] ?>" class="btn btn-dark btn-sm mt-1"><i class="icofont-invisible me-2 fs-6"></i>Profile</a>
                    </div>
                </div>
            </div>

        </div>
    </div>




<?php
}
?>