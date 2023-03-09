<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/Inloggen.css">
    <script src="https://kit.fontawesome.com/d3399b8b8c.js" crossorigin="anonymous"></script>
    <title>YouZien</title>
</head>
<header>
<div class="pageHeader">
    <ul>
        <li><i class="fa-brands fa-youtube"></i></li>
        <li class="WebsiteName">YouZien</li>
    </ul>
</div>
</header>
<body>
    <div class="Login">
        <p class="Inloggen">Inloggen</p>
        <form method="POST" action="">
        <label>Gebruikersnaam</label>
        <br>
        <Input type="text" name="username"/>
        <br><br>
        <label>Wachtwoord</label>
        <br>
        <Input type="password" name="password"/>
        <br><br>
        <Input type="submit" name="submit" value="Inloggen" class="LogInbutton"/>
        </form>
        <?php
        try {
            include("Connection.php");
            if(isset($_POST["submit"])) {
                if(empty($_POST["username"]) || empty($_POST["password"])) {
                    echo '<p style="text-align: center; color: #f1f1f1;">All fields are required</p>';
                } else {
                    $query = "SELECT * FROM user WHERE username = :Username AND password = :Password";
                    $statement = $conn->prepare($query);
                    $statement->execute(
                        array(
                            'Username' => $_POST["username"],
                            'Password' => $_POST["password"]
                        )
                    );
                    $result = $statement->fetch(PDO::FETCH_ASSOC);
                    if($result) {
                        if ($result['is_admin'] == 1) {
                            echo "<script>window.location.replace('adminHome.php');</script>";
                        } else {
                            echo "<script>window.location.replace('index.php');</script>";
                        }
                    } else {
                        echo "<p style='text-align: center; color: #f1f1f1;'>Username or Password is wrong</p>";
                    }
                }
            }
        } catch(PDOException $error) {
            $message = $error->getMessage();
        }
        ?>
        <p class="WachtwoordVergetenVraag">Wachtwoord vergeten ?</p>
        <p class="RegisterenVraag">creëer je account aan ?</p>
    </div>
</body>
<footer>
    <p class="Copyright">Copyright</p>
    <i class="fa-regular fa-copyright"></i>
</footer>
</html>