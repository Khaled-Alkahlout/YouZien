<?php

// Initialize database connection
$dsn = 'mysql:host=localhost;dbname=YouZien';
$username = 'root';
$password = '';

include("Connection.php");

// Check if the form has been submitted
if (isset($_POST['submit'])) {

    // Get the submitted form data
    $title = $_POST['title'];
    $year = $_POST['year'];
    $description = $_POST['description'];

    // Upload the video file to the server
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);

    // Insert the video data into the database
    $query = "INSERT INTO movie (title, url, year, description) VALUES (:title, :url, :year, :description)";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':url', $target_file);
    $stmt->bindParam(':year', $year);
    $stmt->bindParam(':description', $description);
    $stmt->execute();

    // Redirect to the home page or the page where the video was uploaded
    header("Location: adminHome.php");
    exit;
}

?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/addVideo.css"/>
    <script src="https://kit.fontawesome.com/d3399b8b8c.js" crossorigin="anonymous"></script>
    <title>Adding videos</title>
</head>
<header>
    <div class="pageHeader">
        <ul>
            <li><i class="fa-brands fa-youtube"></i></li>
            <li class="WebsiteName">YouZien</li>
            <li class="Terug">Terug</li>
        </ul>
    </div>
</header>
<body>
    <div class="uploadForm">
    <!-- HTML form to upload video -->
    <form action="" method="post" enctype="multipart/form-data">
        <p class="videoToevoegen">Video toevoegen</p>
        <label for="title">Title:</label>
        <input type="text" name="title" id="title">
        <br><br>
        <label for="year">Jaar:&#160;</label>
        <input type="text" name="year" id="year">
        <br><br>
        <label for="description" class="beschrijvenwoord">Beschrijven</label>
        <br><br>
        <textarea name="description" id="description"></textarea>
        <br><br>
        <label for="fileToUpload" class="selectVideo">Select video to upload:</label>
        <input type="file" name="fileToUpload" id="fileToUpload">
        <br><br>
        <input type="submit" name="submit" class="uploadVideo" value="Upload Video">
    </form>
    </div>
</body>
<footer>
    <p class="Copyright">Copyright</p>
    <i class="fa-regular fa-copyright"></i>
</footer>
</html>