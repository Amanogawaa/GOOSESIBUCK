<?php

include 'components/connect.php';

session_start();

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
} else {
    $user_id = '';
};


if (isset($_POST['submit'])) {

    $address = $_POST['street'] . ', ' . $_POST['house'] . ', ' . $_POST['building'] . ', ' . $_POST['barangay'] . ', ' . $_POST['city'];
    $address = filter_var($address, FILTER_SANITIZE_STRING);

    $update_address = $conn->prepare("UPDATE `users` set address = ? WHERE id = ?");
    $update_address->execute([$address, $user_id]);

    $message[] = 'Address saved!';
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
    <link rel="icon" href="https://c.files.bbci.co.uk/12B60/production/_109004667_02untitledgoosegamescreen3840x2160.png" type="image/x-icon">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css">

</head>

<body>
    <!-- header -->
    <?php include 'components/user_header.php'; ?>

    <section class="form-container">
        <form action="" method="post">
            <a href="profile.php"><i class="fa-solid fa-arrow-left-long" id="back"></i></a>
            <h1 class="title">Address</h1>
            <input type="text" name="street" maxlength="50" placeholder="Street No." class="box">
            <input type="text" name="house" maxlength="50" placeholder="House No." class="box">
            <input type="text" name="building" maxlength="50" placeholder="Building No." class="box">
            <input type="text" name="barangay" maxlength="50" placeholder="Barangay" class="box">
            <input type="text" name="city" maxlength="50" placeholder="City" class="box">
            <input type="submit" name="submit" value="Save address" class="btn">
        </form>
    </section>


    <!-- footer -->
    <?php include 'components/footer.php'; ?>


    <!-- scripts -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script> <!-- custom js file link  -->
    <script src="js/script.js"></script>
</body>

</html>