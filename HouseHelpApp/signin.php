    <?php
    include("config.php");

    if(!empty($_SESSION["ID"])){
        header("Location: home.php");
        }
    
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        // username and password sent from form 
        
        $email= $_POST["email"];
        $password= $_POST["password"];
        
        $result = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email'");
        $row = mysqli_fetch_array($result);
            
        if(mysqli_num_rows($result) > 1) 
        {

            echo '<script>alert("Incorrect username or password")</script>"';

        }else{
            if($password == $row["password"]){
                if($row["role"] == 1){
                    $_SESSION["login"] = true;
                    $_SESSION["ID"] = $row["ID"];
                    $_SESSION["role"] = 1;
                    $_SESSION["username"] = $row["username"];
                    echo '<script>alert("Logged In Succesfully")</script>"';
                    header("Location: admin/admin.php");
                    
                }else{
                    $_SESSION["login"] = true;
                    $_SESSION["ID"] = $row["ID"];
                    $_SESSION["username"] = $row["username"];
                    echo '<script>alert("Logged In Succesfully")</script>"';
                    header("Location: home.php");
                }
                
            }else{

            echo '<script>alert("Incorrect username or password")</script>"';
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
        <title>Log in</title>
    </head>
    <body class="bg-sky-200">
        <section class="bg-white float-right px-48" style="height: 100vh;">
            <div>
                <h1 class="font-bold text-6xl leading-relaxed ml-14 mt-5 text-sky-700">User Account</h1>
                <form class="mt-5" method="post">
                    <input class="rounded-md pl-10 pr-56 py-2 mt-4 text-gray-500" style="background-color: rgba(97, 97, 97, 0.08);" name="email" placeholder="Username"/><br>
                    <input class="rounded-md pl-10 pr-56 py-2 mt-4 text-gray-500" style="background-color: rgba(97, 97, 97, 0.08);" type="password" name="password" placeholder="Password"/><br>
                    <button type="submit" class="rounded-full px-28 py-4 mt-5 text-xl font-bold text-black ml-20 bg-sky-200">LOG IN</button>
                </form>
                <p class="text-black text-l text-center ml-3 mt-7">Or register with the following</p>
                <div class="flex flex-row space-x-12 mt-5 ml-32">
                    <img src="images/facebook.png" alt="">
                    <img src="images/google.png" alt="">
                    <img src="images/twitter.png" alt="">
                </div>
            
            </div>
            </section>
        <section class="pt-32 pl-12 w-96">
            <div class="text-center text-black">
                <h1 class="font-bold text-5xl leading-relaxed text-sky-700">Welcome Back</h1>
                <p class="text-2xl leading-relaxed mt-3">Don't have an account?<br>sign up with your personal info</p>
                <button class="rounded-full border-2 border-black bg-transparent px-28 py-2 mt-10 text-2xl font-bold"><a href="signup.php">SIGN UP</a></button>
            </div>
        </section>

        
    </body>
    </html>