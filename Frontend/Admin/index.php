<?php
      session_start();
      header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
      header("Cache-Control: post-check=0, pre-check=0", false);
      header("Pragma: no-cache");
      if (!isset($_SESSION['admin'])) {
            // If not logged in as admin, redirect to the login page
            header("Location: ../../login.php");
            exit; // Prevent further script execution after the redirect
        }
      require "../../Backend/db.php";
      $mydb = new myDB();
      include 'modals.php';
     
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mangan Tayo</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        *{ 
           margin:0;
           padding: 0;
           box-sizing: border-box;

        }
    </style>
     <script type="text/javascript" src="script.min.js"></script>
</head>
<body>
    
   <div class="container-fluid p-0">
   <nav class="navbar shadow-sm" style="display: flex; justify-content: space-between; align-items: center; padding-left: 50px; padding-right: 50px;">
        <div class="nav-con">
            <a class="navbar-brand"><img src="../User/assets/mangan.png" alt="logo" width="100px"></a>
        </div>
        <div style="display: flex; align-items: center; gap: 20px;">
            <div>
                <p style="margin: 0; font-size: 16px;">Hi, Admin</p>
            </div>
            <div style="background: #FFBD59; padding: 5px 20px; border-radius: 20px;">
                <a href="../../logout.php" style="text-decoration: none; color: white; font-weight: bold;">Logout</a>
            </div>
        </div>
    </nav>

    <main class="container-fluid  ">
        <section class="w-75 d-flex justify-content-between mx-auto mt-5">
            <h1 class="fs-4 fw-bold">LIST OF BLOGS</h1>
            <form class="d-flex " role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" id="search">
                <button type="button" class="btn btn-warning w-50 font-bold" data-bs-toggle="modal" data-bs-target="#addModal" id="addbtn">
                    NEW POST
                </button>
            </form>
        </section>
        <table class="table px-5 w-75 mx-auto text-center mt-3">
            <thead>
                <tr class="heading"> 
                    <th>TITLE</th>
                    <th>DATE</th>
                    <th>ACTION</th>
                </tr>
            </thead>
            <tbody id="tBodyBlog">
                
            </tbody>
        </table>
        
    </main>
   </div>
<script src="index.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>