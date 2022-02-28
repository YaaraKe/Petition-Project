<!DOCTYPE html>
<html lang="en">
  <head>

    <title>LOGIN</title>

    <link rel="stylesheet" type="text/css" href="style.css">

</head>

<body>

     <form action="login.php" method="post">

        <h2>LOGIN</h2>

        <?php if (isset($_GET['error'])) { ?>

            <p class="error"><?php echo $_GET['error']; ?></p>

        <?php } ?>

        <label>Email Address</label>

        <input type="text" name="uname" placeholder="Email"><br>

        <label>Password</label>

        <input type="password" name="password" placeholder="Password"><br> 

        <button type="submit" name="but_submit">Login</button>

     </form>

    <form action="register.php" method="post">

        <button type="submit" name="reg">Register now!</button>

    </form>

</body>
</html>