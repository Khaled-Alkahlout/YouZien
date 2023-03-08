<!DOCTYPE html>
<html lang="nl">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/adminHome.css">
    <script src="https://kit.fontawesome.com/d3399b8b8c.js" crossorigin="anonymous"></script>
    <title>YouZien</title>
</head>
<header>
<?php
    include("Connection.php");
?>
<div class="pageHeader">
    <ul>
        <li><i class="fa-brands fa-youtube"></i></li>
        <li class="WebsiteName">YouZien</li>
        <li class="Uitloggen">Uitloggen</li>
    </ul>
</div>
</header>
<body>
    <video controls class="Video"></video>
    <p class="videoTitle">Video title</p>
    <p class="vastgesteldeVideoWoord">Vastgestelde video's</p>
    <table>
        <tr>
            <td>
                <video controls class="vastgesteldeVideos"></video>
            </td>
            <td>
                <p class="vastgesteldeVideoTitle">Video title</p>
            </td>
        </tr>
        <tr>
            <td>
                <video controls class="vastgesteldeVideos"></video>
            </td>
            <td>
                <p class="vastgesteldeVideoTitle">Video title</p>
            </td>
        </tr>
        <tr>
            <td>
                <video controls class="vastgesteldeVideos"></video>
            </td>
            <td>
                <p class="vastgesteldeVideoTitle">Video title</p>
            </td>
        </tr>
    </table>
</body>
<footer>
    <p class="Copyright">Copyright</p>
    <i class="fa-regular fa-copyright"></i>
</footer>
</html>