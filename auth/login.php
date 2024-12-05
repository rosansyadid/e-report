<?php
session_start();
if (isset($_SESSION['login'])) {
    header('Location: /index.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@5/dark.css" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
    <title>Document</title>
</head>


<body class="bg-gradient-to-r from-pink-500 via-yellow-500 to-teal-500 font-sans text-gray-700">
    <div class="container mx-auto p-8 flex justify-center items-center min-h-screen">
        <div class="max-w-md w-full mx-auto">
            <div class="container flex flex-col justify-center items-center">
                <!-- Logo with animated spin -->
                <img src="https://3.imimg.com/data3/GF/EV/MY-13381970/computer-dvd-disk-500x500.png" class="animate-spin rounded-full w-1/4 mb-6" alt="Logo" />
                <!-- Animated heading with gradient text -->
                <span class="bg-gradient-to-r text-transparent from-blue-500 to-purple-600 bg-clip-text">
                    <h1 class="text-4xl text-center font-extrabold">Login Mas</h1>
                </span>
            </div>

            <div class="bg-white rounded-lg overflow-hidden shadow-2xl p-6 space-y-6 transform transition-all duration-300 hover:scale-105 hover:shadow-lg">
                <div class="p-4">
                    <form method="POST" action="../utils/auth.php">
                        <div class="mb-6">
                            <!-- Username input with vibrant border on focus -->
                            <input placeholder="Username" type="text" name="username" class="block w-full p-3 rounded-lg bg-gray-100 border-2 border-transparent focus:outline-none focus:ring-2 focus:ring-purple-500 transition duration-150">
                        </div>

                        <div class="mb-6">
                            <!-- Password input with vibrant border on focus -->
                            <input placeholder="*********" type="password" name="password" class="block w-full p-3 rounded-lg bg-gray-100 border-2 border-transparent focus:outline-none focus:ring-2 focus:ring-purple-500 transition duration-150">
                        </div>

                        <!-- Login button with hover effects -->
                        <button type="submit" name="login" class="w-full p-3 mt-4 bg-gradient-to-r from-blue-500 to-purple-600 text-white font-semibold rounded-lg shadow-lg transition-transform transform hover:scale-105 hover:bg-gradient-to-r hover:from-blue-600 hover:to-purple-700 duration-200">
                            Login
                        </button>
                    </form>
                </div>

                <!-- Notification (if any) -->
                <?php
                if (isset($_GET['notification'])) {
                    echo '<div class="text-center text-red-500 mt-4">' . $_GET['notification'] . '</div>';
                }
                ?>
            </div>
        </div>
    </div>
</body>
