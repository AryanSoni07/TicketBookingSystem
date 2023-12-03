<?php include_once "_dbconnect.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous" />

    <title>Booking</title>
    <link rel="stylesheet" href="style.css">


</head>

<body>
    <?php include "_header.php"; ?>
    <div class="conainer text-center top my-3">
        <img src="favicon.jpg" alt="" />
        <h1>Ticket Booking System</h1>
    </div>
    <div class="container box" style="opacity:0.9">
        <h2 class="text-center">Train Details</h2>
        <?php
            $number=$_GET['trainnumber'];
            $source=$_GET['source'];
            $destination=$_GET['destination'];
            $sql="SELECT * FROM `seats_availaibility` WHERE `boarding_station`='$destination' and `destination_station`='$source'";
            $result=mysqli_query($conn,$sql);
            $row=mysqli_fetch_assoc($result);
        echo '<div><strong>Train Number :</strong> '.$number.'</div>
        <div><strong>Train Name :</strong> '.$row['train_name'].'</div>
        <div><strong>Source Station :</strong> '.$source.'</div>
        <div><strong>Destination Station :</strong> '.$destination.'</div>
        <div><strong>Price : </strong>'?>&#8377;<?php echo $row['Price'].'</div>';
        
       echo ' <form action="booking_update.php?source='.$source.'&destination='.$destination.'&trainnumber='.$number.'" method="post" style="margin-left:2%">';
        ?>
            <div class="contaier">
                <h2 class="text-center">Passenger Details</h2>
            </div>
            <div>
                <label for="name" class="form-label-text">Name</label>
                <input type="text" class="form-input-text" id="name"name="name" required />
            </div>
            <div>
                <label for="phone" class="">Mobile</label>
                <input type="test" class="" id="phone" name="phone" minlength="10" maxlength="10" required />
            </div>
            <div>
                <label for="email" class="form-label-text">Email address</label>
                <input type="email" class="form-input-text" id="email" name="email" required />
            </div>

            <button type="submit" class="btn btn-primary">Confirm Booking</button>
        </form>
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