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

        if (isset($_GET["id"])) {
            $prid = $_GET["prid"];
            $result4 = pg_query($con, "SELECT * FROM public.product WHERE proId='$prid'");
            $row = pg_fetch_array($result4, PGSQL_ASSOC);
            $prodname = $row['proName'];
            $shoid = $row['shopId'];
            $puid = $row['pubId'];
            $im = $row['img'];
            $categid = $row['cateId'];
            $pr = $row['price'];
            $qty = $row['quantity'];
        ?>

            <div id="update" method="POST" class="update">
                <h1 style="text-align: center;">Update Products</h1>
                <ul class="list-info">
                    <li class="item-info">
                        <p>Product ID:</p>
                        <input type="text" name="txtproid" placeholder="" value="<?php echo $prid; ?>" readonly id="" class="input-info">
                    </li>
                    <li class="item-info">
                        <p>Product Name:</p>
                        <input type="text" name="txtproname" placeholder="Product Name" value="<?php echo $prodname; ?>" id="" class="input-info">
                    </li>
                    <li class="item-info">
                        <p>Warehouse ID:</p>
                        <input type="text" name="txtshopid" placeholder="Warehouse ID" value="<?php echo $shoid; ?>" id="" class="input-info">
                    </li>
                    <li class="item-info">
                        <p>Publisher ID:</p>
                        <input type="text" name="txtpubid" placeholder="Publisher ID" value="<?php echo $puid; ?>" id="" class="input-info">
                    </li>
                    <li class="item-info">
                        <p>Image:</p>
                        <input type="file" name="txtproimg" id="" value="<?php echo $im; ?>" class="input-info">
                    </li>
                    <li class="item-info">
                        <p>Category ID:</p>
                        <input type="text" name="txtprocategory" placeholder="Cateory ID" value="<?php echo $categid; ?>" id="" class="input-info">
                    </li>
                    <li class="item-info">
                        <p>Price:</p>
                        <input type="text" name="txtproprice" placeholder="Price" value="<?php echo $pr ?>" id="" class="input-info">
                    </li>
                    <li class="item-info">
                        <p>Quantity:</p>
                        <input type="text" name="txtproquantity" placeholder="Quantity" value="<?php echo $qty; ?>" id="" class="input-info">
                    </li>
                </ul>

                <button class="sm-btn" name="product-update-btn" type="submit">Update

                </button>
            </div>

        <?php
        } else {
            echo '<meta http-equiv="refresh" content="0;url=?page=management"/>';
        }
        ?>
        <?php
        if (isset($_POST["product-update-btn"])) {
            $productsid = $_POST["txtproid"];
            $productnamename = $_POST["txtproname"];
            $productshopid = $_POST["txtshopid"];
            $productpubid = $_POST["txtpubid"];
            $productimage = $_FILES['txtproimg'];
            $productcateid = $_POST['txtprocategory'];
            $propricid = $_POST['txtproprice'];
            $proquantity = $_POST['txtproquantity'];

            $err5 = "";

            if (($productsid) == "") {
                $err5 .= "Enter Product ID, please!<br/>";
            }
            if (trim($productnamename) == "") {
                $err5 .= "Enter Product Name, please!<br/>";
            }
            if (($productshopid) == "") {
                $err5 .= ">Enter Shop ID, please!<br/>";
            }
            if (($productpubid) == "") {
                $err5 .= "Enter Pubisher ID, please!<br/>";
            }
            if ($productimage == "") {
                $err5 .= "Enter Product Image, please!<br/>";
            }
            if ($productcateid == "") {
                $err5 .= "Enter Category ID, please!<br/>";
            }
            if ($propricid == "") {
                $err5 .= "Enter Product Price, please!<br/>";
            }
            if ($proquantity == "") {
                $err5 .= "Enter Product Quantity, please!<br/>";
            }
            if ($err5 != "") {
                echo "$err5</b><br/>";
            } else {
                if ($productimage['name'] != "") {
                    if ($productimage['type'] == "image/jpg" || $productimage['type'] == "image/jpeg" || $productimage['type'] == "image/png" || $productimage['type'] == "image/gif") {
                        if ($productimage['size'] <= 614400) {
                            $sql = pg_query($con, "SELECT * FROM public.product WHERE proId!='$productsid' AND proName='$productnamename'");
                            if (pg_num_rows($sql) == 0) {
                                copy($productimage['tmp_name'], "image/" . $productimage['name']);
                                $filePic1 = $productimage['name'];

                                $sqlstrig = "UPDATE public.product SET proName='$name', img='$filePic1', shopId='$productshopid', pubId='$productpubid', cateId='$productcateid', price='$propricid', quantity='$proquantity' WHERE proId='$productsid'";
                                pg_query($con, $sqlstrig);
                                echo '<meta http-equiv="refresh" content="0;URL=?page=management"/>';
                            } else {
                                echo "Duplicate Product Name<br/>";
                            }
                        } else {
                            echo "Size of image too big<br/>";
                        }
                    } else {
                        echo "Image format is not correct<br/>";
                    }
                } else {
                    $resl = pg_query($con, "SELECT * FROM public.product WHERE proId !='$productsid' AND proName = '$productnamename'");
                    if (pg_num_rows($resl) == 0) {
                        $sqlst = "UPDATE product SET proName='$name', img='$filePic1', shopId='$productshopid', pubId='$productpubid', cateId='$productcateid', price='$propricid', quantity='$proquantity' WHERE proId='$productsid'";
                        pg_query($con, $sqlst);
                        echo '<meta http-equiv="refresh" content="0;URL=?page=management"/>';
                    } else {
                        echo "Duplicate Product Name<br/>";
                    }
                }
            }
        }
        ?>
    </div>
</body>

</html>