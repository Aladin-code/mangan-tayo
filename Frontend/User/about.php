<?php
    include 'header-and-footer/header.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Mangan Tayo</title>
    <script type="text/javascript" src="script.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1CmrxMRARb6aLqgBO7yyAxTOQE2AKb9GfXnE6gouai5w6G3TfPwhClZk5pgtZ8zb" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <style>
        /* Add margin to body to avoid overlap with fixed navbar */
        body {
            margin-top: 120px; /* Adjust this value as needed */
        }

        .breadcrumb {
            background-color: white;
            padding: 0;
        }

        .breadcrumb li {
            font-size: 30px;
            margin-left: 5px;
        }

        .logo-image {
            width: 100%;
            max-width: 650px;
            height: 400px;
            object-fit: cover;
            border-radius: 10px;
        }
    </style>
</head>
<body>

    <!-- ABOUT -->
    <div class="container mb-4">
        <div>
            <ol class="breadcrumb">
                <li>ABOUT</li>
                <li style="color: #FFBD59;">MANGAN TAYO</li>
            </ol>
        </div>
     
  
        <div class="container shadow p-3 mb-5 bg-white rounded">
            <div class="row justify-content-center">
                <div class="col-12 col-sm-8 col-md-6 text-center">
                    <img src="assets/mangan.png" alt="Adobo" class="logo-image img-fluid">
                </div>
            </div>
            <div class="text-center my-4">
                <p>Welcome to Mangan Tayo, your ultimate guide to savoring the best of Filipino cuisine! "Mangan Tayo," meaning "Let’s Eat" in Ilocano, embodies our love for gathering around the table and enjoying the rich, diverse flavors of the Philippines.</p>
                <p>Here at Mangan Tayo, we celebrate the heart of Filipino cooking through a variety of flavorful dishes. Our blog highlights the best Filipino food, showcasing iconic favorites like lechon and sinigang that capture the essence of our culinary heritage. For those who want to enjoy Filipino flavors on a budget, our budget meals category offers affordable yet delicious recipes that are easy to prepare without compromising on taste.</p>
                <p>We also dive deep into classic Filipino dishes, featuring timeless staples like adobo, kare-kare, and pancit, for those seeking to recreate the comforting flavors of home. And if you’re a fan of rich, flavorful sauces, our saucy food section is where you’ll find irresistible, savory dishes like caldereta and afritada that are perfect with a steaming plate of rice.</p>
                <p>Join us as we explore and share the beauty of Filipino cuisine. Mangan Tayo!</p>
            </div>   
        </div>
    </div>

<!-- FOOTER -->
<?php
    include 'header-and-footer/footer.php';
?>
</body>
</html>
