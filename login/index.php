<?php

// include database configuration
include('login_script.php');

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login Tutorial</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/style.css" rel="stylesheet">
</head>

<body>

    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

        <label for="">Email</label>

        <input type="text" name="email_txt" id="inputemail_txt" class="form-control" autofocus>

        <label for="">Password</label>

        <input type="password" name="password_txt" id="inputpassword_txt" class="form-control">

        <button type="submit" name="btn_login" id="login">Login</button>



    </form>

</body>

</html>