<?php
session_start();
require 'vendor/autoload.php';
use Facebook\Facebook;

// Initialize Facebook SDK
$fb = new \Facebook\Facebook([
    'app_id' => '', // Replace with your App ID
    'app_secret' => '', // Replace with your App Secret
    'default_graph_version' => 'v16.0',
]);

try {
    // Get the Facebook redirect login helper
    $helper = $fb->getRedirectLoginHelper();

    // Check if the 'state' parameter exists in the URL
    if (isset($_GET['state'])) {
        // Store the state parameter in the session
        $_SESSION['FBRLH_state'] = $_GET['state'];
    }

    // Get the access token from the helper
    $accessToken = $helper->getAccessToken();

    if (isset($accessToken)) {
        // Save the access token in the session for further use
        $_SESSION['code'] = (string)$accessToken;

        // Use the access token to get user information
        $response = $fb->get('/me?fields=id,name,email', $accessToken);
        $user = $response->getGraphUser();

        // Store user data in session or database
        $_SESSION['fb_user_name'] = $user['name'];
        $_SESSION['fb_user_email'] = $user['email'];

        // Redirect to a dashboard or another page
        header('Location: Backend/request.php?facebook_auth');
        exit;
    } elseif ($helper->getError()) {
        // If an error occurs
        throw new Exception($helper->getError());
    }
} catch (Facebook\Exceptions\FacebookResponseException $e) {
    // When Graph API returns an error
    echo 'Graph API Error: ' . $e->getMessage();
    exit;
} catch (Facebook\Exceptions\FacebookSDKException $e) {
    // When validation fails or other local issues
    echo 'Facebook SDK Error: ' . $e->getMessage();
    exit;
}
?>
