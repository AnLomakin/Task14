<?php 
    include ('functions.php');
    session_start();
    $auth = $_SESSION['auth'] ?? null;
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>SPA Personal page</title>
    <link rel="stylesheet" href="style.css" type="text/css" />
</head>
<body>
    <div class="welcomeBox">
    <div class="welcome">Добро пожаловать, <?php echo getCurrentUser(); ?></div>
    <div class="welcome"><a href="index.php">На главную</a></div>
    </div>
</body>
</html>