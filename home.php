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
    <title>Home</title>

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


    <!-- home -->
    <section class="home">

        <div class="swiper home-slider">

            <div class="swiper-wrapper">

                <div class="swiper-slide slide">
                    <div class="content">
                        <span>Order Now</span>
                        <h3>Irresistible Coffee Blends</h3>
                        <a href="menu.php" class="btn">See Menu</a>
                    </div>
                    <div class="image">
                        <img src="images/drink/Cappuccino.jpg" alt="">
                    </div>
                </div>
                <div class="swiper-slide slide">
                    <div class="content">
                        <span>Order Now</span>
                        <h3>Delectable Breakfast Treats</h3>
                        <a href="menu.php" class="btn">See Menu</a>
                    </div>
                    <div class="image">
                        <img src="images/breakfast/BaconCheddarEggSandwich.jpg" alt="">
                    </div>
                </div>
                <div class="swiper-slide slide">
                    <div class="content">
                        <span>Order Now</span>
                        <h3>Satisfying Lunch Specialties</h3>
                        <a href="menu.php" class="btn">See Menu</a>
                    </div>
                    <div class="image">
                        <img src="images/lunch/HamSwissOnBaguette.jpg" alt="">
                    </div>
                </div>
                <div class="swiper-slide slide">
                    <div class="content">
                        <span>Order Now</span>
                        <h3>Artisanal Bread Selections</h3>
                        <a href="menu.php" class="btn">See Menu</a>
                    </div>
                    <div class="image">
                        <img src="images/bread/AppleCroissant.jpg" alt="">
                    </div>
                </div>
            </div>

            <div class="swiper-pagination"></div>
        </div>

    </section>

    <!-- home category -->
    <section class="home-category">
        <h1 id="title">Category</h1>

        <div class="box-slider">

            <a href="category.php?category=Drinks" class="box">
                <img src="images/drink/CaffeAmericano.jpg" alt="">
                <h3>Drinks</h3>
            </a>

            <a href="category.php?category=Breakfast" class="box">
                <img src="images/breakfast/ChickenMapleButterSandwich.jpg" alt="">
                <h3>Breakfast</h3>
            </a>

            <a href="category.php?category=Lunch" class="box">
                <img src="images/lunch/TomatoMozzarellaFocacciaPanini.jpg" alt="">
                <h3>Lunch</h3>
            </a>

            <a href="category.php?category=Bread" class="box">
                <img src="images/bread/Croissant-onGreen.jpg" alt="">
                <h3>Bread</h3>
            </a>

        </div>
    </section>

    <!-- products -->
    <section class="products">

        <h1 class="title">Menu</h1>

        <div class="box-container">
            <?php
            $select_products = $conn->prepare("SELECT * FROM `products`");
            $select_products->execute();
            if ($select_products->rowCount() > 0) {
                while ($fetch_products = $select_products->fetch(PDO::FETCH_ASSOC)) {
            ?>
                    <form action="" method="post" class="box">
                        <input type="hidden" name="pid" value="<?= $fetch_products['id']; ?>">
                        <input type="hidden" name="name" value="<?= $fetch_products['name']; ?>">
                        <input type="hidden" name="price" value="<?= $fetch_products['price']; ?>">
                        <input type="hidden" name="image" value="<?= $fetch_products['image']; ?>">
                        <a href="quick_view.php?pid=<?= $fetch_products['id']; ?>" class="fas fa-eye"></a>
                        <button type="submit" class="fas fa-shopping-cart" name="add_to_cart"></button>
                        <img src="uploaded_img/<?= $fetch_products['image']; ?>" alt="">
                        <a href="category.php?category=<?= $fetch_products['category']; ?>" class="cat"><?= $fetch_products['category']; ?></a>
                        <div class="name"><?= $fetch_products['name']; ?></div>
                        <div class="flex">
                            <div class="price"><span>$</span><?= $fetch_products['price']; ?></div>
                            <input type="number" name="qty" class="qty" min="1" max="99" value="1" maxlength="2">
                        </div>
                    </form>
            <?php
                }
            } else {
                echo '<p class="empty">There is no product in the database</p>';
            }
            ?>

        </div>

        <div class="more-btn">
            <a href="menu.php" class="btn">veiw all</a>
        </div>

    </section>






    <!-- footer -->
    <?php include 'components/footer.php'; ?>


    <!-- scripts -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script> <!-- custom js file link  -->
    <script src="js/script.js"></script>

    <script>
        var swiper = new Swiper(".home-slider", {
            effect: "flip",
            grabCursor: true,
            loop: true,
            pagination: {
                clickable: true,
                el: ".swiper-pagination",
            },
        });
    </script>
</body>

</html>