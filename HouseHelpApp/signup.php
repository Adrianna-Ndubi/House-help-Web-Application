    <?php


    if($_SERVER["REQUEST_METHOD"] == 'POST'){

        include_once ("config.php");

        if(!empty($_SESSION["ID"])){
            header("Location: home.php");
        }

    //create database query
    $sql_create= "CREATE DATABASE heroku_0dbbe2971f53a86";

    //create table
    $sql_table = "CREATE TABLE `users` (
        `ID` int(11) NOT NULL,
        `username` varchar(100) NOT NULL,
        `email` varchar(100) NOT NULL,
        `password` varchar(100) NOT NULL,
        `role` int(11) NOT NULL DEFAULT 2
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";




    $username= $_POST["username"];
    $email= $_POST["email"];
    $password= $_POST["password"];
    $confirm_password= $_POST["confirm_password"];
    $role= $_POST["role"];
    $username_duplicate = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");

    if(mysqli_num_rows($username_duplicate) > 0){
        echo '<script>alert("Username already takens")</script>';
    }else{

        $email_duplicate = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email'");

        if(mysqli_num_rows($email_duplicate) > 0){
            echo '<script>alert("Email already takens")</script>';
        }else{
            if(!empty($password == $confirm_password)){

                $sql_insert = "INSERT INTO users(`username`, `password`, `email`,`role`) VALUES ('$username','$password', '$email','$role')"; 
                mysqli_query($conn, $sql_insert);
                header("Location: signin.php");
                echo '<script>alert("Succeful registration")</script>"';
        
            }else{
                echo '<script>alert("Passwords don\'t match")</script>"';
            }
        }
    }

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
        <title>Sign Up</title>
    </head>
    <body class="bg-sky-200">
        <section class="bg-white float-right px-48" style="height: 100vh;">
            <div>
                <h1 class="font-bold text-6xl leading-relaxed ml-10 text-sky-700">Create Account</h1>
                <form action="" method="post">
                    <input class="rounded-md pl-10 pr-56 py-2 mt-4" style="background-color: rgba(97, 97, 97, 0.08);" required placeholder="Username" name="username" type="text" id="username"/><br>
                    <input class="rounded-md pl-10 pr-56 py-2 mt-4" style="background-color: rgba(97, 97, 97, 0.08);" required placeholder="Email" type="Email" name="email" id="email"/><br>
                    <input class="rounded-md pl-10 pr-56 py-2 mt-4" style="background-color: rgba(97, 97, 97, 0.08);" required placeholder="Password" type="password" name="password" id="password"/><br>
                    <input class="rounded-md pl-10 pr-56 py-2 mt-4" style="background-color: rgba(97, 97, 97, 0.08);" required placeholder="Confirm Password" type="password" name="confirm_password" id="confirm_password"/><br>
                    <input type="hidden" class="rounded-md px-10 py-2 mt-10" style="background-color: #8CBCD7;" value="2" name="role" id="role" /><br>
                    <button type="submit" name="submit" class="rounded-full px-28 py-4 mt-5 text-xl font-bold text-black ml-20 bg-sky-200">SIGN UP</button><br>
                </form>
                <p class="text-black text-l text-center ml-3">Or register with the following</p>
                <div class="flex flex-row space-x-12 mt-5 ml-32">
                    <img src="images/facebook.png" alt="">
                    <img src="images/google.png" alt="">
                    <img src="images/twitter.png" alt="">
                </div>
                <!-- <button class="rounded-full px-28 py-4 mt-5 text-xl font-bold text-black ml-20 bg-sky-200">SIGN UP</button> -->
            </div>
            </section>
        <section class="pt-32 pl-12 w-96">
            <div class="text-center text-black">
                <h1 class="font-bold text-6xl leading-relaxed text-sky-700">Welcome</h1>
                <p class="text-2xl leading-relaxed">Already have an account?<br>log in with your personal info</p>
                <button class="rounded-full border-2 border-black bg-transparent px-28 py-2 mt-10 text-2xl font-bold"><a href="signin.php">LOG IN</a></button>
            </div>
        </section>

        
    </body>
    </html>
