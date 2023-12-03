<?php 
    include_once "_dbconnect.php"; 
    $showAlert=false;
    if(isset($_GET['source']))
    {
        $source=$_GET['source'];
        $destination=$_GET['destination'];
        if($source===$destination)
        {
            $showAlert=true;
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

    <title>Ticket Booking System</title>

</head>

<body>
    <?php include "_header.php"; ?>

    <?php if($showAlert==true){
            echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Alert!</strong>  Source and Destination Station cannot be same.
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
    <form class="box">
        <div class="form-group col-md-4">
            <label for="inputState">Source Station</label>
            <select id="inputState" class="form-control" name="source">
                <option selected>--Source Station--</option>
                <?php
                $sql="SELECT * FROM `station`";
                $result=mysqli_query($conn,$sql);
                while($row=mysqli_fetch_assoc($result)){
                    echo '<option value="'.$row['station_code'].'">'.$row['station_name'].'</option>';
                }
                ?>
            </select>
        </div>
        <div class="form-group col-md-4">
            <label for="inputState">Destination Station</label>
            <select id="inputState" class="form-control" name="destination">
                <option selected>--Destination Station--</option>
                <?php
                $sql="SELECT * FROM `station`";
                $result=mysqli_query($conn,$sql);
                while($row=mysqli_fetch_assoc($result)){
                    echo '<option value="'.$row['station_code'].'">'.$row['station_name'].'</option>';
                }
                ?>
            </select>
        </div>
        <input type="submit" class="btn btn-outline-primary" value="Check Availaibility"></button>
    </form>
    <?php
    if(isset($_GET['source']))
    {   
        // $source=$_GET['source'];
        // $destination=$_GET['destination'];
        // if($source===$destination)
        // {
        //     $showAlert=true;
        // }
        $sql = "SELECT * FROM `seats_availaibility` WHERE `boarding_station`='$source' AND `destination_station`='$destination'";
        $result=mysqli_query($conn,$sql);
        if($result)
        {
            echo '<table class="table my-3">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Train Number</th>
                        <th scope="col">Train Name</th>
                        <th scope="col">Seats Available</th>
                        <th scope="col">Price</th>
                        <th scope="col">Book Now</th>
                    </tr>
                </thead>
                <tbody>';
            while($row=mysqli_fetch_assoc($result))
            {
                echo '
                        <tr>
                            <th scope="row">'.$row['train_number'].'</th>
                            <td>'.$row['train_name'].'</td>
                            <td>'.$row['Seats'].'</td>
                            <td>&#8377;'.$row['Price'].'</td>';
                            if($row['Seats']>0)
                            {
                                        echo '<td><a href="booking.php?source='.$source.'&destination='.$destination.'&trainnumber='.$row['train_number'].'"><button type="button" class="btn btn-outline-success">Book Now</button></a>
                                    </td>
                                </tr>';
                            }
                            else{
                                    echo '<td><button type="button" class="btn btn-outline-success" disabled>Book Now</button>
                                    </td>
                                </tr>';
                            }
                            
            }
            echo '</tbody>
            </table>';
        }
        else{
            $showError=True;
        }
    }

    ?>
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