<?php
//get connection from DB
$con = mysqli_connect("localhost", "root", "", "ewagon");
if(mysqli_connect_errno())
{
	echo "Error ".mysqli_connect_error();
}
function connectDB()
{
    global $con;
}
?>