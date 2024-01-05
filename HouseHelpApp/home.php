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
        <script src="https://cdn.tailwindcss.com"></script>
        <link rel="stylesheet" href="css/style.css">
        <title>Home</title>
    </head>
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
    <body class="bg-sky-200">
        <div class="px-10 py-5 flex flex-row">
            <h1 class="font-bold text-2xl">Welcome <?php echo $row["username"] ?></h1> 
            <nav>
             <!--Humberger Menu-->
            <label>
                <input type="checkbox">
                <span class="menu"> <span class="hamburger"></span> </span>
                <ul>
                <li> <a class="text-xl" href="#">Home</a> </li>
                <li> <a class="text-xl" href="househelps.php">View Househelps</a></li>
                <li> <a class="text-xl" href="order_history.php">View Orders</a></li>
                <li> <a class="text-xl" href="signout.php">Log out</a> </li>
                </ul>
            </label>
            </nav>
            
        </div>

        <div class="flex flex-row pl-20 py-10 space-x-20 w-auto mt-10">
            <div class="grid grid-cols-3 gap-20">
                <?php 

                $query = "SELECT * FROM services";
                $result= mysqli_query($conn, $query);
                while ($row = mysqli_fetch_array($result)){
                $ID = $row['ID'];
                ?>
                <a href="home.php?service=true">
                        <div id="services" value="<?php echo $ID ?>" class="rounded-3xl text-center w-80 px-10 py-8 h-80" id="services" style="background-color: #8CBCD7;">
                        <div class="pl-7">
                            <?php echo '<img src="data:image;base64,'.base64_encode($row['img_icon']).'" class="w-32 ml-6">'; ?>
                        </div>
                        <h3 class="font-bold text-xl mt-8"><?php echo $row['service'] ?></h3>
                        <p class="font-xl mt-5 leading-relaxed"><?php echo $row['description'] ?></p>
                    </div>
                </a>
                <?php   
                }
                ?>
            </div>
        </div>
        <div class="flex items-center justify-center">
            <button class="bg-black hover:bg-sky-700 text-white text-xl font-bold py-4 px-20 mb-10 rounded-full text-lg"><a href="http://localhost/HouseHelpApp/househelps.php">Get a househelp</a></button>
        </div>
    </body>
    </html>




    <script>
    function myFunction(ID) {
        window.location.href="http://localhost/HouseHelpApp/househelps.php/" + ID;
    }
    </script>