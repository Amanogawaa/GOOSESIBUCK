<?php

include '../components/connect.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if (!isset($admin_id)) {
    header('location:admin_login.php');
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Message</title>
    <link rel="icon" href="https://c.files.bbci.co.uk/12B60/production/_109004667_02untitledgoosegamescreen3840x2160.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/admin_style.css">n

</head>

<body>
    <?php include '../components/admin_header.php' ?>


    <section class="meme">

        <div class="container">
            <h3 class="title">Y da community hate Php?</h3>
            <img src="../images/meme.jpg" alt="">
            <p>
                In a realm where pixels pirouette and code whispers harmonies, there exists a peculiar disdain for the enigmatic PHP—whispers amongst the binary breeze speak of its syntax as a chaotic orchestra of dodo birds tap-dancing through cosmic mazes. Legends abound of PHP's penchant for turning variables into mischievous sprites that scatter like pixelated confetti, leaving developers chasing echoes of lost semicolons in a labyrinth of tangled spaghetti code. The community, bedecked in cloaks woven from lines of pristine Python and glistening JavaScript, shun PHP for its mysterious love affair with dollar signs and its affinity for turning logical loops into abstract art performances that bemuse even the most intrepid coders. Yet, amidst the aversion, some whisper that PHP, like a misunderstood symphony, holds secrets that only the bravest souls dare to decipher amidst the cacophony of disdain.
            </p>
        </div>
    </section>

</body>

</html>