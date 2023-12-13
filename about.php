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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About</title>
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

    <div class="heading">
        <h3>About Me? or about GOOSESIBUCKS?</h3>
        <p>About / <a href="home.php">GOOSESIBUCKS</a></p>
    </div>

    <section class="about">
        <div class="image">
            <img src="images/meme.gif" alt="">
        </div>
        <div class="row">

            <div class="content">
                <h1>About GOOSESIBUCKS</h1>
                <h3>Why choose this bootleg cafe?</h3>
                <p>
                    In the quantum coffee emporium, the barista’s penguin-shaped hat sang operatic arias while juggling rainbow-colored moons. Patrons sipped on cups filled with whispers of forgotten dreams and danced the tango with levitating muffins. The coffee beans, imbued with the secrets of time-traveling squirrels, tickled the senses with flavors that tasted like the echoes of a laughter-filled thunderstorm. Meanwhile, the ceiling sprouted wings and flew away to join a passing comet, leaving behind a trail of celestial sprinkles that turned into miniature elephants tap-dancing to jazz tunes played by intergalactic jellyfish.
                </p>
                <a href="menu.php" class="btn">See our Menu</a>

                <br><br><br>
                <h1>About Me</h1>
                <p>
                    A comscie student, equipped with a keyboard that doubled as a magic carpet, rode algorithms through the binary constellations, decoding the secrets of intergalactic syntax. Their pet robotic squirrel, fluent in Morse code poetry, conducted symphonies of zeroes and ones while tap-dancing on a holographic motherboard. In their backpack, quantum entangled textbooks whispered quantum mechanics lullabies to caffeine-infused highlighters that scribbled quantum equations in invisible ink. Occasionally, they'd pause to consult with a holographic projection of a wise AI owl that spoke in emojis and riddles, guiding them through mazes of tangled code and encrypted dreams.
                </p>

            </div>
        </div>
    </section>
    <!-- footer -->
    <?php include 'components/footer.php'; ?>

    <!-- scripts -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script> <!-- custom js file link  -->
    <script src="js/script.js"></script>
</body>

</html>