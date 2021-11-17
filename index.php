<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>index</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/index.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="js/menubar.js"></script>
    <script src="js/scrollTop.js"></script>
    <script src="js/hideSlide.js"></script>
</head>
<body>
    <?php
        include_once("connect.php");
        $result1 = pg_query($con, 'SELECT * FROM public.product ORDER BY RANDOM() LIMIT 1');
        $result2 = pg_query($con, 'SELECT * FROM public.product ORDER BY RANDOM() LIMIT 1');
        $result3 = pg_query($con, 'SELECT * FROM public.product ORDER BY RANDOM() LIMIT 1');
        $result4 = pg_query($con, 'SELECT * FROM public.product ORDER BY RANDOM() LIMIT 1');

        session_start();
    ?>
    <div id="wrapper">
        <nav class="navigation">
            <div class="nav-icon">
                <i class="fas fa-bars"></i>
            </div>
            <ul class="menu-index">
                <li class="menu-item" onclick="hide(0)"><a href="index.php">Home</a></li>
                <li class="menu-item" onclick="hide(0)"><a href="?page=home">TechToys</a></li>
                <li class="menu-item" onclick="hide(0)"><a href="?page=home">Normal Toys</a></li>
                <li class="menu-item" onclick="hide(0)"><a href="?page=home">Popular Toys</a></li>
                <li class="menu-item" onclick="hide(0)"><a href="?page=home">Type of Toys</a></li>
                <li class="menu-item" onclick="hide(0)"><a href="?page=feedback">Feedback</a></li>
                <div class="search">
                    <input type="search" class="search-item">
                    <button class="searchButton-item">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </button>
                </div>
            </ul>
            <div class="account">
                <div class="account-info">
                    if($_SESSION['us'] || $_SESSION['ad']){
                        <style>
                            .navigation .account .account-info .account-in{display: none;}
                            .navigation .account .account-info .account-out{display: block;}
                        </style>
                    }
                    <a class="account-out" onclick="hide(2)" href="?page=loginsignup" style="display: none; color: #fff; text-decoration: none; margin: 0px 2px;">Login</a>
                    <a class="account-in" onclick="hide(2)" href="?page=loginsignup" style="color: #fff; text-decoration: none; margin: 0px 2px;">Login</a>
                    <a class="account-in" href="?page=loginsignup" style="color: #fff; text-decoration: none; margin: 0px 2px;">Signup</a>
                    <u>Hi, <?php echo $_SESSION['us']; echo $_SESSION['ad']; ?></u>
                </div>
                <div class="account-icon">
                    <!-- <div class="default-user-icon"><i class="fa-solid fa-circle-user ico"></i></div> -->
                    <a class="link-icon" href="?page=home"><img class="account-avatar" src="image/User-icon.jpg" alt="Account-avatar"></a>
                </div>
            </div>
        </nav>
        <div class="search-mobile">
            <input type="search" class="search-mobile-item">
            <button class="searchButton-mobile-item">
                <i class="fa-solid fa-magnifying-glass "></i>
            </button>
        </div>
        <?php
            if(pg_num_rows($result)>0){
            $row1 = pg_fetch_assoc($result1);
            $row2 = pg_fetch_assoc($result2);
            $row3 = pg_fetch_assoc($result3);
            $row4 = pg_fetch_assoc($result4);
            }
        ?>
        <div class="card">
  
            <div class="card_part card_part-one">
                <img src="<?php echo $row1['img']; ?>" alt="Image-1">
            </div>
            
             <!-- Photo 2 -->
            <div class="card_part card_part-two">
                <img src="<?php echo $row2['img']; ?>" alt="Image-2">
            </div>
          
            <!-- Photo 3 -->
            <div class="card_part card_part-three">
                <img src="<?php echo $row3['img']; ?>" alt="Image-3">
            </div>
          
            <!-- Photo 4 -->
            <div class="card_part card_part-four">
                <img src="<?php echo $row4['img']; ?>" alt="Image-4">
            </div>
          
        </div>

        
        <button id="manage" title="Add - Update - Delete - Statistic Management">
            <a href="?page=management"></a>
            <i class="fas fa-tasks"></i>
        </button>

        <button id="ontop" onclick="scrollToTop()">
            <i class="fas fa-chevron-circle-up"></i>
        </button>
        <?php
            if(isset($_GET['page']))
            {
                $page = $_GET['page'];
                if($page=="loginsignup")
                {
                    include_once("LoginSignUp.php");
                    
                }
                if($page=="management")
                {
                    include_once("Management.php");
                }
                if($page=="add")
                {
                    include_once("Management.php");
                    include_once("add.php");
                }
                if($page=="addcate")
                {
                    include_once("Management.php");
                    include_once("addcate.php");
                }
                if($page=="addshop")
                {
                    include_once("Management.php");
                    include_once("addshop.php");
                }
                
            }
            else 
            {
                include_once("Home.php");
            }
	    ?>
        
        <div class="footer">
            <div class="footer-header">
                <b class="footer-name">About Us</b>
            </div>
            <ul class="footer-block">
                <li class="footer-item">Support by
                    <div class="support-item">
                        <img class="icon-size" src="image/Community-social-media-icons.png" alt="Community-social-media-icons">
                    </div>
                </li>
                <li class="footer-item">Contents
                    <ul class="listcontent">
                        <li class="listContent-item"><a class="footer-infor" href="">Technology toys</a></li>
                        <li class="listContent-item"><a class="footer-infor" href="">Skills Toys<!--Foods--></a></li>
                        <li class="listContent-item"><a class="footer-infor" href="">Fantasy Toys<!--Challenges--></a></li>
                        <li class="listContent-item"><a class="footer-infor" href="">Art Toys<!--Vlogs--></a></li>
                        <li class="listContent-item"><a class="footer-infor" href="">Building Toys<!--Reactions--></a></li>
                    </ul>
                </li>
                <li class="footer-item">Channels<!--Operating Platforms-->
                    <ul class="listcontent">
                        <li class="listContent-item"><a class="footer-infor" href="">YouTube</a></li>
                        <li class="listContent-item"><a class="footer-infor" href="">Facebook</a></li>
                        <!--<li class="listContent-item"><a class="footer-infor" href="">Nonolive</a></li>
                        <li class="listContent-item"><a class="footer-infor" href="">NimoTV</a></li>
                        <li class="listContent-item"><a class="footer-infor" href="">Xbox</a></li>-->
                    </ul>
                </li>
                <li class="footer-item">Contacts
                    <ul class="listcontent">
                        <li class="listContent-item">Email: <a class="footer-infor" href="">abc123@gmail.com</a></li>
                        <li class="listContent-item">Phone: <a class="footer-infor" href="">0123456789</a></li>
                        <li class="listContent-item">Facebook: <a class="footer-infor" href="">fb.com</a></li>
                        <li class="listContent-item">Twitter: <a class="footer-infor" href="">ATNToysShop<!--RankingSocialNetworks--></a></li>
                        <li class="listContent-item">Instagram: <a class="footer-infor" href="">ATNToysShop<!--RankingSocialNetworks--></a></li>
                    </ul>
                </li>
            </ul>
            <div class="copyright">&copy;ATN Copyright</div>
        </div>
    </div>
</body>
</html>