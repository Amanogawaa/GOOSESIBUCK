<?php

include 'components/connect.php';

session_start();

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
} else {
    $user_id = '';
}

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $email = filter_var($email, FILTER_SANITIZE_STRING);
    $pass = $_POST['pass'];
    $pass = filter_var($pass, FILTER_SANITIZE_STRING);

    if (empty($email) || empty($pass)) {
        $message[] = 'Please fill all the blank area';
    } else {
        $select_user = $conn->prepare("SELECT * FROM `users` WHERE email = ? AND password = ?");
        $select_user->execute([$email, $pass]);
        $row = $select_user->fetch(PDO::FETCH_ASSOC);
        if ($select_user->rowCount() > 0) {
            $_SESSION['user_id'] = $row['id'];
            $message[] = 'Login Successfully';
            header("refresh:1;url=home.php");
        } else {
            $message[] = 'Incorrect credentials';
        }
    }
}

include 'components/add_cart.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <!-- swiper cdn -->
    <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" href="https://c.files.bbci.co.uk/12B60/production/_109004667_02untitledgoosegamescreen3840x2160.png" type="image/x-icon">

</head>

<body>
    <!-- header -->
    <?php include 'components/user_header.php'; ?>

    <!-- register section -->
    <div class="login">
        <div class="login-container">
            <form action="" method="post">
                <h1 class="title">Login</h1>
                <input type="email" name="email" placeholder="Email" maxlength="50" class="box">
                <input type="password" name="pass" placeholder="Password" maxlength="50" class="box" oninput="this.value = this.value.replace(/\s/g,'')">
                <input type="submit" value="Login" name="submit" class="btn">
                <p>Dont have an account? <a href="register.php">Register Now</a></p>
            </form>
        </div>

    </div>


    <!-- footer -->
    <?php include 'components/footer.php'; ?>


    <!-- scripts -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script> <!-- custom js file link  -->
    <script src="js/script.js"></script>
</body>

</html>