<?php 
    include_once "_dbconnect.php"; 
    $delete=false;
    $pnr;
    if(isset($_GET['pnr'])){
        $pnr=$_GET['pnr'];
        $sql="SELECT * FROM `ticket_details` WHERE `PNR`=$pnr";
        $result=mysqli_query($conn,$sql);
        if($result)
        {
            $row=mysqli_fetch_assoc($result);
            $source=$row['Source_Station'];
            $destination=$row['Destination_Station'];
        }
        $sql="UPDATE `ticket_details` SET `Status` = 'Cancelled' WHERE `PNR` = $pnr";
        $result=mysqli_query($conn,$sql);
        if($result)
        {
            $delete=true;

            if($source=='CSMT' and $destination=='ADI')
            {
                $sql="UPDATE `seats_availaibility` SET `Seats`=Seats+1 WHERE (ID IN (1,2,3,4) and Seats>0 )";
                $result=mysqli_query($conn,$sql);
            }

            elseif($source=='CSMT' and $destination=='VGLB')
            {
                $sql="UPDATE `seats_availaibility` SET `Seats`=Seats+1 WHERE (ID IN (1,2,3,4,5,6,7) and Seats>0 )";
                $result=mysqli_query($conn,$sql);
            }

            elseif($source=='CSMT' and $destination=='RNC')
            {
                $sql="UPDATE `seats_availaibility` SET `Seats`=Seats+1 WHERE (ID IN (1,2,3,4,5,6,7,8,9) and Seats>0 )";
                $result=mysqli_query($conn,$sql);
            }
            
            elseif($source=='CSMT' and $destination=='HWRH')
            {
                $sql="UPDATE `seats_availaibility` SET `Seats`=Seats+1 WHERE (ID IN (1,2,3,4,5,6,7,8,9,10) and Seats>0 )";
                $result=mysqli_query($conn,$sql);
            }
            
            elseif($source=='ADI' and $destination=='VGLB')
            {
                $sql="UPDATE `seats_availaibility` SET `Seats`=Seats+1 WHERE (ID IN (2,3,4,5,6,7) and Seats>0 )";
                $result=mysqli_query($conn,$sql);
            }
            
            elseif($source=='ADI' and $destination=='RNC')
            {
                $sql="UPDATE `seats_availaibility` SET `Seats`=Seats+1 WHERE (ID IN (2,3,4,5,6,7,8,9) and Seats>0 )";
                $result=mysqli_query($conn,$sql);
            }
            
            elseif($source=='ADI' and $destination=='HWRH')
            {
                $sql="UPDATE `seats_availaibility` SET `Seats`=Seats+1 WHERE (ID IN (2,3,4,5,6,7,8,9,10) and Seats>0 )";
                $result=mysqli_query($conn,$sql);
            }
            
            elseif($source=='VGLB' and $destination=='RNC')
            {
                $sql="UPDATE `seats_availaibility` SET `Seats`=Seats+1 WHERE (ID IN (3,4,6,7,8,9) and Seats>0 )";
                $result=mysqli_query($conn,$sql);
            }
            
            elseif($source=='VGLB' and $destination=='HWRH')
            {
                $sql="UPDATE `seats_availaibility` SET `Seats`=Seats+1 WHERE (ID IN (3,4,6,7,8,9,10) and Seats>0 )";
                $result=mysqli_query($conn,$sql);
            }
            
            elseif($source=='RNC' and $destination=='HWRH')
            {
                $sql="UPDATE `seats_availaibility` SET `Seats`=Seats+1 WHERE (ID IN (4,7,9,10) and Seats>0 )";
                $result=mysqli_query($conn,$sql);
            }

            elseif($source=='HWRH' and $destination=='RNC')
            {
                $sql="UPDATE `seats_availaibility` SET `Seats`=Seats+1 WHERE (ID IN (11,12,13,14) and Seats>0 )";
                $result=mysqli_query($conn,$sql);
            }

            elseif($source=='HWRH' and $destination=='VGLB')
            {
                $sql="UPDATE `seats_availaibility` SET `Seats`=Seats+1 WHERE (ID IN (11,12,13,14,15,16,17) and Seats>0 )";
                $result=mysqli_query($conn,$sql);
            }

            elseif($source=='HWRH' and $destination=='ADI')
            {
                $sql="UPDATE `seats_availaibility` SET `Seats`=Seats+1 WHERE (ID IN (11,12,13,14,15,16,17,18,19) and Seats>0 )";
                $result=mysqli_query($conn,$sql);
            }

            elseif($source=='HWRH' and $destination=='CSMT')
            {
                $sql="UPDATE `seats_availaibility` SET `Seats`=Seats+1 WHERE (ID IN (11,12,13,14,15,16,17,18,19,20) and Seats>0 )";
                $result=mysqli_query($conn,$sql);
            }

            elseif($source=='RNC' and $destination=='VGLB')
            {
                $sql="UPDATE `seats_availaibility` SET `Seats`=Seats+1 WHERE (ID IN (12,13,14,15,16,17) and Seats>0 )";
                $result=mysqli_query($conn,$sql);
            }

            elseif($source=='RNC' and $destination=='ADI')
            {
                $sql="UPDATE `seats_availaibility` SET `Seats`=Seats+1 WHERE (ID IN (12,13,14,15,16,17,18,19) and Seats>0 )";
                $result=mysqli_query($conn,$sql);
            }

            elseif($source=='RNC' and $destination=='CSMT')
            {
                $sql="UPDATE `seats_availaibility` SET `Seats`=Seats+1 WHERE (ID IN (12,13,14,15,16,17,18,19,20) and Seats>0 )";
                $result=mysqli_query($conn,$sql);
            }
            
            elseif($source=='VGLB' and $destination=='ADI')
            {
                $sql="UPDATE `seats_availaibility` SET `Seats`=Seats+1 WHERE (ID IN (13,14,16,17,18,19) and Seats>0 )";
                $result=mysqli_query($conn,$sql);
            }
            
            elseif($source=='VGLB' and $destination=='CSMT')
            {
                $sql="UPDATE `seats_availaibility` SET `Seats`=Seats+1 WHERE (ID IN (13,14,16,17,18,19,20) and Seats>0 )";
                $result=mysqli_query($conn,$sql);
            }

            elseif($source=='ADI' and $destination=='CSMT')
            {
                $sql="UPDATE `seats_availaibility` SET `Seats`=Seats+1 WHERE (ID IN (14,17,19,20) and Seats>0 )";
                $result=mysqli_query($conn,$sql);
            }

        }
        else
        {
            echo "Error in Deleting!";
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

    <title>Booked Tickets</title>
    <link rel="stylesheet" href="style.css">
    <style>
    footer {
        margin-bottom: ;
    }
    .table .thead-dark th{
        font-size: medium;
    }
    </style>
</head>

<body>
    <?php include "_header.php"; ?>
    <?php
    if($delete)
    {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success! </strong> Your ticket has been deleted Successfully with PNR <strong>'.$pnr.'</strong>
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
    <?php
        $sql="SELECT * FROM `ticket_details`";
        $result=mysqli_query($conn,$sql);
        if($result)
        {
            echo '<table class="table my-3">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">PNR</th>
                    <th scope="col">Passenger Name</th>
                    <th scope="col">Train Name</th>
                    <th scope="col">Boarding Station</th>
                    <th scope="col">Destination Station</th>
                    <th scope="col">Status</th>
                    <th scope="col">Price</th>
                    <th scope="col">Cancel Ticket</th>
                </tr>
            </thead>
            <tbody>';
            while($row=mysqli_fetch_assoc($result))
            {
                echo '<tr>
                    <th scope="row">'.$row['PNR'].'</th>
                    <td>'.$row['Passenger_Name'].'</td>
                    <td>'.$row['Train_Number'].' '.$row['Train_Name'].'</td>
                    <td>'.$row['Source_Station'].'</td>
                    <td>'.$row['Destination_Station'].'</td>
                    <td><em>'.$row['Status'].'</em></td>
                    <td>'?>&#8377;<?php echo $row['Price'].'</td>
                    <td><button class="delete btn btn-danger btn-sm" id= d"'.$row['PNR'].'">Cancel</button></td>
                </tr>';
            }
            echo '</tbody>
            </table>';
        }
     include "_footer.php"; ?>

    <script>
    deletes = document.getElementsByClassName('delete');
    Array.from(deletes).forEach((element) => {
        element.addEventListener("click", (e) => {
            console.log("edit", );
            pnr = e.target.id.substr(1, );
            // console.log($pnr);
            if (confirm("Are you sure you want to cancel this Ticket?")) {
                console.log("Yes");
                window.location = `/Assignment/tickets.php?pnr=${pnr}`;
            } else {
                console.log("no");
            }
        })
    })
    </script>

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