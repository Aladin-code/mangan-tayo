<?php
    include 'header-and-footer/header.php';
    require "../../Backend/db.php";
    $mydb = new myDB();
    $id = isset($_GET['id']) ? intval($_GET['id']) : 0;
    $mydb->select('blog_content', '*', ['blogID' => $id]);
    $blog_data = $mydb->res;

    $mydb->getComments($id);
    $comments = $mydb->res;

    $userID = isset($_SESSION['userID']) ? $_SESSION['userID'] : null; // Get the logged-in user ID from session
    
    $liked = $mydb->hasLiked($userID, $id);
    $heartclass = $liked ? 'fa-solid' : 'fa-regular';
    $heartcolor = $liked ? '#FFBD59' : 'black';
    
?>

   

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1CmrxMRARb6aLqgBO7yyAxTOQE2AKb9GfXnE6gouai5w6G3TfPwhClZk5pgtZ8zb" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <style>
        body {
            margin-top: 100px;
        }
        #likeButton {
            color: <?php echo $heartColor; ?>; /* Set the heart color dynamically */
        }
    </style>
    <link rel="stylesheet" href="specified.css">
</head>
<body>
    
    <!-- YUNG ANO ALL RECIPES>SPECIFIED RECIPE -->
    <div class="container ">
        <div class="">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="recipe.php">ALL RECIPES</a></li>
                <li class="breadcrumb-item" style="color: #FFBD59; ">SPECIFIED RECIPE</li>
            </ol>
        </div>

    <!-- SPECIFIED RECIPE BODY -->
     <div class="container recipe-cont shadow p-3 mb-5 bg-white rounded border">
     <?php while ($row = mysqli_fetch_assoc($blog_data)): ?>
        <div class="text-center mb-4">
            <p class="recipe-category"><?= $row['category'] ?></p>
            <h1 class="recipe-title"><?= $row['title'] ?></h1>
        </div>
        <div class="px-5 container  text-center img-container">
        <img src="images/<?= $row['img'] ?>" alt="<?= $row['title'] ?>" class="recipe-image img-fluid">
        </div>
        <!-- Recipe Description -->
        <div class="text-center my-4 description container-fluid">
                
            <p><?= stripslashes($row['description']);  ?></p>
        </div>

        <!-- Ingredients and Procedure -->
        <div class="row px-5">
            <div class="col-md-6">
                  <!-- INGREDIENTS -->
                  <div class="ingredients">
                        <h3 class="ingre-proce-title">INGREDIENTS</h3>
                        <?php
                       $ingredients = str_replace("\\r\\n", "\n", $row['ingredients']); 
                       $ingredientsFormatted = nl2br(htmlspecialchars($ingredients)); // Convert newlines to <br> and escape HTML
                       // Convert newlines to <br> and escape HTML
                        ?>
                        <p><?= $ingredientsFormatted ?></p> <!-- Display the formatted ingredients -->
                    </div>  

            </div>

            <div class="col-md-6">
                <!-- PROCEDURE -->
                <div class="procedure">
                    <h3 class="ingre-proce-title">PROCEDURE</h3>
                    <?php
                       $procedure = str_replace("\\r\\n", "\n", $row['recipe_procedure']); // Replace \r\n with \n
                       $procedureFormatted = nl2br(htmlspecialchars($procedure)); // Convert newlines to <br> and escape HTML
                       // Convert newlines to <br> and escape HTML
                        ?>
                   <p><?= $procedureFormatted ?></p>
                </div>
            </div>
        </div>
        <?php endwhile;?>
    </div>

       <!-- COMMENT SECTION -->
        <div class="comment-section container-fluid">
            <div class="row mb-2 d-flex align-items-center justify-content-center">
            <i id="likeButton" class="<?= $heartclass; ?> fa-heart fa-2x col-1" style="cursor: pointer;color: <?= $heartcolor ?>;" data-blog-id="<?= $id ?>" onclick="toggleLike(this)"></i>
                <input id="commentInput" type="text" class="form-control col-9" placeholder="Comment here...">
                <i id="shareButton" class="fa-solid fa-share fa-2x col-1" style="cursor: pointer;" onclick="copyLink()"></i>
            </div>
            <div class="row  " style="padding-left:55px">
                <p id="likeCount" class="text-left "><span id="totalLikes">1 </span> likes</p>
            </div>
            <!-- Comment List -->
            <div id="commentList">

            </div> 
        </div>
        
        </div>
        <script>
            const blogID = <?= json_encode($id) ?>;  
            const userID = <?= json_encode($userID) ?>; 
        </script>
    <script src="specified_recipe.js"></script>
<?php
    include 'header-and-footer/footer.php';
  
?>

</body>
</html>
