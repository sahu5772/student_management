<?php
    include_once("config.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <link rel="stylesheet" href="css/panel.css">
</head>
<body>
    <main class="backg" style="text-align:center;margin:auto;color:#888888;font-weight:bold">

        <div class="log">
        <span class="user-img"><img src="./user1.jpg" alt="user1"></span>
        <?php include("messages.php");?>

            <form action="login.php" method="post">
                  
                <div class="user">
                    <ion-icon name="person-outline"></ion-icon>
                    <input type="text" name="username" placeholder="Username" required>
                </div>
                <div class="password">
                    <ion-icon name="lock-closed-outline"></ion-icon>
                    <input type="password" name="password" placeholder="Password" required>
                </div> 
                <div class="chack">
                    <span class="box-left"><input  class="chack-b" type="checkbox"><P class="rem">Remember me</P></span>
                    <a class="forgot" href="#">Forgot Password?</a>
                </div> 
                <div class="login">
                    <a href="#"><button type="submit" name="login">LOGIN</button></a>
                </div>
            </form>
        </div>
    </main>
</body>
</html>