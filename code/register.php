<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="./output.css">
    <script src="modo_oscuro.js"></script>
    <script async defer src="https://connect.facebook.net/en_US/sdk.js"></script>
    <script defer src="facebook_login.js"></script>
</head>

<body>
    <div class="container">
        <div class=" index_login flex items-center justify-center min-h-screen flex-col px-6 py-12 lg:px-8">
            <div class="sm:mx-auto sm:w-full sm:max-w-sm">
                <img style="max-width: 100px; height: auto;" src="/assets/devchallenges.svg" alt="Your Company">
                <h2 class=" login mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Join thousands of learners from <br>
                    around the world
                </h2>
                <h4 class="texto2"> Master web development by making real-life <br>
                    projects. There are multiple paths for you to <br>
                    choose</h4>
            </div>

            <div class=" account mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
                <form class="space-y-6" action="#" method="POST">
                    <div>
                        <label for="email" class="block text-sm font-medium leading-6 text-gray-900"></label>
                        <div class="mt-2">
                            <input id="email" name="email" type="email" placeholder="Email" autocomplete="email" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                    </div>

                    <div>
                        <div class="flex items-center justify-between">
                            <label for="password" class="block text-sm font-medium leading-6 text-gray-900"></label>
                        </div>
                        <div class="mt-2">
                            <input id="password" name "password" type="password" placeholder="Password" autocomplete="current-password" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                    </div>

                    <div>
                        <a href="/code/personal_info.php" class="flex w-full justify-center">
                            <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                                Start coding now</button>
                        </a>
                    </div>

                </form>

                <div>
                    <div class="social-buttons">
                        <h4 class="social social-center">or continue with these social profile</h4>
                        <button class="circle-button facebook" onclick="loginWithFacebook()">
                            <img src="/assets/Facebook.svg" alt="Facebook">
                        </button>
                        <button class="circle-button twitter">
                            <img src="/assets/Twitter.svg" alt="Twitter">
                        </button>
                        <button class="circle-button google">
                            <img src="/assets/Google.svg" alt="Google">
                        </button>
                        <button class="circle-button github">
                            <img src="/assets/Gihub.svg" alt="GitHub">
                        </button>

                        <h4 class="social social-center">Adready a member? <a class="register" href="/code/index.php">Login</a></h4>

                    </div>
                    <button id="darkModeToggle" class="dark-mode-toggle">Toggle Dark Mode</button>

                </div>
            </div>
        </div>
    </div>
    </div>
</body>

</html>