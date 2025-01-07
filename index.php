<?php
     include 'Frontend/User/header-and-footer/header.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mangan Tayo</title>
    <!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha384-KyZXEAg3QhqLMpG8r+Knujsl5/3U09t5I03D0H+6+gU4s5+56iG1c3f3Dz5J5oC" crossorigin="anonymous"></script>

    <script type="text/javascript" src="Frontend/User/script.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1CmrxMRARb6aLqgBO7yyAxTOQE2AKb9GfXnE6gouai5w6G3TfPwhClZk5pgtZ8zb" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<link rel="stylesheet" href="index.css">
    <style>
        body {
            margin-top: 100px;
        }

        
    </style>
</head>
<body>

    <!--FIRST SECTION CAROUSEL -->
    <div id="carouselExampleControls" class="carousel slide m-10" data-bs-ride="carousel" >
        <div class="carousel-inner">
 <!-- First Slide (first 4 items) -->
            <div class="carousel-item active">
                <div class="cards-wrapper d-flex justify-content-center">

                    <div id="carousel-container">
                        
                    </div>
                    <div class="head-card">
                        <a href="../mangan-tayo/Frontend/User/specified-recipe.php?id=22">
                            <img src="Frontend/User/assets/adobo.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <p class="card-text">Adobo</p>
                            </div>
                        </a>
                    </div>

                    <div class="head-card">
                        <a href="../mangan-tayo/Frontend/User/specified-recipe.php?id=30">
                            <img src="Frontend/User/assets/sinigang.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <p class="card-text">Sinigang</p>
                            </div>
                        </a>
                    </div>

                    <div class="head-card">
                        <a href="../mangan-tayo/Frontend/User/specified-recipe.phpid=23">
                            <img src="Frontend/User/assets/bistek.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <p class="card-text">Bistek Tagalog</p>
                            </div>
                        </a>
                    </div>

                    <div class="head-card">
                        <a href="../mangan-tayo/Frontend/User/specified-recipe.phpid=27">
                            <img src="Frontend/User/assets/lechon.jpeg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <p class="card-text">Lechon</p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Second Slide (next 4 items) -->
            <div class="carousel-item">
                <div class="cards-wrapper d-flex justify-content-center">
                    <div class="head-card">
                        <a href="../mangan-tayo/Frontend/User/specified-recipe.phpp?id=24">
                            <img src="Frontend/User/images/bulalo.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <p class="card-text">Bulalo</p>
                            </div>
                        </a>
                    </div>

                    <div class="head-card">
                        <a href="../mangan-tayo/Frontend/User/specified-recipe.php?id=34">
                            <img src="Frontend/User/images/bopis.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <p class="card-text">Bopis</p>
                            </div>
                        </a>
                    </div>

                    <div class="head-card">
                        <a href="../mangan-tayo/Frontend/User/specified-recipe.phpid=46">
                            <img src="Frontend/User/images/pork nilaga.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <p class="card-text">Pork Nilaga</p>
                            </div>
                        </a>
                    </div>

                    <div class="head-card">
                        <a href="../mangan-tayo/Frontend/User/specified-recipe.php">
                            <img src="Frontend/User/images/sisig.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <p class="card-text">Sisig</p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>

       <!-- FIRST SECTION CAROUSEL CONTROLS -->
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden"></span>
        </button>
    </div>

    <!--SECOND SECTION EXPLORE RECIPES -->
    <div class="explore-recipes">
        <h1>EXPLORE RECIPES</h1>
        <div class="explore-recipes-content">
            <div class="row justify-content-center mx-auto">
                <div class="mx-2">
                    <a href="../mangan-tayo/Frontend/User/recipe.php" class="btn btn-block btn-explore-recipe" style="background-color: #FFBD59; color:white;">BEST FILIPINO FOOD</a>
                </div>
                <div class="mx-2">
                    <a href="../mangan-tayo/Frontend/User/recipe.php" class="btn btn-block btn-explore-recipe">BUDGET MEALS</a>
                </div>
                <div class="mx-2">
                    <a href="../mangan-tayo/Frontend/User/recipe.php" class="btn btn-block btn-explore-recipe">CLASSIC ULAM</a>
                </div>
                <div class="mx-2">
                    <a href="../mangan-tayo/Frontend/User/recipe.php" class="btn btn-block btn-explore-recipe">SAUCY ULAM</a>
                </div>
            </div>

            <!-- SECOND SECOND EXPLORE RECIPES CARDS -->
            <div>
                <div class="cards-wrapper">
                    <div class="explore-recipes-card">
                        <img src="Frontend/User/assets/adobo.jpg" alt="">
                        <div class="hover-overlay"></div>
                        <div class="hover-text">Adobo</div>
                    </div>
                    <div class="explore-recipes-card">
                        <img src="Frontend/User/assets/bistek.jpg" alt="">
                        <div class="hover-overlay"></div>
                        <div class="hover-text">Bistek Tagalog</div>
                    </div>
                    <div class="explore-recipes-card">
                        <img src="Frontend/User/assets/lechon.jpeg" alt="">
                        <div class="hover-overlay"></div>
                        <div class="hover-text">Lechon</div>
                    </div>
                    <div class="explore-recipes-card">
                        <img src="Frontend/User/assets/sinigang.jpg" alt="">
                        <div class="hover-overlay"></div>
                        <div class="hover-text">Sinigang</div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>

    <!--THIRD SECTION NEW RECIPE -->
    <div class="thirdSection d-flex justify-content-between">
        
        <div class="new-recipe w-50">
            <img src="Frontend/User/assets/adobo.jpg" alt="">
        </div>
        <div class="recipe-description text-center d-flex align-items-center justify-content-center w-50">
            <div class="px-4">
                <p class="new">NEW RECIPE</p>
                <p class="recipe">ADOBO</p>
                <p class="description">Adobo is a beloved Filipino dish known for its savory, tangy, and slightly sweet flavor. It typically features chicken, pork, or both, slow-cooked in a rich blend of vinegar, soy sauce, garlic, bay leaves, and peppercorns. </p>

                <a href="../mangan-tayo/Frontend/User/specified-recipe.php?id=22"> <p class="view-new-recipe"><u>VIEW RECIPE</u></p></a>
            </div>
        </div>

    </div>

    <!-- FOURTH SECTION MUST TRY FILIPINO FOOD-->
