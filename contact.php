<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
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
            <button class="btn btn-ghost flex flex-col">
                <i class="fa-solid fa-user fa-xl"></i>
                <span class="hidden md:inline normal-case">Account</span>
            </button>
            <button class="btn btn-ghost flex flex-col">
                <i class="fa-solid fa-cart-shopping fa-xl"></i>
                <span class="hidden md:inline normal-case">Cart</span>
            </button>
        </div>
    </div>
    <h1 class="pt-4 text-4xl font-bold text-center">Contact informatie</h1>
    <div class="divider"></div>
    <div class="hero min-h-[30%]">
        <div class="hero-content flex-col sm:flex-row">
            <img src="./img/flower7.jpg" class="object-cover max-h-[30rem] w-full sm:w-64 rounded-lg shadow-2xl" />
            <div>
                <h1 class="text-4xl font-bold">Filiaal Almere</h1>
                <h3 class="text-xl font-semibold py-2">Adres</h3>
                <p>Straat van Florida 1</p>
                <h3 class="text-xl font-semibold py-2">Telefoon nr.</h3>
                <a href="tel:+31(030)539-87-65">(030) 539 87 65</a>
                <h3 class="text-xl font-semibold py-2">E-mailadres</h3>
                <a href="mailto:Almere@flowerpower.nl" class="link">Almere@flowerpower.nl</a>
            </div>
        </div>
    </div>
    <div class="hero min-h-[30%]">
        <div class="hero-content flex-col sm:flex-row">
            <img src="./img/flower8.jpg" class="object-cover max-h-[30rem] w-full sm:w-64 rounded-lg shadow-2xl" />
            <div>
                <h1 class="text-4xl font-bold">Filiaal Utrecht</h1>
                <h3 class="text-xl font-semibold py-2">Adres</h3>
                <p>Rotterdamseweg 12</p>
                <h3 class="text-xl font-semibold py-2">Telefoon nr.</h3>
                <a href="tel:+31(030)539-87-65">(030) 539 87 65</a>
                <h3 class="text-xl font-semibold py-2">E-mailadres</h3>
                <a href="mailto:Utrecht@flowerpower.nl" class="link">Utrecht@flowerpower.nl</a>
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