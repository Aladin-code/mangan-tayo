<?php
require "db.php";
$mydb = new myDB();

function sanitizeInputs($data) {
    global $mydb; 
    $sanitizedData = [];
    foreach ($data as $key => $value) {
        if (is_string($value)) {
            $sanitizedData[$key] = $mydb->escape_string($value); 
        } else {
            $sanitizedData[$key] = $value; 
        }
    }
    return $sanitizedData;
}

if (isset($_POST['add_blog'])) {
    if (isset($_FILES['img']) && $_FILES['img']['error'] == 0) {
        $targetDir = "../Frontend/User/images/";
        $targetFile = $targetDir . basename($_FILES["img"]["name"]);
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
        $allowedTypes = array("jpg", "jpeg", "png");
        
        if (in_array($imageFileType, $allowedTypes)) {
            if (move_uploaded_file($_FILES["img"]["tmp_name"], $targetFile)) {
                echo "The file " . htmlspecialchars(basename($_FILES["img"]["name"])) . " has been uploaded.";
                unset($_POST['img']);
                unset($_POST['add_blog']);
                
                $data = sanitizeInputs($_POST); 
                $data['img'] = basename($_FILES["img"]["name"]); 
                $data['date'] = date('Y-m-d H:i:s'); 
                
                // Insert sanitized data into the database
                $mydb->insert("blog_content", $data);
                header("location: ../Frontend/Admin");
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        } else {
            echo "Sorry, only JPG, JPEG, & PNG files are allowed.";
        }
    } else {
        echo "No file was uploaded or there was an error with the upload.";
    }
}

if (isset($_POST['update_blog'])) {
    $blogID = $_POST['blogID']; // Assuming the blog ID is passed in the form

    // Initialize an array to store updated data
    $data = sanitizeInputs($_POST); 
    unset($data['update_blog']); // Remove the submit button data from the array

    // Check if a new image was uploaded
    if (isset($_FILES['img']) && $_FILES['img']['error'] == 0) {
        $targetDir = "../Frontend/User/images/";
        $targetFile = $targetDir . basename($_FILES["img"]["name"]);
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
        $allowedTypes = array("jpg", "jpeg", "png");
        
        if (in_array($imageFileType, $allowedTypes)) {
            if (move_uploaded_file($_FILES["img"]["tmp_name"], $targetFile)) {
                // Update the image field if a new file is uploaded
                $data['img'] = basename($_FILES["img"]["name"]);
            } else {
                echo "Sorry, there was an error uploading your file.";
                exit;
            }
        } else {
            echo "Sorry, only JPG, JPEG, & PNG files are allowed.";
            exit;
        }
    } else {
        // If no new image was uploaded, keep the old image
        unset($data['img']);
    }

    // Update the date to current timestamp
    $data['date'] = date('Y-m-d H:i:s');

    // Now update the database with the new data
    $mydb->update('blog_content', $data, ['blogID' => $blogID]);

    // Redirect to the admin page after successful update
    header("location: ../Frontend/Admin/");
    exit;
}

if (isset($_POST['get_blogs'])) {
    $mydb->select('blog_content');
    $datas = [];
    while ($row = $mydb->res->fetch_assoc()) {
        array_push($datas, $row);
    }
    echo json_encode($datas);
    exit;
}
if (isset($_POST['get_filtered_blogs'])) {
    // Fetch all blogs if "all" category is selected
    if ($_POST['category'] == "all") {
        $mydb->select('blog_content'); // Fetch all records
        $datas = [];
        while ($row = $mydb->res->fetch_assoc()) {
            array_push($datas, $row);
        }
        echo json_encode($datas);
        exit;
    }
    // Fetch blogs based on selected categories
    else if ($_POST['category'] == "filipino") {
        $mydb->select('blog_content', '*', ['category' => 'Best Filipino Food']); // Adjusted to use the where condition
        $datas = [];
        while ($row = $mydb->res->fetch_assoc()) {
            array_push($datas, $row);
        }
        echo json_encode($datas);
        exit;
    }
    else if ($_POST['category'] == "budget") {
        $mydb->select('blog_content', '*', ['category' => 'Budget Meals']); // Adjusted to use the where condition
        $datas = [];
        while ($row = $mydb->res->fetch_assoc()) {
            array_push($datas, $row);
        }
        echo json_encode($datas);
        exit;
    }
    else if ($_POST['category'] == "classic") {
        $mydb->select('blog_content', '*', ['category' => 'Classic Ulam']); // Adjusted to use the where condition
        $datas = [];
        while ($row = $mydb->res->fetch_assoc()) {
            array_push($datas, $row);
        }
        echo json_encode($datas);
        exit;
    }
    else if ($_POST['category'] == "saucy") {
        $mydb->select('blog_content', '*', ['category' =>'Saucy Ulam']); // Adjusted to use the where condition
        $datas = [];
        while ($row = $mydb->res->fetch_assoc()) {
            array_push($datas, $row);
        }
        echo json_encode($datas);
        exit;
    }
}


if (isset($_GET['delete_blog'])) {
    $id = $_GET['delete_blog'];
    $mydb->delete('blog_content', ['blogID' => $id]);
    header("location: ../Frontend/Admin/");
}

if (isset($_POST['search_blog'])) {
    $search_value = $_POST['search_value'];
    $datas = $mydb->search('blog_content', sanitizeInputs(['search_value' => $search_value])['search_value']);
    echo json_encode($datas);
}

if (isset($_POST['login'])) {
    session_start();
    $email = $_POST['email'];
    $password = $_POST['password'];
    $email = $mydb->escape_string($email);
   
    $mydb->select("user_tbl", "*",['email' => $email]);
    if ($mydb->res && $mydb->res->num_rows === 1) {
        $user = $mydb->res->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            if ($user['user_type'] == "user") {
                $_SESSION['email'] = $user['email'];
                $_SESSION['userID'] = $user['userID'];
                $_SESSION['username'] = $user['username'];
                header("Location: ../");
            } else if ($user['user_type'] == "admin") {
                $_SESSION['admin'] = $user['user_type'];
                header("Location: ../Frontend/Admin");
            }
        } else {
            echo "Invalid password.";
        }
    } else {
        echo "No user found with that email.";
    }
}
if(isset($_GET['google_auth'])){
    echo "success";
    session_start();
    $email = $_SESSION['email'];
    $name = $_SESSION['name'];

    $mydb->select("user_tbl", "*",['email' => $email]);
    if ($mydb->res && $mydb->res->num_rows === 1) {
        $user = $mydb->res->fetch_assoc();
        
        if ($user['user_type'] == "user") {
            $_SESSION['email'] = $user['email'];
            $_SESSION['userID'] = $user['userID'];
            $_SESSION['username'] = $user['username'];
            header("Location: ../");
        } else if ($user['user_type'] == "admin") {
            $_SESSION['admin'] = $user['user_type'];
            header("Location: ../Frontend/Admin");
        }
        
    } else {
        $data = [
            "username" => $name,
            "email" => $email,
            "password" => $name,
            "user_type" => "user"
        ];
        $data['password'] = password_hash($data['password'], PASSWORD_BCRYPT);
        $mydb->insert("user_tbl", $data);
        header("location: ../Backend/request.php?google_auth");
    }
}
if(isset($_GET['facebook_auth'])){
    echo "success";
    session_start();
    $email = $_SESSION['fb_user_email'];
    $name = $_SESSION['fb_user_name'];

    $mydb->select("user_tbl", "*",['email' => $email]);
    if ($mydb->res && $mydb->res->num_rows === 1) {
        $user = $mydb->res->fetch_assoc();
        
        if ($user['user_type'] == "user") {
            $_SESSION['email'] = $user['email'];
            $_SESSION['userID'] = $user['userID'];
            $_SESSION['username'] = $user['username'];
            header("Location: ../");
        } else if ($user['user_type'] == "admin") {
            $_SESSION['admin'] = $user['user_type'];
            header("Location: ../Frontend/Admin");
        }
        
    } else {
        $data = [
            "username" => $name,
            "email" => $email,
            "password" => $name,
            "user_type" => "user"
        ];
        $data['password'] = password_hash($data['password'], PASSWORD_BCRYPT);
        $mydb->insert("user_tbl", $data);
        header("location: ../Backend/request.php?facebook_auth");
    }
}

