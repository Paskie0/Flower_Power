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
                        <li><a href="/Flower-Power/catalogue/index.php">Bloemen</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <a href="/Flower-Power/index.php" class="btn btn-ghost normal-case text-xl no-animation font-logo">Flower Power</a>
    </div>
    <div class="navbar-center hidden md:flex">
        <ul class="menu menu-horizontal px-1">
            <li tabindex="0">
                <details>
                    <summary>Collecties</summary>
                    <ul class="p-2">
                        <li><a href="/Flower-Power/catalogue/index.php">Bloemen</a></li>
                    </ul>
                </details>
            </li>
        </ul>
    </div>
    <div class="navbar-end">
        <a href="/Flower-Power/contact.php" role="button" class="btn btn-ghost flex flex-col">
            <i class="fa-solid fa-address-card fa-xl"></i>
            <span class="hidden md:inline normal-case">Contact</span>
        </a>
        <div class="dropdown dropdown-end drop-shadow-lg">
            <label tabindex="0" class="btn btn-ghost flex flex-col">
                <i class="fa-solid fa-user fa-xl"></i>
                <span class="hidden md:inline normal-case">Account</span>
            </label>
            <div class="dropdown-content z-[1] menu p-2 shadow bg-base-100 rounded-box">
                <?php if ($isLoggedIn || $isMedewerker) : ?>
                    <a href="/Flower-Power/account.php" role="button" class="btn btn-wide btn-sm mt-2 no-animation">Account</a>
                    <a href="/Flower-Power/medewerker-account.php" role="button" class="btn btn-wide btn-sm mt-2 no-animation">Medewerker</a>
                    <form action="/Flower-Power/functions/logout.php" method="post">
                        <button type="submit" class="btn btn-wide btn-sm mt-2 no-animation">Uitloggen</button>
                    </form>
                <?php else : ?>
                    <form action="/Flower-Power/functions/login.php" method="post" tabindex="0" id="login" autocomplete="off">
                        <label for="email" class="font-semibold py-1">Email:</label>
                        <input type="email" id="email-login" name="email-login" autocomplete="email" required class="input input-bordered w-full">

                        <label for="password" class="font-semibold py-1">Password:</label>
                        <input type="password" id="password-login" name="password-login" autocomplete="current-password" required class="input input-bordered w-full">

                        <button type="submit" class="btn btn-primary btn-wide btn-sm mt-4 no-animation">Login</button>
                    </form>
                    <form action="/Flower-Power/functions/register.php" method="post" tabindex="0" id="register" class="hidden">
                        <label for="email-register" class="font-semibold py-4">Email:</label>
                        <input type="email" id="email-register" name="email-register" autocomplete="email" required class="input input-bordered w-full">

                        <label for="password-register" class="font-semibold py-4">Password:</label>
                        <input type="password" id="password-register" name="password-register" autocomplete="new-password" required class="input input-bordered w-full">

                        <label for="first-name" class="font-semibold py-4">First Name:</label>
                        <input type="text" id="first-name" name="first-name" autocomplete="given-name" required class="input input-bordered w-full">

                        <label for="infix" class="font-semibold py-4">Infix:</label>
                        <input type="text" id="infix" name="infix" autocomplete="additional-name" class="input input-bordered w-full">

                        <label for="last-name" class="font-semibold py-4">Last Name:</label>
                        <input type="text" id="last-name" name="last-name" autocomplete="family-name" required class="input input-bordered w-full">

                        <label for="date-of-birth" class="font-semibold py-4">Date of Birth:</label>
                        <input type="date" id="date-of-birth" name="date-of-birth" autocomplete="bday" required class="input input-bordered w-full">

                        <button type="submit" class="btn btn-primary btn-wide btn-sm mt-4 no-animation">Registreren</button>
                    </form>
                    <form action="/Flower-Power/functions/medewerker-login.php" method="post" tabindex="0" id="medewerker-login" autocomplete="off" class="hidden">
                        <label for="email" class="font-semibold py-1">Email:</label>
                        <input type="email" id="medewerker-email" name="medewerker-email" autocomplete="email" required class="input input-bordered w-full">

                        <label for="password" class="font-semibold py-1">Password:</label>
                        <input type="password" id="medewerker-password" name="medewerker-password" autocomplete="current-password" required class="input input-bordered w-full">

                        <button type="submit" class="btn btn-primary btn-wide btn-sm mt-4 no-animation">Login</button>
                    </form>
                    <button onclick="toggleForms()" id="toggleFormsButton" type="button" class="btn btn-wide btn-sm mt-2 no-animation">Registreren</button>
                    <button onclick="medewerkerForm()" id="medewerkerFormButton" type="button" class="btn btn-wide btn-sm mt-2 no-animation">Medewerker</button>
                <?php endif; ?>
            </div>
        </div>
        <a href="/Flower-Power/cart.php" role="button" class="btn btn-ghost flex flex-col">
            <div class="indicator">
                <span class="indicator-item badge badge-secondary" id="cartCountIndicator">0</span>
                <i class="fa-solid fa-cart-shopping fa-xl"></i>
            </div>

            <span class="hidden md:inline normal-case">Cart</span>
        </a>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var cartCountIndicator = document.getElementById('cartCountIndicator');

                var xhr = new XMLHttpRequest();
                xhr.open('GET', '/Flower-Power/functions/cart-count.php', true);
                xhr.onreadystatechange = function() {
                    if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                        var cartCount = parseInt(xhr.responseText);
                        cartCount = isNaN(cartCount) ? 0 : cartCount; // Check for NaN and set it to 0
                        cartCountIndicator.textContent = cartCount;
                    }
                };
                xhr.send();
            });
        </script>
    </div>
</div>