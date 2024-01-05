    <?php

    require 'config.php';

    if(!empty($_SESSION["ID"])){

        $ID = $_SESSION["ID"];
        $result= mysqli_query($conn, "SELECT * FROM users WHERE ID = $ID");
        $row =mysqli_fetch_assoc($result);
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
        <title>Document</title>
        <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    </head>
    <body>

    <?php

    $userID = $_SESSION["ID"];

    $sql = "SELECT `order_ID`, `user_ID`, `house_help_id`, `service_price`, `start_time`, `end_time`, `county`, `location`, `house_number`, `date` FROM orders where user_ID = $userID ";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {

            $h_id = $row['house_help_id']; // example ID

            if(isset($_POST['end_service'])){
                $sql = "UPDATE house_helps SET status = 'Available' WHERE ID = $h_id";
                mysqli_query($conn, $sql);
            }

            $sql2 = "SELECT name,status FROM house_helps WHERE id = $h_id";
            $result2 = $conn->query($sql2);
            $row2 = $result2->fetch_assoc();
            ?>

    <div class="p-4 bg-white rounded-lg shadow-md mx-auto text-center" style="width: 80%; border: 1px solid #ccc;">
        <h2 class="text-lg font-medium">Order ID: <?php echo $row["order_ID"]; ?></h2>
        <p class="text-gray-600">House Help Name: <?php echo $row2["name"]; ?></p>
        <p class="text-gray-600">Service Price: <?php echo $row["service_price"]; ?></p>
        <p class="text-gray-600">Start Time: <?php echo $row["start_time"]; ?></p>
        <p class="text-gray-600">End Time: <?php echo $row["end_time"]; ?></p>
        <p class="text-gray-600">County: <?php echo $row["county"]; ?></p>
        <p class="text-gray-600">Location: <?php echo $row["location"]; ?></p>
        <p class="text-gray-600">House Number: <?php echo $row["house_number"]; ?></p>
        <p class="text-gray-600">Date: <?php echo $row["date"]; ?></p>

        <?php if ($row2["status"] == "Engaged"){

            ?>
             <form method="post" id="form" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <button class="btn btn-danger" style="background-color: green; border-radius: 10px; padding: 7px" name="end_service" value="<?php echo $row["house_help_id"]; ?>" id="end_service_btn">End Service</button>
                </form>  

                <?php
        }else{
            ?>
                 <button class="btn btn-danger" style="background-color: grey; border-radius: 10px; padding: 7px" disabled >End Service</button>
    
            <?php
        }
        
        ?>

    </div>
    <?php
        }
    } else {
        echo "You dont have any orders yet";
    }
    ?> 
    </body>
    </html>