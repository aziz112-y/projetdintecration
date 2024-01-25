<?php
if (isset($_GET['token'])) {
    $token = $_GET['token'];
} else {
    header("Location: ../../index.php");
}

?>


<!DOCTYPE html>
<html class="no-js" lang="en" dir="ltr">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <title>Verification</title>
    <link rel="icon" href="https://pixelwibes.com/template/my-task/html/dist/favicon.ico" type="image/x-icon"> <!-- Favicon-->
    <!-- project css file  -->
    <link rel="stylesheet" href="controller\compte\__ My-Task__ Two Step_files/my-task.style.min.css">



    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verification</title>
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="assets/css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body onload="reload()" data-mytask="theme-indigo" id='col'>
    <!-- <div class="container"> -->
        <!-- <div class="card o-hidden border-0 shadow-lg my-5"> -->
            <!-- <div class="card-body p-0"> -->
                <!-- <div class="col" id='col'> -->
                    
                <!-- </div> -->
            <!-- </div> -->
        <!-- </div> -->
    <!-- </div>  -->


    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="assets/js/sb-admin-2.min.js"></script>
    <script>
        const xhttp = new XMLHttpRequest();

        function reload() {
            xhttp.onreadystatechange = function() {
                if (this.readyState === 4 && this.status === 200) {
                    document.getElementById("col").innerHTML = this.responseText;
                }
            };

            xhttp.open("GET", "http://localhost:4000/controller/compte/verification.php?token=<?php echo $token; ?>", true);
            xhttp.send();
        }
    </script>
</body>

</html>