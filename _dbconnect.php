<?php

$hostname="localhost";
$username="root";
$password="";
$database="ticketbookingsystem";

$conn = mysqli_connect($hostname,$username,$password,$database);
if(!$conn)
{
    echo "Error in connection".mysqli_connect_error($conn);
}
else
{
    // echo "Successfully Connected!!";
}


?>