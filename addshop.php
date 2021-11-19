<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Management</title>
    <link rel="stylesheet" href="css/management.css">
    <script src="js/management.js"></script>
</head>

<body>
    <div id="wrapper">
        <?php
        include_once("connect.php");
        if (isset($_POST["shop-add-btn"])) {
            $sid = $_POST['sid'];
            $sname = $_POST["sname"];
            $scity = $_POST["city"];
            $sdict = $_POST["dist"];
            $swad = $_POST["ward"];
            $sdes = $_POST["desc"];


            $err3 = "";

            if (($sid) == "") {
                $err3 .= "Enter Shop ID, please!<br/>";
            }
            if (trim($sname) == "") {
                $err3 .= "Enter Shop Name, please!<br/>";
            }
            if (($scity) == "") {
                $err3 .= "Enter Shop City, please!<br/>";
            }
            if (($sdict) == "") {
                $err3 .= "Enter Shop District, please!<br/>";
            }
            if (($swad) == "") {
                $err3 .= "Enter Shop Ward, please!<br/>";
            }
            if (($sdes) == "") {
                $err3 .= "Enter Shop Description, please!<br/>";
            }
            if ($err3 != "") {
                echo "$err3</b><br/>";
            } else {
                $result3 = pg_query($con, "SELECT * FROM public.shop WHERE shopId='$sid'") or die . $con;;
                if (pg_num_rows($result3) == 0) {
                    $sqlstring1 = "INSERT INTO public.shop(pubId, pubName, city, district, ward, des) VALUES ('$sid', '$sname', '$scity', '$sdict', '$swad', '$sdes')";
                    pg_query($con, $sqlstring1);
                    echo '<meta http-equiv="refresh" content="0;URL=?page=management.php"/>';
                } else {
                    echo "Duplicae Publisher ID</b><br/>";
                }
            }
        }
        ?>

        <div id="add-shop" method="POST" class="add-shop">
            <h1 style="text-align: center;">Add Shop</h1>
            <ul class="list-info">
                <li class="item-info">
                    <p>Shop ID:</p>
                    <input type="text" placeholder="Shop ID" name="sid" id="" class="input-info">
                </li>
                <li class="item-info">
                    <p>Shop Name:</p>
                    <input type="text" name="sname" placeholder="Shop Name" id="" class="input-info">
                </li>
                <li class="item-info">
                    <p>City:</p>
                    <input type="text" name="city" placeholder="City" id="" class="input-info">
                </li>
                <li class="item-info">
                    <p>District:</p>
                    <input type="text" name="dist" placeholder="District" id="" class="input-info">
                </li>
                <li class="item-info">
                    <p>Ward:</p>
                    <input type="text" name="ward" placeholder="Ward" id="" class="input-info">
                </li>
                <li class="item-info">
                    <p>Description:</p>
                    <input type="text" name="desc" placeholder="Description" id="" class="input-info">
                </li>
            </ul>

            <!-- <button class="sm-btn" name="shop-add-btn" type="submit">Add

            </button> -->
            <input type="submit" value="Add" class="sm-btn" name="add-pro-btn" type="submit">
        </div>
    </div>
</body>

</html>