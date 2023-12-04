<?php

include 'components/connect.php';

session_start();

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
} else {
    $user_id = '';
}

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $name = filter_var($name, FILTER_SANITIZE_STRING);
    $email = $_POST['email'];
    $email = filter_var($email, FILTER_SANITIZE_STRING);
    $number = $_POST['number'];
    $number = filter_var($number, FILTER_SANITIZE_STRING);
    $pass = $_POST['pass'];
    $pass = filter_var($pass, FILTER_SANITIZE_STRING);
    $cpass = $_POST['cpass'];
    $cpass = filter_var($cpass, FILTER_SANITIZE_STRING);

    $select_user = $conn->prepare("SELECT * FROM `users` WHERE email = ? OR number = ?");
    $select_user->execute([$email, $number]);
    $row = $select_user->fetch(PDO::FETCH_ASSOC);

    if ($select_user->rowCount() > 0) {
        $message[] = 'Email or number is already in used';
    } else {
        if ($pass != $cpass) {
            $message[] = 'Password does not match';
        } else {
            $insert_user = $conn->prepare("INSERT INTO `users`(name, email, number, password) VALUES (?,?,?,?)");
            $insert_user->execute([$name, $email, $number, $cpass]);
            $confirm_user = $conn->prepare("SELECT * FROM `users` WHERE email = ? AND password = ?");
            $confirm_user->execute([$email, $pass]);

            if ($confirm_user->rowCount() > 0) {
                $row = $confirm_user->fetch(PDO::FETCH_ASSOC);
                $_SESSION['user_id'] = $row['id'];
                $message[] = 'Registered Successfully!';
                header("refresh:2;url=home.php");
            }
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
    <title>home</title>

    <!-- swiper cdn -->
    <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />
    <link rel="icon" href="https://c.files.bbci.co.uk/12B60/production/_109004667_02untitledgoosegamescreen3840x2160.png" type="image/x-icon">

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css">

</head>

<body>
    <!-- header -->
    <?php include 'components/user_header.php'; ?>

    <!-- register section -->
    <div class="form-container">
        <form action="" method="post">
            <h1 class="title">Register</h1>
            <input type="text" name="name" placeholder="Name" maxlength="50" class="box">
            <input type="email" name="email" placeholder="Email" maxlength="50" class="box">
            <input type="number" name="number" placeholder="Number" maxlength="11" max="9999999999" min="0" class="box" inputmode="numeric">
            <input type="password" name="pass" placeholder="Password" maxlength="50" class="box" oninput="this.value = this.value.replace(/\s/g,'')">
            <input type="password" name="cpass" placeholder="Confirm Password" maxlength="50" class="box" oninput="this.value = this.value.replace(/\s/g,'')">
            <input type="submit" value="register now" name="submit" class="btn">
            <p>Already have an account? <a href="login.php">Login Now</a></p>
        </form>
    </div>


    <!-- footer -->
    <?php include 'components/footer.php'; ?>


    <!-- scripts -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script> <!-- custom js file link  -->
    <script src="js/script.js"></script>
</body>

</html>