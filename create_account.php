<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="Frontend/Admin/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
 
</head>
<body>
<div class="container-fluid d-flex align-items-center justify-content-center full-screen-container  min-h-100">
        <div>
            <img src="Frontend/User/assets/mangan.png" alt="">
        </div>
        <div class="w-50  mx-2 login-form d-flex align-items-center justify-content-center ">
            <form action="Backend/request.php" class=" rounded shadow-lg rounded login" method="POST">
                <label for="exampleFormControlInput1" class="form-label rounded">Username</label>
                <input type="text" class="form-control" id="exampleFormControlInput1 rounded" placeholder="Enter your email" name="username" required>
                <label for="exampleFormControlInput1" class="form-label rounded">Email address</label>
                <input type="email" class="form-control" id="exampleFormControlInput1 rounded" placeholder="Enter your email" name="email" required>
                <label for="exampleFormControlInput1" class="mt-2 form-label">Password</label>
                <input type="password" class="form-control rounded" id="exampleFormControlInput1" placeholder="Enter your password" name="password" required><br>
                <hr>
                <div class="text-center">
                    <button type="submit" id="login" name="create">CREATE </button>
                    <p>Already have an account? <a href="login.php">Login</a></p>
                </div>
            </form>
        </div>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>