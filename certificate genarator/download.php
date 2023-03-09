<?php
require 'connection.php';

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
    <title>Document</title>
</head>

<body>



    <div class="container-fluid bg-primary" style=" border-bottom: black 2px solid;" id="head1">
        <center>
            <h2 class="text" style="padding: 1.1rem;color: whitesmoke;">Genarate Your Own Certificate.</h2>
        </center>
    </div>



    <div class="container"><br>
        <center class="txt m-3 " style="font-weight: bold; font-size: 21px;">Search certificate details Details</center>
        <form action="" method="post" class="form-control">
            <div class="row m-2 ">
                <div class="col-md-8">
                    <input type="text" name="searchs" id="" class="form-control" placeholder="enter email to download certificate" required>
                </div>
                <div class="col-md-4">
                    <button type="submit" class="btn btn-primary justify-content-center" name="search" id="search"><i class="fa fa-search" aria-hidden="true"></i>&nbsp;Search Certificate</button>
                </div>

            </div>
        </form>


        <br><br>
        <table class="table table-dark table-hover table-responsive">
            <!--table headings---->
            <thead>

                <th>NAME</th>
                <th>PHONE</th>
                <th>EMAIL</th>
                <th>DOMAIN</th>
                <th>VID</th>
                <th>DATE OF CREATION</th>
                <th>DOWNLOAD</th>

            </thead>

            <!----table retrive from here----->
            <tbody>
                <?php


                if (isset($_POST['search'])) {
                    $filtervalues = $_POST['searchs'];
                    $query = "SELECT * FROM own WHERE CONCAT(mail) LIKE '%$filtervalues%' ";
                    $query_run = mysqli_query($con, $query);

                    if (mysqli_num_rows($query_run) > 0) {
                        foreach ($query_run as $items) {
                ?>
                            <tr>
                                <td><?= $items['user']; ?></td>
                                <td><?= $items['phone']; ?></td>
                                <td><?= $items['mail']; ?></td>
                                <td><?= $items['domain']; ?></td>
                                <td><?= $items['vid']; ?></td>
                                <td><?= $items['dates']; ?></td>
                                <td><a href="certificate.php?id=<?php echo $items['vid'] . ".png" ?>" class="btn btn-primary"><i class="fa fa-download"></i> download</a></td>
                            </tr>
                        <?php
                        }
                    } else {
                        ?>
                        <tr id="not">
                            <td colspan="8" style="color: white;" class="txt">
                                <center>
                                    <h5>------------- No certificate Details Are Found Please Check Once Again ------------</h5>
                                </center>
                            </td>
                        </tr>
                <?php
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
    </div>





    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>

</html>