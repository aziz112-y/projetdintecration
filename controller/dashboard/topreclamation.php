<?php

require_once 'dash.php';
foreach($top_ticket as $row){
?>

<div class="py-2 d-flex align-items-center border-bottom flex-wrap">
    <div class="d-flex align-items-center flex-fill">
        <div class="d-flex flex-column ps-3">
            <h6 class="fw-bold mb-0 small-14">
                <?php echo $row[7]; ?>
            </h6>
            <span class="text-muted"><?php echo $row[1]; ?></span>
        </div>
    </div>
    <div class="time-block text-truncate">
        <?php echo $row[5]; ?>
    </div>
</div>
<?php
}?>