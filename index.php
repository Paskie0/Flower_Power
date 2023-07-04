<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flower Power</title>
    <link rel="stylesheet" href="css/output.css">
    <script src="https://kit.fontawesome.com/d437031e9c.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="navbar bg-base-100 border-b border-gray-700 sticky top-0 z-10">
        <div class="navbar-start">
            <div class="dropdown">
                <label tabindex="0" class="btn btn-ghost md:hidden">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16" />
                    </svg>
                </label>
                <ul tabindex="0" class="menu menu-sm dropdown-content mt-3 z-[1] p-2 shadow bg-base-100 rounded-box w-52">
                    <li>
                        <a>Collecties</a>
                        <ul class="p-2">
                            <li><a>Bloemen</a></li>
                            <li><a>Boeketten</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <a href="index.php" class="btn btn-ghost normal-case text-xl no-animation font-logo">Flower Power</a>
            <label class="btn btn-ghost btn-square swap swap-rotate hidden md:inline-grid">
                <input type="checkbox" id="theme-switcher" />
                <i class="swap-off fa-solid fa-sun fa-xl"></i>
                <i class="swap-on fa-solid fa-moon fa-xl"></i>
            </label>
        </div>
        <div class="navbar-center hidden md:flex">
            <ul class="menu menu-horizontal px-1">
                <li tabindex="0">
                    <details>
                        <summary>Collecties</summary>
                        <ul class="p-2">
                            <li><a href="catalogue/index.php">Bloemen</a></li>
                            <li><a href="catalogue/index.php">Boeketten</a></li>
                        </ul>
                    </details>
                </li>
            </ul>
        </div>
        <div class="navbar-end">
            <a href="contact.php" role="button" class="btn btn-ghost flex flex-col">
                <i class="fa-solid fa-address-card fa-xl"></i>
                <span class="hidden md:inline normal-case">Contact</span>
            </a>
            <div class="dropdown dropdown-end drop-shadow-lg">
                <label tabindex="0" class="btn btn-ghost flex flex-col">
                    <i class="fa-solid fa-user fa-xl"></i>
                    <span class="hidden md:inline normal-case">Account</span>
                </label>
                <div class="dropdown-content z-[1] menu p-2 shadow bg-base-100 rounded-box">
                    <form action="" method="POST" tabindex="0" id="login">
                        <label for="email" class="font-semibold py-1">Email:</label>
                        <input type="email" id="email" name="email" autocomplete="email" required class="input input-bordered w-full">

                        <label for="password" class="font-semibold py-1">Password:</label>
                        <input type="password" id="password" name="password" autocomplete="current-password" required class="input input-bordered w-full">

                        <button type="submit" class="btn btn-primary btn-wide btn-sm mt-4 no-animation">Login</button>
                    </form>
                    <form action="" method="POST" tabindex="0" id="register" class="hidden">
                        <label for="email" class="font-semibold py-4">Email:</label>
                        <input type="email" id="email" name="email" autocomplete="email" required class="input input-bordered w-full">

                        <label for="password" class="font-semibold py-4">Wachtwoord:</label>
                        <input type="password" id="password" name="password" autocomplete="new-password" required class="input input-bordered w-full">

                        <label for="first-name" class="font-semibold py-4">Voornaam:</label>
                        <input type="text" id="first-name" name="first-name" autocomplete="given-name" required class="input input-bordered w-full">

                        <label for="infix" class="font-semibold py-4">Tussenvoegsel:</label>
                        <input type="text" id="infix" name="infix" autocomplete="additional-name" class="input input-bordered w-full">

                        <label for="last-name" class="font-semibold py-4">Achternaam:</label>
                        <input type="text" id="last-name" name="last-name" autocomplete="family-name" required class="input input-bordered w-full">

                        <label for="date-of-birth" class="font-semibold py-4">Geboortedatum:</label>
                        <input type="date" id="date-of-birth" name="date-of-birth" autocomplete="bday" required class="input input-bordered w-full">


                        <button type="submit" class="btn btn-primary btn-wide btn-sm mt-4 no-animation">Registreren</button>
                    </form>
                    <button onclick="toggleForms()" id="toggleFormsButton" type="button" class="btn btn-wide btn-sm mt-2 no-animation">Registreren</button>
                </div>
            </div>
            <button class="btn btn-ghost flex flex-col">
                <i class="fa-solid fa-cart-shopping fa-xl"></i>
                <span class="hidden md:inline normal-case">Cart</span>
            </button>
        </div>
    </div>
    <div class="hero min-h-screen" style="background-image: url(./img/bouquet-showcase.jpg);">
        <div class="hero-overlay bg-opacity-60"></div>
        <div class="hero-content text-center text-white">
            <div class="max-w-md">
                <h1 class="mb-5 text-5xl font-bold">Welkom bij,</h1>
                <h1 class="mb-5 text-5xl text-green-200 font-bold font-logo">Flower Power</h1>
                <p class="mb-5 text-lg">Ontdek onze adembenemende selectie van bloemen voor elke gelegenheid en laat je betoveren door hun kleuren en geuren.</p>
                <a href="catalogue/index.php" role="button" class="btn btn-primary">Shop Nu</a>
            </div>
        </div>
    </div>
    <h2 class="p-4 text-2xl">Onze Bestsellers</h2>
    <div class="carousel carousel-center max-w-full p-4 space-x-4">
        <div class="carousel-item flex-col w-40">
            <img src="./img/flower1.webp" class="rounded-box" />
            <h3 class="font-semibold text-lg">Flower</h3>
            <p>€19,95</p>
        </div>
        <div class="carousel-item flex-col w-40">
            <img src="./img/flower1.webp" class="rounded-box" />
            <h3 class="font-semibold text-lg">Flower</h3>
            <p>€19,95</p>
        </div>
        <div class="carousel-item flex-col w-40">
            <img src="./img/flower1.webp" class="rounded-box" />
            <h3 class="font-semibold text-lg">Flower</h3>
            <p>€19,95</p>
        </div>
        <div class="carousel-item flex-col w-40">
            <img src="./img/flower1.webp" class="rounded-box" />
            <h3 class="font-semibold text-lg">Flower</h3>
            <p>€19,95</p>
        </div>
        <div class="carousel-item flex-col w-40">
            <img src="./img/flower1.webp" class="rounded-box" />
            <h3 class="font-semibold text-lg">Flower</h3>
            <p>€19,95</p>
        </div>
        <div class="carousel-item flex-col w-40">
            <img src="./img/flower1.webp" class="rounded-box" />
            <h3 class="font-semibold text-lg">Flower</h3>
            <p>€19,95</p>
        </div>
        <div class="carousel-item flex-col w-40">
            <img src="./img/flower1.webp" class="rounded-box" />
            <h3 class="font-semibold text-lg">Flower</h3>
            <p>€19,95</p>
        </div>
    </div>
    <h3 class="py-4 pl-4 text-xl inline">Ontdek al onze producten</h3>
    <a href="#" role="button" class="m-4 btn btn-primary">Klik Hier</a>
    <div class="hero min-h-[30%]">
        <div class="hero-content flex-col sm:flex-row">
            <img src="./img/flower5.jpg" class="object-cover max-h-[30rem] w-full sm:w-64 rounded-lg shadow-2xl" />
            <div>
                <h1 class="text-5xl font-bold">Over Ons</h1>
                <p class="py-6">Provident cupiditate voluptatem et in. Quaerat fugiat ut assumenda excepturi exercitationem quasi. In deleniti eaque aut repudiandae et a id nisi.</p>
                <button class="btn btn-primary">Meer Informatie</button>
            </div>
        </div>
    </div>
    <div class="hero min-h-[30%]">
        <div class="hero-content flex-col sm:flex-row-reverse">
            <img src="./img/flower6.jpg" class="object-cover max-h-[30rem] w-full sm:w-64 rounded-lg shadow-2xl" />
            <div>
                <h1 class="text-5xl font-bold">Duurzaam</h1>
                <p class="py-6">Provident cupiditate voluptatem et in. Quaerat fugiat ut assumenda excepturi exercitationem quasi. In deleniti eaque aut repudiandae et a id nisi.</p>
                <button class="btn btn-primary">Meer Informatie</button>
            </div>
        </div>
    </div>
    <footer class="footer items-center p-4 bg-neutral text-neutral-content">
        <div class="items-center grid-flow-col">
            <p>@ 2023 Flower Power - All right reserved</p>
        </div>
        <div class="grid-flow-col gap-4 md:place-self-center md:justify-self-end">
            <a><i class="fa-brands fa-tiktok fa-xl"></i></a>
            <a><i class="fa-brands fa-youtube fa-xl"></i></a>
            <a><i class="fa-brands fa-instagram fa-xl"></i></a>
        </div>
    </footer>
    <script src="./js/script.js"></script>
</body>

</html>