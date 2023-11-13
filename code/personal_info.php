<?php
require_once('../config/database.php');
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: /code/index.php");
    exit();
}

$userId = $_SESSION['user_id'];

$sql = "SELECT name, bio, email, password FROM usuarios WHERE id = ?";
$stmt = $mysqli->prepare($sql);

if (!$stmt) {
    echo "Error en la preparación de la consulta: " . $mysqli->error;
    exit();
}

$stmt->bind_param("i", $userId);
$result = $stmt->execute();

if ($result) {
    $stmt->bind_result($name, $bio, $email, $password);
    $stmt->fetch();
} else {
    echo "Error al obtener la información del usuario: " . $stmt->error;
    exit();
}

$stmt->close();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personal Info</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
    <script src="modo_oscuro.js"></script>
    <style>
        .dark-mode-toggle {
            margin-left: auto;
        }


        .dark-mode {
            background-color: #333;
            color: #fff;

        }

        .dark-mode-toggle {
            background-color: #1E90FF;
            color: #ffffff;
            border: none;
            border-radius: 5px;
            padding: 8px 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }


        .dark-mode .dark-mode-toggle {
            background-color: #121212;
            color: #ffffff;
        }

        .dark-mode .container {
            border: 0.5px solid #fff;

            color: #fff;

        }

        .dark-mode-toggle:hover {
            background-color: #90959e;
        }

        .dark-mode .button-edit {
            background-color: #121212;
            color: #fff;
            border: 1px solid #fff;

        }

        .dark-mode .button-edit:hover {
            background-color: #90959e;
            color: #fff;
            border-color: #fff;

        }


        .dark-mode {
            background-color: #121212;
            color: #ffffff;
        }

        .dark-mode .container input,
        .dark-mode .container textarea {
            border: 1px solid #fff;

            color: #fff;

        }

        .dark-mode input,
        .dark-mode button {
            background-color: #121212;
            color: #ffffff;
            border-color: #96a3af;
        }


        .dark-mode-toggle {
            position: fixed;
            top: 10px;
            right: 10px;
            z-index: 999;
        }

        .dark-mode .titulo1,
        .dark-mode .titulo2,
        .dark-mode h3,
        .dark-mode p,
        .dark-mode .text-gray-900,
        .dark-mode .text-gray-500,
        .dark-mode .text-gray-700 {
            color: #fff;

        }

        .dark-mode .titulo1,
        .dark-mode .titulo2 {
            color: #fff;

        }

        .dark-mode input,
        .dark-mode button,
        .dark-mode textarea {
            color: #fff;

        }

        .container {
            align-items: center;
            border: 0.5px solid #8b99ac;
            border-radius: 10px;
            padding: 30px;
            max-width: 600px;
            margin: 10px auto;
        }

        .container input,
        .container textarea {
            border: 1px solid #000;
            transition: border-color 0.3s;
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

            <button id="editButton" class="button-edit">
                Edit
            </button>
        </div>
        <form action="guardar_cambios.php" method="POST">
            <div class="mt-6 border-t border-gray-100">
                <dl class="divide-y divide-gray-100">

                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                        <dt class="text-sm font-medium leading-6 text-gray-900">PHOTO</dt>
                    </div>

                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0 editable">
                        <dt class="text-sm font-medium leading-6 text-gray-900">NAME</dt>
                        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                            <input type="text" name="new_name" value="<?php echo $name; ?>" />
                        </dd>
                    </div>

                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0 editable">
                        <dt class="text-sm font-medium leading-6 text-gray-900">PHONE</dt>
                        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                            <input type="text" name="new_phone" value="<?php echo $phone; ?>" />
                        </dd>
                    </div>

                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0 editable">
                        <dt class="text-sm font-medium leading-6 text-gray-900">BIO</dt>
                        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                            <textarea name="new_bio"><?php echo $bio; ?></textarea>
                        </dd>
                    </div>

                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0 editable">
                        <dt class="text-sm font-medium leading-6 text-gray-900">EMAIL</dt>
                        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                            <input type="email" name="new_email" value="<?php echo $email; ?>" />
                        </dd>
                    </div>

                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0 editable">
                        <dt class="text-sm font-medium leading-6 text-gray-900">PASSWORD</dt>
                        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                            <input type="<?php echo (isset($_POST['edit_mode'])) ? 'text' : 'password'; ?>" name="new_password" value="<?php echo $password; ?>" readonly disabled />
                        </dd>
                    </div>

                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                        <button type="submit" id="saveButton" class="button-edit hidden editable">
                            Guardar cambios
                        </button>
                    </div>
                </dl>
            </div>
        </form>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const editButton = document.getElementById('editButton');
            const saveButton = document.getElementById('saveButton');
            const editableFields = document.querySelectorAll('.editable input, .editable textarea');

            editButton.addEventListener('click', function() {
                editableFields.forEach(function(field) {
                    field.readOnly = !field.readOnly;
                    field.style.borderColor = field.readOnly ? "#000" : "#3498db";
                    field.disabled = !field.disabled;
                });

                saveButton.classList.toggle('hidden');
                editButton.disabled = true;
            });
        });
    </script>
    <button id="darkModeToggle" class="dark-mode-toggle">Dark Mode</button>
</body>

</html>

<?php
if ($newEmail === '') {
    $newEmail = null;
}


$sqlUpdate = "UPDATE usuarios SET name=?, bio=?, email=?, password=?, phone=? WHERE id=?";
$stmtUpdate = $mysqli->prepare($sqlUpdate);

if (!$stmtUpdate) {
    echo "Error en la preparación de la consulta: " . $mysqli->error;
    exit();
}

$stmtUpdate->bind_param("sssssi", $newName, $newBio, $newEmail, $newPassword, $newPhone, $userId);

$resultUpdate = $stmtUpdate->execute();

if ($resultUpdate) {
    header("Location: personal_info.php");
    exit();
} else {
    echo "Error al actualizar la información: " . $stmtUpdate->error;
}

$stmtUpdate->close();
?>