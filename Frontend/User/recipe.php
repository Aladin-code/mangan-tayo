<?php
    include 'header-and-footer/header.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mangan Tayo</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="index.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1CmrxMRARb6aLqgBO7yyAxTOQE2AKb9GfXnE6gouai5w6G3TfPwhClZk5pgtZ8zb" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="recipe.css">
    <style>
        body {
            margin-top: 100px;
        }
        
    </style>
</head>

<body>

    <!-- FIRST SECTION ALL RECIPES -->
    <div class="all-recipes"><!-- Align heading and search bar horizontally -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="my-4">ALL RECIPES</h1>
                 <input type="text" id="search-input" class="form-control  search-bar" placeholder="Search for recipes...">
        </div>
        <!-- Recipe Categories and Cards -->
        <div class="all-recipes-category">
            <div class="category">
                <div class="row justify-content-center mx-auto">
                    <div class="mx-2">
                        <a href="#" class="btn btn-block btn-all-recipe-category filter-btn active" data-category="all" onclick="filterRecipes('all')">All</a>
                    </div>
                    <div class="mx-2">
                        <a href="#" class="btn btn-block btn-all-recipe-category filter-btn" data-category="filipino" onclick="filterRecipes('filipino')">BEST FILIPINO FOOD</a>
                    </div>
                    <div class="mx-2">
                        <a href="#" class="btn btn-block btn-all-recipe-category filter-btn" data-category="budget" onclick="filterRecipes('budget')">BUDGET MEALS</a>
                    </div>
                    <div class="mx-2">
                        <a href="#" class="btn btn-block btn-all-recipe-category filter-btn" data-category="classic" onclick="filterRecipes('classic')">CLASSIC ULAM</a>
                    </div>
                    <div class="mx-2">
                        <a href="#" class="btn btn-block btn-all-recipe-category filter-btn" data-category="saucy" onclick="filterRecipes('saucy')">SAUCY ULAM</a>
                    </div>
                </div>
            </div>

            <!-- ALL RECIPES CARD -->
            <div class="row justify-content-center recipe-card-container">
                <!-- Recipe cards will go here -->
            </div>
        </div>
    </div>

    <!-- FOOTER -->
    <?php
        include 'header-and-footer/footer.php';
    ?>
</body>
</html>