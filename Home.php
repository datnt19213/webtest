<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="css/home.css">
    <link rel="text/javascript" href="js/home.js">
</head>
<body>

<?php
    include_once("connect.php");
    $result = pg_query($con, 'SELECT * FROM public.product');
?>
    <div id="Wrapper">
        <div class="body-full">
            <!-- <div class="left-body">
                <ul class="list-left-menu">
                    <li class="menu-left"><a href="">Technology Toys</a></li>
                    <li class="menu-left"><a href="">Skills Toys</a></li>
                    <li class="menu-left"><a href="">Art - Creative Toys</a></li>
                    <li class="menu-left"><a href="">Motor Toys</a></li>
                    <li class="menu-left"><a href="">Building Toys</a></li>
                    <li class="menu-left"><a href="">Music Toys</a></li>
                    <li class="menu-left"><a href="">Fantasy Toys</a></li>
                    <li class="menu-left"><a href="">Spring Toys</a></li>
                    <li class="menu-left"><a href="">Summer Toys</a></li>
                    <li class="menu-left"><a href="">Autumn Toys</a></li>
                    <li class="menu-left"><a href="">Winter Toys</a></li>
                </ul>
            </div> -->
            <div class="right-body">
                <?php 
                    $No=1;
                     while ($row = pg_fetch_assoc($result)){
                ?>
                <div class="block-product">
                    <img class="image" src="" alt="">
                    <ul class="pro-info">
                        <li class="pro-detail">Name: <?php echo $row['proName']; ?> </li>
                        <li class="pro-detail">Price: <?php echo $row['price']; ?> </li>
                        <li class="pro-qty">Remaining pruduct quantity: <?php echo $row['quantity']; ?> </li>
                    </ul>
                </div>
                <?php
                    $No++;
                     }
                ?>
            </div>
        </div>
    </div>
</body>
</html>