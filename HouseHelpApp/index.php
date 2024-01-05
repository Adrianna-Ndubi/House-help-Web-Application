<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="css/style.css">
    <title>HouseKeeping App</title>
</head>
<body class="bg-sky-200">
    <div class="container">
        <section class="px-20 py-10">
            <div class="float-right">
                <img src="images/landing-page.png" width="450px" class="mr-5">
            </div>
            <nav>
                <ul class="flex flex-row" >
                    <li class="font-bold text-2xl"><a href="#">Donda</a></li>
                    <li class="ml-5 mt-1"><a href="#">Home</a></li>
                    <li class="ml-5 mt-1"><a href="#">Services</a></li>
                    <li class="ml-5 mt-1"><a href="#">Testimonials</a></li>
                    <li class="ml-5 mt-1"><a href="#">Contact</a></li>
                </ul>
            </nav>
            <div>
                <h1 class="mt-10 font-bold text-6xl leading-relaxed">Get a domestic <span class="text-sky-700">worker</span><br>At the tap of a button</h1>
                <p class="mt-5 text-3xl leading-relaxed">This is a webiste that helps conect clients<br>with potential domestic workers</p>
            </div>
            <div class="flex flex-row mt-10">
                <button class="bg-black hover:bg-sky-700 text-white font-bold py-2 px-4 rounded-full"><a href="signup.php">Get Started</a></button>
                <p class="font-bold mt-2 ml-5 text-xl"><a href="#">Learn more</a></p>
            </div>
        </section>
        <section>
            <div>
                <h1 class="mt-10 font-bold text-5xl leading-relaxed text-center">Services We Offer</h1>
            </div>
                <a href="#"><img src="images/arrow1.png" width="30px" class="float-right mr-10 mt-52"></a>
            <div class="flex flex-row pl-24 py-10 space-x-12 w-auto">
                <div class="rounded-3xl text-center px-16 py-16" id="services" style="background-color: #8CBCD7;">
                    <img src="images/worker4-PhotoRoom.png" class="w-44">
                    <h3 class="font-bold text-xl mt-10">General Cleaning</h3>
                    <p class="font-xl mt-5 leading-relaxed">This involves dusting, sweeping<br>and mopping of the house. </p>
                </div>
                <div class="rounded-3xl text-center px-20 py-16" id="services"  style="background-color: #8CBCD7;">
                    <img src="images/worker6.png" class="w-32 ml-10">
                    <h3 class="font-bold text-xl mt-10">Baby Sitting</h3>
                    <p class="font-xl mt-5 leading-relaxed">This involves taking care of</br>children for a specific period</p>
                </div>
                <div class="rounded-3xl text-center px-16 py-16" id="services"  style="background-color: #8CBCD7;">
                    <img src="images/worker3-PhotoRoom.png" class="w-32 ml-10">
                    <h3 class="font-bold text-xl mt-10">Laundry</h3>
                    <p class="font-xl mt-5 leading-relaxed">This involves washing of clothes</br>and bed linen. </p>
                </div>
            </div>
        </section>
        <section class="px-16">
            <div>
                <h1 class="mt-10 font-bold text-5xl leading-relaxed text-center">What Our Clients Say<br>About Us</h1>
            </div>
            <div class="float-right">
                <img src="images/client.png" class="w-80">
            </div>
            <div>
                <img src="images/quotation1.png" class="w-20">
                <p class="font-xl leading-relaxed text-2xl ml-28">The website is a wonderful one. I have used it and I am<br>
                    pleased with the level of services offered. I give this<br>
                    website a 5 star rating because of how amazing it is. I<br>
                    have recommended the system to many of my friends<br>
                    and they all have nothing but nice things to say.
                </p>
                <img src="images/quotation2.png" class="float-right mr-44 w-20">
                <div class="flex flex-row ml-24">
                    <a href="#"><img src="images/arrow2.png" class="mt-10"></a>
                    <a href="#"><img src="images/arrow1.png" class="mt-10 ml-5"></a>
                </div>
                
            </div>
        </section>
        <section class="px-36 pb-10">
            <div>
                <h1 class="mt-10 font-bold text-5xl leading-relaxed text-center">Contact Us</h1>
            </div>
            <div class="float-right pt-20">
                <p class="font-xl leading-relaxed">Feel free to contact us for any queries or questions. We are<br>dedicated to serving you. Legends of awesomeness</p>
                <input class="rounded-md px-5 py-2 mt-10 w-full" style="background-color: #8CBCD7;" value="Email"/><br>
                <input class="rounded-md px-5 pb-10 pt-5 mt-5 w-full" style="background-color: #8CBCD7;" value="Text"/>
                <button class="rounded-md px-5 py-2 mt-5 w-full bg-sky-700"><p>Send</button>
            </div>
            <div class="pt-10">
                <img src="images/contact-us.png" class="w-96">
            </div>
        </section>
    </div>
  
</body>
</html>