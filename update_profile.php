<?php

include 'components/connect.php';

session_start();

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
} else {
    $user_id = '';
};

if (isset($_POST['submit'])) {
    $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_STRING);
    $number = filter_var($_POST['number'], FILTER_SANITIZE_STRING);

    if (!empty($name)) {
        $update_name = $conn->prepare("UPDATE `users` SET name = ? WHERE id = ?");
        $update_name->execute([$name, $user_id]);
        $message[] = 'Name has been successfully updated';
    }

    if (!empty($email)) {
        $select_email = $conn->prepare("SELECT * FROM `users` WHERE email = ?");
        $select_email->execute([$email]);
        if ($select_email->rowCount() > 0) {
            $message[] = 'Email already registered';
        } else {
            $update_email = $conn->prepare("UPDATE `users` SET email = ?WHERE id = ?");
            $update_email->execute([$email, $user_id]);
            $message[] = 'Email has been successfully updated';
        }
    }

    if (!empty($number)) {
        $select_number = $conn->prepare("SELECT * FROM `users` WHERE number = ?");
        $select_number->execute([$number]);

        if ($select_number->rowCount() > 0) {
            $message[] = 'Number is already exist';
        } else {
            $update_number = $conn->prepare("UPDATE `users` SET number = ? WHERE id = ?");
            $update_number->execute([$number, $user_id]);
            $message[] = 'Number has been successfully updated';
        }
    }

    // $empty_pass = 'da39a3ee5e6b4b0d3255bfef95601890afd80709';
    // $select_prev_pass = $conn->prepare("SELECT password FROM `users` WHERE id = ?");
    // $select_prev_pass->execute([$user_id]);
    // $fetch_prev_pass = $select_prev_pass->fetch(PDO::FETCH_ASSOC);
    // $prev_pass = $fetch_prev_pass['password'];
    // $old_pass = sha1($_POST['old_pass']);
    // $old_pass = filter_var($old_pass, FILTER_SANITIZE_STRING);
    // $new_pass = sha1($_POST['new_pass']);
    // $new_pass = filter_var($new_pass, FILTER_SANITIZE_STRING);
    // $confirm_pass = sha1($_POST['confirm_pass']);
    // $confirm_pass = filter_var($confirm_pass, FILTER_SANITIZE_STRING);

    // if ($old_pass != $empty_pass) {
    //     if ($old_pass != $prev_pass) {
    //         $message[] = 'old password not matched!';
    //     } elseif ($new_pass != $confirm_pass) {
    //         $message[] = 'confirm password not matched!';
    //     } else {
    //         if ($new_pass != $empty_pass) {
    //             $update_pass = $conn->prepare("UPDATE `users` SET password = ? WHERE id = ?");
    //             $update_pass->execute([$confirm_pass, $user_id]);
    //             $message[] = 'password updated successfully!';
    //         } else {
    //             $message[] = 'please enter a new password!';
    //         }
    //     }
    // }
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

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" href="https://c.files.bbci.co.uk/12B60/production/_109004667_02untitledgoosegamescreen3840x2160.png" type="image/x-icon">

</head>

<body>
    <!-- header -->
    <?php include 'components/user_header.php'; ?>

    <!-- update profile section -->

    <section class="form-container">
        <form action="" method="post">
            <a href="profile.php"><i class="fa-solid fa-arrow-left-long" id="back"></i></a>
            <h1 class="title">Profile Update</h1>
            <input type="text" name="name" placeholder="<?= $fetch_profile['name']; ?>" maxlength="50" class="box">
            <input type="email" name="email" placeholder="<?= $fetch_profile['email']; ?>" maxlength="50" class="box">
            <input type="number" name="number" placeholder="<?= $fetch_profile['number']; ?>" maxlength="11" min="0" max="99999999999" class="box">
            <!-- <input type="password" name="old_pass" oninput="this.value = this.value.replace(/\s/g,'')" class="box" placeholder="Enter old password">
            <input type="password" name="new_pass" placeholder="Enter new password" oninput="this.value = this.value.replace(/\s/g,'')" class="box">
            <input type="password" name="confirm_pass" placeholder="Confirm new password" oninput="this.value = this.value.replace(/\s/g,'')" class="box"> -->

            <input type="text" name="flat" maxlength="50" placeholder="Address" class="box">
            <input type="submit" name="submit" value="Update profile" class="btn">
        </form>
    </section>

    <!-- footer -->
    <?php include 'components/footer.php'; ?>


    <!-- scripts -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script> <!-- custom js file link  -->
    <script src="js/script.js"></script>
</body>

</html>