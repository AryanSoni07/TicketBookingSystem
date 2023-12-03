<?php

    include_once "_dbconnect.php";
    $confirm=false; 
    $passenger_name=$_POST['name'];
    $phone=$_POST['phone'];
    $email=$_POST['email'];
    $trainnumber=$_GET['trainnumber'];
    $source=$_GET['source'];
    $destination=$_GET['destination'];
    $sql="SELECT * FROM `seats_availaibility` WHERE `boarding_station`='$source' AND `destination_station`='$destination' AND train_number='$trainnumber'";
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_assoc($result);
    $train_name=$row['train_name'];
    $seats=$row['Seats'];
    $price=$row['Price'];
    if($seats>0)
    {

        
        $sqlinsert="INSERT INTO `ticket_details` (`Train_Name`, `Train_Number`, `Price`, `Passenger_Name`, `Email`, `Source_Station`, `Destination_Station`, `Status`, `Phone`) VALUES ('$train_name', '$trainnumber', '$price', '$passenger_name', '$email', '$source', '$destination', 'Confirmed', '$phone')";
        $result=mysqli_query($conn,$sqlinsert);
        if($result)
        {
            if($source=='CSMT' and $destination=='ADI')
            {
                $sql="UPDATE `seats_availaibility` SET `Seats`=Seats-1 WHERE (ID IN (1,2,3,4) and Seats>0 )";
                $result=mysqli_query($conn,$sql);
            }

            elseif($source=='CSMT' and $destination=='VGLB')
            {
                $sql="UPDATE `seats_availaibility` SET `Seats`=Seats-1 WHERE (ID IN (1,2,3,4,5,6,7) and Seats>0 )";
                $result=mysqli_query($conn,$sql);
            }

            elseif($source=='CSMT' and $destination=='RNC')
            {
                $sql="UPDATE `seats_availaibility` SET `Seats`=Seats-1 WHERE (ID IN (1,2,3,4,5,6,7,8,9) and Seats>0 )";
                $result=mysqli_query($conn,$sql);
            }
            
            elseif($source=='CSMT' and $destination=='HWRH')
            {
                $sql="UPDATE `seats_availaibility` SET `Seats`=Seats-1 WHERE (ID IN (1,2,3,4,5,6,7,8,9,10) and Seats>0 )";
                $result=mysqli_query($conn,$sql);
            }
            
            elseif($source=='ADI' and $destination=='VGLB')
            {
                $sql="UPDATE `seats_availaibility` SET `Seats`=Seats-1 WHERE (ID IN (2,3,4,5,6,7) and Seats>0 )";
                $result=mysqli_query($conn,$sql);
            }
            
            elseif($source=='ADI' and $destination=='RNC')
            {
                $sql="UPDATE `seats_availaibility` SET `Seats`=Seats-1 WHERE (ID IN (2,3,4,5,6,7,8,9) and Seats>0 )";
                $result=mysqli_query($conn,$sql);
            }
            
            elseif($source=='ADI' and $destination=='HWRH')
            {
                $sql="UPDATE `seats_availaibility` SET `Seats`=Seats-1 WHERE (ID IN (2,3,4,5,6,7,8,9,10) and Seats>0 )";
                $result=mysqli_query($conn,$sql);
            }
            
            elseif($source=='VGLB' and $destination=='RNC')
            {
                $sql="UPDATE `seats_availaibility` SET `Seats`=Seats-1 WHERE (ID IN (3,4,6,7,8,9) and Seats>0 )";
                $result=mysqli_query($conn,$sql);
            }
            
            elseif($source=='VGLB' and $destination=='HWRH')
            {
                $sql="UPDATE `seats_availaibility` SET `Seats`=Seats-1 WHERE (ID IN (3,4,6,7,8,9,10) and Seats>0 )";
                $result=mysqli_query($conn,$sql);
            }
            
            elseif($source=='RNC' and $destination=='HWRH')
            {
                $sql="UPDATE `seats_availaibility` SET `Seats`=Seats-1 WHERE (ID IN (4,7,9,10) and Seats>0 )";
                $result=mysqli_query($conn,$sql);
            }

            elseif($source=='HWRH' and $destination=='RNC')
            {
                $sql="UPDATE `seats_availaibility` SET `Seats`=Seats-1 WHERE (ID IN (11,12,13,14) and Seats>0 )";
                $result=mysqli_query($conn,$sql);
            }

            elseif($source=='HWRH' and $destination=='VGLB')
            {
                $sql="UPDATE `seats_availaibility` SET `Seats`=Seats-1 WHERE (ID IN (11,12,13,14,15,16,17) and Seats>0 )";
                $result=mysqli_query($conn,$sql);
            }

            elseif($source=='HWRH' and $destination=='ADI')
            {
                $sql="UPDATE `seats_availaibility` SET `Seats`=Seats-1 WHERE (ID IN (11,12,13,14,15,16,17,18,19) and Seats>0 )";
                $result=mysqli_query($conn,$sql);
            }

            elseif($source=='HWRH' and $destination=='CSMT')
            {
                $sql="UPDATE `seats_availaibility` SET `Seats`=Seats-1 WHERE (ID IN (11,12,13,14,15,16,17,18,19,20) and Seats>0 )";
                $result=mysqli_query($conn,$sql);
            }

            elseif($source=='RNC' and $destination=='VGLB')
            {
                $sql="UPDATE `seats_availaibility` SET `Seats`=Seats-1 WHERE (ID IN (12,13,14,15,16,17) and Seats>0 )";
                $result=mysqli_query($conn,$sql);
            }

            elseif($source=='RNC' and $destination=='ADI')
            {
                $sql="UPDATE `seats_availaibility` SET `Seats`=Seats-1 WHERE (ID IN (12,13,14,15,16,17,18,19) and Seats>0 )";
                $result=mysqli_query($conn,$sql);
            }

            elseif($source=='RNC' and $destination=='CSMT')
            {
                $sql="UPDATE `seats_availaibility` SET `Seats`=Seats-1 WHERE (ID IN (12,13,14,15,16,17,18,19,20) and Seats>0 )";
                $result=mysqli_query($conn,$sql);
            }
            
            elseif($source=='VGLB' and $destination=='ADI')
            {
                $sql="UPDATE `seats_availaibility` SET `Seats`=Seats-1 WHERE (ID IN (13,14,16,17,18,19) and Seats>0 )";
                $result=mysqli_query($conn,$sql);
            }
            
            elseif($source=='VGLB' and $destination=='CSMT')
            {
                $sql="UPDATE `seats_availaibility` SET `Seats`=Seats-1 WHERE (ID IN (13,14,16,17,18,19,20) and Seats>0 )";
                $result=mysqli_query($conn,$sql);
            }

            elseif($source=='ADI' and $destination=='CSMT')
            {
                $sql="UPDATE `seats_availaibility` SET `Seats`=Seats-1 WHERE (ID IN (14,17,19,20) and Seats>0 )";
                $result=mysqli_query($conn,$sql);
            }




            $confirm=true;
            $sql="SELECT * FROM `ticket_details` WHERE `Train_Number`='$trainnumber' AND `Passenger_Name`='$passenger_name' AND `Source_Station`='$source' AND `Destination_Station`='$destination'";
            $result=mysqli_query($conn,$sql);
            if($result)
            {

                $row=mysqli_fetch_assoc($result);
            }
        }
    }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous" />
    <link rel="stylesheet" href="style.css">

    <title>Booking Confirmation</title>

