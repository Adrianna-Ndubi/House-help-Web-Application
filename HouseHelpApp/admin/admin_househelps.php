<?php

require 'config.php';

if(!empty($_SESSION["ID"]) && $_SESSION["role"] == 1){

    $ID = $_SESSION["ID"];
    $result= mysqli_query($conn, "SELECT * FROM users WHERE ID = $ID");
    $user =mysqli_fetch_assoc($result);

    //count number of users
    $result= mysqli_query($conn, "SELECT * FROM users WHERE role = 2");
    $total_users=mysqli_num_rows($result);

    //count number of househelps
    $result= mysqli_query($conn, "SELECT * FROM house_helps");
    $house_helps=mysqli_num_rows($result);

     //count number of orders
     $result= mysqli_query($conn, "SELECT * FROM orders");
     $orders=mysqli_num_rows($result);

        //adding a househelp
        if (isset($_POST['submit'])) {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $description = $_POST['description'];
            $phone_number = $_POST['p_number'];
    
            $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
            $image_size = getimagesize($_FILES['image']['tmp_name']);
        
            if ($image_size==FALSE) {
                echo "That's not an image!";
            } else {
                $query = "INSERT INTO house_helps (`name`, `email`, `description`, `phone_number`, `profile_pic`) VALUES ('$name', '$email', '$description', '$phone_number', '$image')";
                $result = mysqli_query($conn, $query);

                if($result){
                    echo '<script>alert("Added succesfully")</script>"';
                }else{
                    echo '<script>alert("An error occured")</script>"';
                }
        
                
            }
        }
     
 



}else{
    header("Location: http://localhost/HouseHelpApp/signin.php");
}

?>

<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    
      <!-- jQuery library -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

<!-- Bootstrap JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../css/style.css">
    <title>Admin</title>