<div id="carouselExampleControl" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner mb-4">
        <h1 class="text-center mb-4 mt-4">MUST TRY FILIPINO FOOD</h1>

        <div class="carousel-item active">
            <div class="container-fluid mb-2">
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <div class="p-5 card must-try-card">
                            <div class="row">
                                <div class="col-md-6 ">
                                    <img src="Frontend/User/images/Monggo2.png" class="card-img img-fluid" alt="Adobo">
                                </div>
                                <div class="col-md-6">
                                    <div class="card-body">
                                        <h5 class="card-title fw-bolder" style="font-weight: 900;">Ginisang Monggo</h5>
                                        <p class="card-text">A popular Filipino dish made from mung beans (monggo) sautéed with garlic, onion, and tomatoes. Often combined with vegetables and sometimes meat, this hearty dish is nutritious and flavorful, commonly served with rice. It is a staple comfort food, especially during Lent.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="p-5 card must-try-card">
                            <div class="row">
                                <div class="col-md-6">
                                    <img src="Frontend/User/images/laing.jpg" class="card-img img-fluid" alt="Adobo">
                                </div>
                                <div class="col-md-6">
                                <div class="card-body">
                                        <h5 class="card-title" style="font-weight: 900;">Laing</h5>
                                        <p class="card-text">Laing is a popular Filipino dish made from dried taro leaves cooked in coconut milk with chili and various seasonings. Originating from Bicol, a region known for its spicy dishes, laing is rich and creamy, often enjoyed as a side dish or main course, typically served with rice.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    
                </div>
            </div>
        </div>

        <!-- Second Carousel Item -->
        
    </div>

    <!--FOURTH SECTION MUST TRY CAROUSEL -->
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControl" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden"></span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControl" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden"></span>
    </button>
</div>

<!-- FIFTH SECTION -->
<div class="position-relative text-white" style="background-image: url('Frontend/User/assets/cook.jpg'); background-size: cover; background-position: center; height: 250px;">
        <div class="d-flex justify-content-center align-items-center h-100">
            <h1 class="fw-bold text-white" id="cook-style">COOK, SHARE AND ENJOY</h1>
        </div>
</div>

<!-- FOOTER -->
<?php
 include 'Frontend/User/header-and-footer/footer.php';
?>
<script src="index.js"></script>
</body>
</html>


