<!-- session starts here, also there is including of relevant files -->
<?php
include_once ("config.php");

if (!isset($_SESSION['ID']))
{
    echo'<script>alert("Log in first")</script>';
    header("location: login.php");
}

if (isset($_GET['id'])){
    $service_price = $_GET['id'];
    $int_service_price = (int) filter_var($service_price, FILTER_SANITIZE_NUMBER_INT);
    header("refresh:0; url= http://localhost/HouseHelpApp/Daraja-API/daraja-tutorial-master/index.php?id=".$int_service_price);

}
?>
