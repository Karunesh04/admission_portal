<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/login.css">
</head>

<body>
    <div class="wrapper">
        <div class="form-wrapper sign-in">
            <img src="images/logo1.png" alt="logo">
            <form action="login_verify.php" method="post">
                <h2>Admission Portal</h2>
                <p>
                    <?php
                        error_reporting(0);
                        session_start();
                        session_destroy();

                        echo $_SESSION['loginMessage'];
                    ?>
                </p>
                <div class="input-group">
                    <input id="login_username" type="text" name="username" required />
                    <label for="login_username">Username</label>
                </div>
                <div class="input-group">
                    <input id="login_password" type="password" name="password" required />
                    <label for="login_password">Password</label>
                </div>
                <button type="submit">Login</button>
            </form>
            <a class="home" href="index.php" style="font-weight:bold;">Home</a>
        </div>
    </div>
</body>

</html>