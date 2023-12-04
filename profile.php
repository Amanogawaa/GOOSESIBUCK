<?php

include 'components/connect.php';

session_start();

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
} else {
    $user_id = '';
};

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

    <!-- profile section -->
    <section class="user-profile">
        <div class="box">
            <div class="title">Profile</div>
            <p><i class="fas fa-user"></i><span><?= $fetch_profile['name']; ?></span></p>
            <p><i class="fas fa-envelope"></i><span><?= $fetch_profile['email']; ?></span></p>
            <p><i class="fas fa-phone"></i><span><?= $fetch_profile['number']; ?></span></p>
            <a href="update_profile.php" class="btn">Update</a>
            <p><i class="fas fa-map-marker-alt"></i>
                <span>
                    <?php
                    if ($fetch_profile['address'] == '') {
                        echo 'Please enter your address!';
                    } else {
                        echo $fetch_profile['address'];
                    };
                    ?>
                </span>
            </p>
            <a href="update_address.php" class="btn">Update</a>
        </div>
    </section>



    <!-- footer -->
    <?php include 'components/footer.php'; ?>


    <!-- scripts -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script> <!-- custom js file link  -->
    <script src="js/script.js"></script>
</body>

</html>