</head>
<body>
    <div class="container flex flex-row">
    <!-- This section is the left most part, it contains different pages such as  home, profile househelps -->
        <section class="w-1/4 border-solid border-r-4 border-sky-700" style="height: 100vh;">
            <div id="left-panel" class="pl-10 py-5">
                <!-- this section contains the admin name and picture -->
                <p class="font-bold text-3xl"><a href="#">Donda</a></p>
                <div class="mt-5 w-auto">
                    <img class="w-14" src="../images/girl2.png" alt="">
                    <p class="text-2xl"><b><?php echo $user["username"] ?></b></p>
                    <p class="text-sky-700 text-xl"><b>Admin</b></p>
                </div>
                <!-- this section contains the links to different pages -->
                <ul class="mt-10">
                    <div class="flex flex-row mt-6">
                        <img class="w-8" src="../images/home.png" alt="home">
                        <li class="text-xl ml-5"><a href="http://localhost/HouseHelpApp/admin/admin.php">Home</a></li>
                    </div>
                    <div class="flex flex-row mt-6">
                        <img class="w-8" src="../images/profile2.png" alt="profile">
                        <li class="text-xl ml-5"><a href="http://localhost/HouseHelpApp/admin/admin_services.php">Services</a></li>
                    </div>
                    <div class="flex flex-row mt-6">
                        <img class="w-8" src="../images/house-help.png" alt="househelps">
                        <li class="text-xl ml-5"><a href="http://localhost/HouseHelpApp/admin/admin_househelps.php">Househelps</a></li>
                    </div>
                    <div class="flex flex-row mt-6">
                        <img class="w-7" src="../images/gear.png" alt="settings">
                        <li class="text-xl ml-5"><a href="#">Settings</a></li>
                    </div>
                    <div class="flex flex-row mt-6">
                        <img class="w-8" src="../images/logout.png" alt="logout">
                        <li class="text-xl ml-5"><a class="text-xl" href="signout.php">Log out</a></li>
                    </div>
                </ul>
            </div>
        </section>
        <!-- This is the main section containing the counters and CRUD displays -->
        <section class="w-3/4 h-1/3">
            <div id="counter" class="px-5 py-10  flex flex-row space-x-5 bg-sky-300">
                <!-- this section displays the counters -->
                <div class=" w-72 flex flex-row bg-white px-10 py-7 rounded-3xl">
                    <div>
                        <img class="w-20" src="../images/users.png" alt="">
                    </div>
                    <div class="px-3 ml-4 mt-2">
                        <p class="text-3xl ml-4"><b><?php echo $total_users ?></b></p>
                        <p class="text-xl text-sky-700">Total Users</p>
                    </div>

                </div>
                <div class=" w-72 flex flex-row bg-white px-10 py-7 rounded-3xl">
                    <div>
                        <img class="w-20" src="../images/househelp.png" alt="">
                    </div>
                    <div class=" ml-4 mt-2">
                        <p class="text-3xl ml-4"><b><?php echo $house_helps ?></b></p>
                        <p class="text-xl text-sky-700">House Helps</p>
                    </div>

                </div>
                <div class=" w-72 flex flex-row bg-white px-10 py-7 rounded-3xl">
                    <div>
                        <img class="w-20" src="../images/checklist.png" alt="">
                    </div>
                    <div class="px-3 ml-4 mt-2">
                        <p class="text-3xl ml-4"><b><?php echo $orders ?></b></p>
                        <p class="text-xl text-sky-700 ml-2">Orders</p>
                    </div>

                </div>  
            </div>
            <button type="button" style="background-color:Green;" class="btn btn-info" data-toggle="modal" data-target="#myModal">
                Add HouseHelp
                </button>
           
            <!-- This section contains table entries -->
            <table width="100%">
                <tr class="flex flex-row space-x-80 px-10 bg-sky-700" width="100%">
                    <th class="text-2xl text-white">Name</th>
                    <th class="text-2xl text-white">Status</th>
                    <th class="text-2xl text-white">Action</th>
                </tr>
                <?php

                $query = "SELECT * FROM house_helps";
                $result= mysqli_query($conn, $query);
                while ($row = mysqli_fetch_array($result)){
                    ?>
                <tr class="flex flex-row space-x-52  px-5 py-5 border-solid border-b-2 border-gray-300" width="100%">
                    <td class="flex flex-row space-x-5">
                        <img class="w-12" src="../images/girl2.png" alt="">
                        <div>
                            <p class="text-xl"><?php echo $row["name"] ?></p>
                            <p class="text-sm text-gray-600"><?php echo $row["email"] ?></p>
                        </div>
                    </td>
                    <td>
                        <button class="text-xl"><?php echo $row["status"] ?></button>
                    </td>
                    <td class="flex flex-row space-x-10 pl-24">
                        <a href=""><img class="w-7" src="../images/edit.png" alt="edit"></a>
                        <a href=""><img class="w-7" src="../images/del.png" alt="delete"></a>
                    </td>
                </tr>
                <?php
                 }
                ?>
            </table>
        </section>
                    <!-- Modal HTML -->
<div id="myModal" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Add HouseHelp</h4>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      </div>
      <div class="modal-body">
        <form method="post" enctype="multipart/form-data">
          <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name">
          </div>
          <div class="form-group">
            <label for="email">Email</label>
            <input name="email" type="email" class="form-control" id="email">
          </div>
          <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" id="description" name="description"></textarea>
          </div>
          <div class="form-group">
            <label for="price">Phone Number</label>
            <input name="p_number" type="tel" class="form-control" id="p_number">
          </div>
          <div class="form-group">
            <label for="image">Image</label>
            <input name="image" type="file" class="form-control" id="image">
          </div>
         

            <div class="modal-footer">
                <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                <input class="btn btn-success" type="submit" name="submit" value="Submit">
            </div>

        </form>
      </div>
      
    </div>
  </div>
    </div>
    
</body>
</html>