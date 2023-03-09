<?php

require 'connection.php';

if (isset($_POST['submit'])) {

    $name = $_POST['username'];
    $phone = $_POST['phone'];
    $domain = $_POST['domain'];
    $mail = $_POST['mail'];
    $verification = bin2hex(random_bytes(10));
    $today = date('Y-M-d');


    $tomorrowUnix = strtotime("-90 day");
    $oldDate = date("Y-M-d", $tomorrowUnix);
    $to = " TO ";
    $site = " url : eswar4.000webhostapp.com/certificate-verification ";
    $file = $verification;
    $font = dirname(__FILE__) . '/arial.ttf';
    $image = imagecreatefrompng("certificate.png");
    $color = imagecolorallocate($image, 255, 255, 255);
    $dcolor =  imagecolorallocate($image, 255, 191, 0);
    //user name
    imagettftext($image, 50, 0, 670, 680, $color, $font, $name);
    //domain name
    imagettftext($image, 40, 0, 690, 925, $dcolor, $font, $domain);
    //verification id
    imagettftext($image, 25, 0, 945, 1019, $color, $font, $verification);
    //date
    imagettftext($image, 22, 0, 700, 1075, $color, $font, $oldDate);

    imagettftext($image, 22, 0, 920, 1075, $color, $font, $to);
    //today
    imagettftext($image, 22, 0, 1030, 1075, $color, $font, $today);
    //url
    imagettftext($image, 25, 0, 600, 1345, $color, $font, $site);
    imagepng($image, "demo/" . $file . ".png");
    imagedestroy($image);

    //user details
    $insert = "insert into own (user,phone,mail,domain,vid) values ('$name' , '$phone','$mail','$domain','$verification');";
    $result = mysqli_query($con, $insert);
    if ($result) {
        echo "<script>alert('Your genarated Successfully')</script>";
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">

    <link rel="shortcut icon" href="../certificate genarator/download.png">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Certificate Genarator</title>
</head>



<style>
    form {
        border-width: 1.9px !important;
        margin-top: 3rem;
        border-color: #fa06c5 !important;
        padding: 1rem !important;
        box-shadow: rgba(0, 0, 0, 0.45) 30px 35px 30px -20px;
        z-index: -1;
    }

    label {
        color: navy;
        font-style: normal;
        font-size: 18px;
        font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
    }

    input {
        border-left: 4px black solid !important;
        border-radius: 20px;
        color: black;
        font-family: 'Times New Roman', Times, serif;
    }

    #b1 {
        color: white !important;
        background: #fa06c5 !important;
        box-shadow: 0 0 20px #ff08d6 !important;
        font-size: 16px;
    }

    #cert {
        background-color: #08B2E7 !important;
        box-shadow: 0 0 20px #08ac98 !important;
        font-size: 16px;
        border-color: #08B2E7 !important;
        color: whitesmoke;
        font-weight: bolder;
        font-family: 'Times New Roman', Times, serif;
    }
</style>









<body>
    <div class="container-fluid bg-primary" style=" border-bottom: black 2px solid;" id="head1">
        <center>
            <h2 class="text" style="padding: 1.1rem;color: whitesmoke;">Genarate Your Own Certificate.</h2>
        </center>
    </div>

    <!------user details---------->

    <div class="user">
        <center>
            <div class="container">
                <form action="" method="post" class="form-control">
                    <div class="row">
                        <label for="" class="m-2"><i class="fa fa-user"></i> User Name</label>
                        <input type="text" name="username" id="" class="form-control m-2" required>
                        <br>
                        <label for="" class="m-2"><i class="fa fa-phone"></i> Phone Number</label>
                        <input type="number" name="phone" id="" class="form-control m-2" required>
                        <br>
                        <label for="" class="m-2"><i class="fa fa-envelope"></i> Email Address</label>
                        <input type="text" name="mail" id="" class="form-control m-2" required>
                        <br>
                        <label for="" class="m-2"><i class="fa fa-bookmark"></i> Project Domain</label>
                        <input type="text" name="domain" id="" class="form-control m-2" required>
                    </div>
                    <br>
                    <div class="row">
                        <button class="form-control btn bg-dark text-white m-2" id="b1" name="submit">Submit And
                            Genarate Certificate</button>
                    </div>
                </form>
            </div>
        </center>
    </div>
    <br>
    <center>
        <div class="container">
            <a href="../certificate genarator/download.php" target="_blank" rel="noopener noreferrer" class="btn btn-info text-white form-control" id="cert">Download My Certificates</a>
        </div>
    </center>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>