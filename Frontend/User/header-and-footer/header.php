<?php
session_start(); // Start the session
$current_page = basename($_SERVER['REQUEST_URI']); // Get the current page
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <!-- Latest Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>Document</title>
    <style>
        body {
            font-family: 'Poppins';
        }
        .logo {
            width: 90px;
        }
        .navbar {
            background-color: white;
            z-index: 1000;
            box-shadow: 0 8px 10px -5px rgba(0, 0, 0, 0.3);
         
        }
        .navbar .nav-link {
            color: black;
            font-size: 20px;
        }
        .navbar .nav-link:hover {
            color: #FFBD59;
            transition: color 0.3s;
        }
        .navbar .nav-link.active-link {
            color: #FFBD59;
            font-weight: bold;
        }
        .navbar-toggler {
            border-color: black;
        }
        .nav-item .nav-signup {
            color: white; 
            border-radius: 15px;
            background-color: #FFBD59; 
            padding: 5px;
        }
        .dropdown-menu {
            min-width: 5rem; 
            font-size: 15px;/* Adjust the width of the dropdown */
            background-color: white;
        }
        .dropdown-item.no-hover:hover {
        background-color: transparent;  /* No background change on hover */
        color: inherit;                 /* Keep the text color unchanged */
    }
       
    </style>
</head>
<body>

<!-- NAVIGATION BAR -->
<nav class="navbar navbar-expand-sm fixed-top">
  <div class="container-fluid">
    <a class="navbar-brand" href="/mangan-tayo/">
      <!-- LOGO -->
      <img src="/mangan-tayo/Frontend/User/assets/mangan.png" class="logo" id="logo" alt="logo">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- NAVIGATION LINKS -->
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
      <ul class="navbar-nav mx-auto text-center ">
        <li class="nav-item">
          <a class="nav-link <?php echo ($current_page === 'index.php' || $current_page === '') ? 'active-link' : ''; ?>" href="/mangan-tayo/">HOME</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php echo $current_page === 'recipe.php' ? 'active-link' : ''; ?>" href="/mangan-tayo/Frontend/User/recipe.php">RECIPES</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php echo $current_page === 'about.php' ? 'active-link' : ''; ?>" href="/mangan-tayo/Frontend/User/about.php">ABOUT</a>
        </li>
      </ul>

      <!-- USER MENU -->
      <ul class="navbar-nav">
        <?php if (isset($_SESSION['userID'])): // Check if user is logged in ?>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            
              <i class="bi bi-person-fill"></i>
            </a>
            
            <div class="dropdown-menu dropdown-menu-right p-3 text-left shadow rounded" aria-labelledby="userDropdown">
              <?= htmlspecialchars($_SESSION['username']) ?>
              <?= htmlspecialchars($_SESSION['email']) ?>
              <div class="text-center rounded mt-2" style="background-color: #FFBD59; color:white;">
                  <a class="dropdown-item logout no-hover" href="/mangan-tayo/logout.php">Logout</a>
              </div>
          </div>

          </li>
        <?php else: // User is not logged in ?>
          <li class="nav-item">
            <a class="nav-link" href="/mangan-tayo/login.php">LOGIN</a>
          </li>
          <li class="nav-item">
            <a class="nav-link nav-signup" href="/mangan-tayo/create_account.php">SIGNUP</a>
          </li>
        <?php endif; ?>
      </ul>
    </div>
  </div>
</nav>

<!-- Required Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
