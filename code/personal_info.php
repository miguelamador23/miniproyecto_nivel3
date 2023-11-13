<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personal Info</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
    <script src="modo_oscuro.js"></script>
    <style>
        .container {
            align-items: center;
            border: 0.5px solid #8b99ac;
            border-radius: 10px;
            padding: 30px;
            max-width: 600px;
            margin: 10px auto;
        }

        .button-edit {
            background-color: transparent;
            color: #8b99ac;
            font-weight: 600;
            border: 1px solid #8b99ac;
            padding: 8px 16px;
            border-radius: 4px;
            transition: background-color 0.3s, color 0.3s, border-color 0.3s;
        }

        .button-edit:hover {
            background-color: #3498db;
            color: #fff;
            border-color: transparent;
        }

        .logo {
            max-width: 150px;
            height: auto;
            position: absolute;
            top: 10px;
            left: 10px;
        }
    </style>
</head>

<body>

    <img class="logo" src="/assets/devchallenges.svg" alt="Your Company">

    <div class="titulo text-center mt-8">
        <h1 class="titulo1 text-2xl font-bold leading-9 text-gray-900">Personal Info</h1>
        <p class="titulo2 text-sm text-gray-500">Basic info, like your name and photo</p>
    </div>

    <div class="container">
        <div class="mt-8 px-4 sm:px-0 flex items-center justify-between">
            <div>
                <h3 class="text-base font-semibold leading-7 text-gray-900">Profile</h3>
                <p class="mt-1 max-w-2xl text-sm leading-6 text-gray-500">Some info may be visible to other people</p>
            </div>

            <button class="button-edit">
                Edit
            </button>
        </div>



        <div class="mt-6 border-t border-gray-100">
            <dl class="divide-y divide-gray-100">

                <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                    <dt class="text-sm font-medium leading-6 text-gray-900">PHOTO</dt>
                    <!-- Contenido para la foto -->
                </div>

                <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                    <dt class="text-sm font-medium leading-6 text-gray-900">NAME</dt>
                    <!-- Contenido para el nombre -->
                </div>

                <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                    <dt class="text-sm font-medium leading-6 text-gray-900">BIO</dt>
                    <!-- Contenido para la biografía -->
                </div>

                <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                    <dt class="text-sm font-medium leading-6 text-gray-900">EMAIL</dt>
                    <!-- Contenido para el correo electrónico -->
                </div>

                <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                    <dt class="text-sm font-medium leading-6 text-gray-900">PASSWORD</dt>
                    <!-- Contenido para la contraseña -->
                </div>
            </dl>
        </div>
    </div>
</body>

</html>