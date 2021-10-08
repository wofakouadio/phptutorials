<?php
// start session
session_start();


// include database configuration
include('config.php');

// function to sanitize input from user
function Sanitize_Data($data)
{
    $data = trim($data);
    $data = htmlspecialchars($data);
    $data = stripslashes($data);
    return $data;
}


// declaring variables
$email = "";
$password = "";
$role = "";
$output = "";

// when the login button is clicked
if (isset($_POST["btn_login"])) {

    $email = Sanitize_Data($_POST["email_txt"]);
    $password = sha1($_POST["password_txt"]);

    // query to check if account exists in database
    $chk_user_acc_sql = "SELECT email, password, role FROM login_table WHERE email = '$email' && password = '$password'";

    // execute the query
    $chk_user_acc_exe = mysqli_query($conn, $chk_user_acc_sql);

    // check if query is executed
    if ($chk_user_acc_exe) {

        echo "Query has been executed successfully";
        // fetch count of the result
        if (mysqli_num_rows($chk_user_acc_exe) > 0) {

            echo "Yay, the record exits";

            // get matched records
            while ($chk_user_acc_row = mysqli_fetch_array($chk_user_acc_exe)) {

                $fetched_email = $chk_user_acc_row["email"];
                $fetched_role = $chk_user_acc_row["role"];
            }

            // add role to session for redirection
            // if role is admin
            if ($fetched_role == "Admin") {
                // add role and email to session
                $_SESSION['role'] = $fetched_role;
                $_SESSION['email'] = $fetched_email;
                // redirect to admin page
                echo "<script>window.location.href='admin.php'</script>";
            }
            if ($fetched_role == "User") {

                $_SESSION['role'] = $fetched_role;
                $_SESSION['email'] = $fetched_email;

                echo "<script>window.location.href='user.php'</script>";
            }
        } else {
            // no records
            echo "Sorry, the record does not exist";
        }
    } else {

        echo "Query has not been executed successfully";
    }
}
