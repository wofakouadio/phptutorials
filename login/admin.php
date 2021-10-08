<?php

session_start();

if (!isset($_SESSION['email']) && !isset($_SESSION['role'])) {
    session_destroy();
    echo "<script>window.location.href='index.php'</script>";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin Dashboard</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/style.css" rel="stylesheet">
</head>

<body>

    <h1>Hello <?php echo $_SESSION["role"] ?> I have logged in into admin dashboard</h1>
    <h4><?php echo $_SESSION["email"] ?></h4>

</body>

</html>