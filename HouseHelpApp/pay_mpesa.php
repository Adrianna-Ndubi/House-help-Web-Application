<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss/dist/tailwind.min.css" rel="stylesheet">
    <title>Pay with M-PESA</title>
</head>
<body class="bg-sky-300">
    <div class="grid h-screen place-items-center mt-5">
        <img src="images/tick.png">
        <p class="text-2xl"><span class="font-bold text-4xl">Success!</span> You have successfully booked a househelp!</p>
        <?php
            include("config.php");
            if (isset($_GET['id'])){
                $service_price = $_GET['id'];
            }
            ?>
            <!-- here I am redirecting to payment.php-->
            <button type="button" style = "margin-top:-25px"class="bg-black hover:bg-sky-700 text-white font-bold py-4 px-6 rounded-full text-lg" id="editbtn"><a name="payment" href="payment.php?id=<?php echo $service_price ?>">Pay with M-Pesa</a></button>
            <?php    
        ?>
    </div>
</body>
</html>