</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="/Assignment/index.php"><img id="nav-img" src="favicon.jpg" alt="image" /></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="/Assignment/index.php">Home</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="/Assignment/tickets.php">Tickets Booked</a>
                </li>
            </ul>
        </div>
    </nav>
    <?php 
        if($confirm)
        {
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> Your ticket has been booked successfully with PNR <strong>'.$row['PNR'].'</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>';
        }
    ?>
    <div class="conainer text-center top my-3">
        <img src="favicon.jpg" alt="" />
        <h1>Ticket Booking System</h1>
    </div>
    <div class="conatiner box" style="margin-left:25%">
        <h2 class="text-center">Ticket Details</h2>
        <?php
        
        echo '<div><strong>PNR : </strong>'.$row['PNR'].'</div>
        <div><strong>Passenger\'s Name  : </strong>'.$row['Passenger_Name'].'</div>
        <div><strong>Train Number : </strong>'.$row['Train_Number'].'</div>
        <div><strong>Train Name : </strong>'.$row['Train_Name'].'</div>
        <div><strong>Boarding Station : </strong>'.$row['Source_Station'].'</div>
        <div><strong>Destination Station : </strong>'.$row['Destination_Station'].'</div>
        <div><strong>Price : </strong>'.$row['Price'].'</div>';
        ?>
        <a href="tickets.php"><button class="btn btn-outline-primary">View All Tickets</button></a>
    </div>

    

    <?php include "_footer.php"; ?>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    -->
</body>

</html>