if(isset($_POST['create'])){
    unset($_POST['create']);
    $data = sanitizeInputs($_POST); 
    $data['password'] = password_hash($data['password'], PASSWORD_BCRYPT);
    $data['user_type'] = "user";
    $mydb->insert("user_tbl", $data);
    header("location: ../login.php");
}

if(isset($_POST['like'])){
    $userID = isset($_POST['userID']) ? intval($_POST['userID']) : 0;
    $blogID = isset($_POST['blogID']) ? intval($_POST['blogID']) : 0;
    if (isset($_POST['add_like'])) {
        $mydb->insert('likes', [
            'userID' => $userID,
            'blogID' => $blogID
        ]);
    } elseif (isset($_POST['remove_like'])) {
        $mydb->delete('likes', [
            'userID' => $userID,
            'blogID' => $blogID
        ]);
    }
    echo json_encode(['success' => true]);
    exit;
}
if(isset($_POST['add_comment'])){
    unset($_POST['add_comment']);
    $data = sanitizeInputs($_POST); 
    $mydb->insert('comments', $data);
}

if (isset($_POST['fetch_comments'])) {
    $blogID = intval($_POST['blogID']);
    $mydb->getComments($blogID);
    $datas = [];
    while ($row = $mydb->res->fetch_assoc()) {
        array_push($datas, $row);
    }
    echo json_encode($datas);
    exit;
}
if(isset($_POST['get_likes'])){
    unset($_POST['get_likes']);
    $data = sanitizeInputs($_POST); 
    $blogID = $data['blogID']; 
    $totalLikes = $mydb->getLikes("likes", $blogID);
    echo json_encode(['totalLikes' => $totalLikes]);
}

if (isset($_POST['check_like'])) {
    $userID = $_POST['userID'];
    $blogID = $_POST['blogID'];
    $liked = $mydb->hasLiked($userID, $blogID); 
    echo json_encode(['liked' => $liked]);
    exit;
}

?>
