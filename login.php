
<?php
require_once 'vendor/autoload.php';
session_start();

$client = new Google_Client();
$client->setClientId('758968182910-aotjkgqkbf4jarvrlobmj5i2m77suo10.apps.googleusercontent.com');
$client->setClientSecret('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');
$client->setRedirectUri('http://localhost/mangan-tayo/login.php');
$client->addScope('email');
$client->addScope('profile');


if (isset($_GET['code'])) {
    try {
        // Exchange authorization code for an access token
        $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
        
        // Set the access token for further use
        $client->setAccessToken($token);

        // Check for errors
        if (isset($token['error'])) {
            throw new Exception($token['error_description']);
        }

        // Get user info from Google
        $oauth = new Google_Service_Oauth2($client);

        $userInfo = $oauth->userinfo->get();

        // Store user information in session (or handle database storage)
        $_SESSION['email'] = $userInfo->email;
        $_SESSION['name'] = $userInfo->name;
     

        // Redirect to dashboard or another page
        header('Location: Backend/request.php?google_auth'); // Replace with your dashboard page
        
        $client->revokeToken();
        exit;
    } catch (Exception $e) {
        echo 'Error: ' . $e->getMessage();
        exit;
    }
}   
// Generate a login URL
$loginUrl = $client->createAuthUrl();

// Initialize Facebook SDK
$fb = new \Facebook\Facebook([
    'app_id' => '', // Replace with your App ID
    'app_secret' => '', // Replace with your App Secret
    'default_graph_version' => 'v16.0',
]);

// Get the Facebook redirect login helper
$helper = $fb->getRedirectLoginHelper();

// Define permissions
$permissions = ['email']; // Optional permissions
$callbackUrl = 'http://localhost/mangan-tayo/fbAuth.php'; // Your redirect URL

// Generate Facebook login URL
$fbloginUrl = $helper->getLoginUrl($callbackUrl, $permissions);

// Check if a Facebook token exists
?>
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
    <div class="container-fluid d-flex align-items-center justify-content-center full-screen-container">
        <div>
            <img src="Frontend/User/assets/mangan.png" alt="">
        </div>
        <div class="w-50 mx-2 login-form d-flex align-items-center justify-content-center">
            <form action="Backend/request.php" class="rounded shadow-lg rounded login" method="POST">
                <label for="exampleFormControlInput1" class="form-label rounded">Email address</label>
                <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Enter your email" name="email" required>
                <label for="exampleFormControlInput1" class="mt-2 form-label">Password</label>
                <input type="password" class="form-control rounded" id="exampleFormControlInput1" placeholder="Enter your password" name="password" required><br>
                <button type="submit" class="btn" name="login">LOGIN</button>
                <div class="text-center mt-2 fs-6">
                    <p>Don't have an account yet? <a href="create_account.php">Create</a></p>
                </div>
                <hr>
                <div class="text-center mt-4">
                    <a class="py-2 px-3 border rounded-pill text-decoration-none  text-black  hover-effect" href="<?php echo htmlspecialchars($loginUrl); ?>"><img src="Frontend/User/assets/google.png" alt="google logo" width="25px" style="margin-right: 10px;">Sign in with Google</a>
                </div>
                <div class="text-center mt-4">
                    <a class="py-2 px-3 border rounded-pill text-decoration-none  text-black  hover-effect" href="<?php echo htmlspecialchars($fbloginUrl); ?>"><img src="Frontend/User/assets/facebook.png" alt="google logo" width="25px" style="margin-right: 10px;">Sign in with Facebook</a>
                </div>
            </form>
        </div>
    </div>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
