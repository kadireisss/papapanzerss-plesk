<?php

// Start the session
session_start();

// If the user is logged in
if (isset($_SESSION['user'])) {
    // Redirect to the admin panel
    header('Location: dashboard.php');
}
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Raizy /etc/passwd</title>
    <!-- TailwindCSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- JQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <!-- Toastr JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <!-- Toastr CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"/>
    <!-- Custom JS -->
    <script src="src/js/login.js"></script>
    <!-- Favicon -->
    <link rel="icon" href="src/icon/favicon.ico" type="image/x-icon"/>
</head>
<body class="bg-gray-200"
      style="background-image: url('src/img/bg.gif'); background-size: cover; background-repeat: no-repeat; background-attachment: fixed;">
<div class="flex flex-col justify-center items-center min-h-screen">
    <div class="w-full max-w-md bg-gray-100 rounded-md shadow-lg">
        <div class="px-12 py-8">
            <form class="mb-0" id="login-form">
                <div class="mb-4">
              
                
                <center>    <img src="https://i.ibb.co/XSfmjxC/0-E3-A82-EF-00-F0-4-A9-B-BCD0-172-F047653-DB.png" width="100" alt="raizy" width="500" height="600"></center>  
                <br> 
                    <label
                            class="block text-gray-700 text-sm font-bold mb-2"
                            for="username"
                    >
                        Kullanıcı Adı
                    </label>
                    <input
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            id="username"
                            type="text"
                            placeholder="Kulllanıcı Adı Gir"
                    />
                </div>
                <div class="mb-6">
                    <label
                            class="block text-gray-700 text-sm font-bold mb-2"
                            for="password"
                    >
                        Parola
                    </label>
                    <input
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
                            id="password"
                            type="password"
                            placeholder="Parola Gir"
                    />
                </div>
                <div class="flex justify-center">
                    <button
                            class="bg-gray-600 hover:bg-gray-800 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline transition duration-300 ease-in-out"
                            type="submit"
                    >
                        Giriş Yap
                    </button>
                </div>
            </form>
        </div>
    </div>
    <footer class="w-full max-w-md rounded-lg text-center mt-4 text-lg absolute bottom-0">
        <p class="text-gray-100 text-sm py-2">
            Made by
            <strong>
                <a href="https://instagram.com/raizymedia" target="_blank" class="underline">
                    Raizy Media
                </a>
            </strong>
        </p>
    </footer>
</div>
</body>
</html>