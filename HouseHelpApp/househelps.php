<?php

require 'config.php';

if(!empty($_SESSION["ID"])){

    $ID = $_SESSION["ID"];
    $result= mysqli_query($conn, "SELECT * FROM users WHERE ID = $ID");
    $row =mysqli_fetch_assoc($result);



    if($_SERVER["REQUEST_METHOD"] == 'POST'){
                

        $house_help_id = $_POST["house_help_id"];
        $user_id = $_POST["user_id"];
        $service_price = $_POST["service_price"];
        $county = $_POST["county"];
        $location = $_POST["location"];
        $house_number = $_POST["house_number"];
        $date = $_POST["date"];
        $start_time = $_POST["start_time"];
        $end_time = $_POST["end_time"];

        echo $end_time;

        
        $query = "INSERT INTO orders (`house_help_id`, `user_id`, `service_price`, `county`, `location`, `house_number`, `date`, `start_time`, `end_time`) VALUES ('$house_help_id', '$user_id','$service_price', '$county', '$location', '$house_number', '$date', '$start_time', '$end_time')";
        mysqli_query($conn, $query);


        $househelp_status = "UPDATE house_helps SET status = 'Engaged' WHERE ID =  $house_help_id";
        mysqli_query($conn, $househelp_status);

 
        echo '<script>alert("Succeful registration")</script>"';
        header("Location: pay_mpesa.php?id=".$_POST['service_price'].";");
        
    
    }



}else{
    header("Location: signin.php");
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="css/style.css">
    <!-- jQuery library -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

<!-- Bootstrap JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

<title>HouseHelps</title>
<style>
    label .menu {
    position: absolute;
    right: -100px;
    top: -80px;
    z-index: 100;
    width: 200px;
    height: 200px;
    border-radius: 50% 50% 50% 50%;
    -webkit-transition: .5s ease-in-out;
    transition: .5s ease-in-out;
    box-shadow: 0 0 0 0 #FFF, 0 0 0 0 #FFF;
    cursor: pointer;
    
    }
        
    label .hamburger {
        position: absolute;
        top: 135px;
        left: 50px;
        width: 30px;
        height: 2px;
        background: #000;
        display: block;
        -webkit-transform-origin: center;
        transform-origin: center;
        -webkit-transition: .5s ease-in-out;
        transition: .5s ease-in-out;
    }
        
    label .hamburger:after, label .hamburger:before {
        -webkit-transition: .5s ease-in-out;
        transition: .5s ease-in-out;
        content: "";
        position: absolute;
        display: block;
        width: 100%;
        height: 100%;
        background: #000;
    }
        
    label .hamburger:before { top: -10px; }
    
    label .hamburger:after { bottom: -10px; }
    
    label input { display: none; }
    
    label input:checked + .menu {
        box-shadow: 0 0 0 100vw #FFF, 0 0 0 100vh #FFF;
        border-radius: 0;
        
    }
    
    label input:checked + .menu .hamburger {
        -webkit-transform: rotate(45deg);
        transform: rotate(45deg);
        
    }
    
    label input:checked + .menu .hamburger:after {
        -webkit-transform: rotate(90deg);
        transform: rotate(90deg);
        bottom: 0;
        
    }
    
    label input:checked + .menu .hamburger:before {
    -webkit-transform: rotate(90deg);
    transform: rotate(90deg);
    top: 0;
        
    }
        
    label input:checked + .menu + ul { opacity: 1; }
    
    label ul {
    z-index: 200;
    position: absolute;
    top: 50%;
    left: 50%;
    -webkit-transform: translate(-50%, -50%);
    transform: translate(-50%, -50%);
    opacity: 0;
    -webkit-transition: .25s 0s ease-in-out;
    transition: .25s 0s ease-in-out;
    list-style-type: none;
    }
    
    label a {
    margin-bottom: 1em;
    display: block;
    color: #000;
    text-decoration: none;
    }
</style>
</head>
<body class="px-5 py-3" width="100%">
    <div class=" flex flex-row">
        <h1 class="font-bold text-2xl">Welcome <?php echo $row["username"] ?></h1> 
        <nav>
            <!--Humberger Menu-->
        <label>
            <input type="checkbox">
            <span class="menu"> <span class="hamburger"></span> </span>
            <ul>
            <li> <a class="text-xl" href="home.php">Home</a> </li>
            <li> <a class="text-xl" href="#">View Househelps</a></li>
            <li> <a class="text-xl" href="order_history.php">View Orders</a></li>
            <li> <a class="text-xl" href="signout.php">Log out</a> </li>
            </ul>
        </label>
        </nav>      
    </div>

    <div class="text-center mt-5">
        <h1 class="font-bold text-4xl text-sky-600">Available Househelps</h1>
    </div>
 
    <div id="container"  width="100%" class="mt-5">
        <div class="grid grid-cols-3 gap-3">
            <?php 
                $h_result= mysqli_query($conn, "SELECT * FROM house_helps where status = 'Available'");
                while($row = mysqli_fetch_assoc($h_result)) {
                        // class="grid grid-cols-3 gap-20 px-10 py-10"
                        //echo "<td class='py-4 px-6'> " . $row["ID"] . "</td>"; 
                        ?>
                        <div class="w-96 px-3 py-5 text-center">
                            <?php
                        echo "<div class= 'flex items-center justify-center'><img class='w-28 rounded-full' src='data:image/jpeg;base64,".base64_encode($row["profile_pic"])."'></div>", "</br>";
                        echo "<p class='font-bold text-xl'> " . $row["name"] . "</p>", "</br>"; 
                        echo "<p class= 'text-lg'>" . $row["email"] . "</p>" , "</br>";
                        echo "<p class= 'text-lg'>" . $row["description"] . "</p>", "</br>";
                        echo "<p class= 'text-lg'>0" . $row["phone_number"] . "</p>", "</br>";
                        echo "<div class='py-4 px-6'><button class='btn btn-primary order-btn' data-ID='" . $row["ID"] . "' data-name='" . $row["name"] . "' data-email='" . $row["email"] . "' data-toggle='modal' data-target='#orderModal'>Order Now</button></div>";
                        ?>
                        </div>
                        <?php
                    }
                    ?>
        </div>
    </div>


<div class="modal fade" id="orderModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" id="orderForm" method="POST">
                    <div class="form-group  hidden">
                        <input type="text" id="house_help_id" name="house_help_id" readonly>
                    </div>

                    <div class="form-group hidden">
                        <input type="text" id="user_id" name="user_id" value="<?php echo $_SESSION["ID"] ?>" readonly>
                    </div>
                    
                    <div class="form-group">
                        <label for="name">Name of house help</label>
                        <input type="text" class="form-control" id="name" name="name" readonly>
                    </div>

                    <div class="form-group">
                        <label for="services">Services</label>
                        <select class="form-control" id="services" name="service_price">
                            <?php
                            $services_sql = "SELECT service, price FROM services";
                            $services_result = mysqli_query($conn, $services_sql);
                            while($services_row = mysqli_fetch_assoc($services_result)) {
                                echo "<option value='" . $services_row["service"] . " = " .$services_row["price"]. "'>" . $services_row["service"] ."->".$services_row["price"]. "</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="name">County</label>
                        <input type="text" class="form-control" name="county" id="county" required>
                    </div>

                    <div class="form-group">
                        <label for="name">Location</label>
                        <input type="text" class="form-control" name="location" id="location" required>
                    </div>

                    <div class="form-group">
                        <label for="name">House Number</label>
                        <input type="text" class="form-control" id="house_number" name="house_number" required>
                    </div>

                    <div class="form-group">
                    <label for="date">Date</label>
                    <input type="date" class="form-control" id="date" name="date" required>
                    </div>

                    <div class="form-group">
                    <label for="start-time">Start Time</label>
                    <input type="time" class="form-control" id="start_time" name="start_time" required>
                </div>
                <div class="form-group">
                    <label for="end-time">End Time</label>
                    <input type="time" class="form-control" id="end_time" name="end_time" required>
                </div>
                <div class="form-group">
                <button type="button" class="btn btn-danger" style="background-color: red;" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary"  style="background-color: LimeGreen;" id="submitOrder">Submit Order</button>
                </div>

        
                </form>
            </div>
        </div>


    </div>

</body>

<script>
$(document).on("click", ".order-btn", function() {
    var name = $(this).data("name");
    $("#name").val(name);
});

$(document).ready(function(){
  $('.order-btn').on('click', function(){
    var id = $(this).closest('tr').find('td:first').text();
    $('#house_help_id').val(id);
    $('#myModal').modal('show');
  });
});

</script>


</html>