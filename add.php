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
        if (isset($_POST["add-pro-btn"])) {
            $id = $_POST['proid'];
            $name = $_POST["proname"];
            $shopid = $_POST["shopid"];
            $pubid = $_POST["pubid"];
            $img = $_FILES['image'];
            $cateid = $_POST['cateid'];
            $price = $_POST['pric'];
            $qty = $_POST['qty'];

            $err = "";

            if (($id) == "") {
                $err .= "Enter Product ID, please!<br/>";
            }
            if (trim($name) == "") {
                $err .= "Enter Product Name, please!<br/>";
            }
            if (($shopid) == "") {
                $err .= "Enter Shop ID, please!<br/>";
            }
            if (($pubid) == "") {
                $err .= "Enter Pubisher ID, please!<br/>";
            }
            if ($img == "") {
                $err .= "Enter Product Image, please!<br/>";
            }
            if ($cateid == "") {
                $err .= "Enter Category ID, please!<br/>";
            }
            if ($price == "") {
                $err .= "Enter Product Price, please!<br/>";
            }
            if ($qty == "") {
                $err .= "Enter Product Quantity, please!<br/>";
            }
            if ($err != "") {
                echo "$err</b><br/>";
            } else {
                if ($img['type'] == "image/jpg" || $img['type'] == "image/jpeg" || $img['type'] == "image/png" || $img['type'] == "image/gif") {
                    if ($img['size'] <= 614400) {
                        $result = pg_query($con, "SELECT * FROM public.product WHERE proId='$id'") or die . $con;;
                        if (pg_num_rows($result) == 0) {
                            copy($img['tmp_name'], "image/" . $img['name']);
                            $filePic = $img['name'];
                            $sqlstring = "INSERT INTO public.product(proId, proName, shopId, pubId, img, cateId, price, quantity) VALUES ('$id', '$name', '$shopid', '$pubid', '$filePic', '$cateid', '$price', '$qty')";
                            pg_query($con, $sqlstring);
                            echo '<meta http-equiv="refresh" content="0;URL=?page=management.php"/>';
                        } else {
                            echo "Duplicae Product ID</b><br/>";
                        }
                    } else {
                        echo "Size of image too big</b><br/>";
                    }
                } else {
                    echo "Image format is not correct</b><br/>";
                }
            }
        }
        ?>
        <div id="add" method="POST" class="add">
            <h1>Add Product</h1>
            <ul class="list-info">
                <li class="item-info">
                    <p>Product ID:</p>
                    <input type="text" placeholder="Product ID" name="proid" id="" class="input-info">
                </li>
                <li class="item-info">
                    <p>Product Name:</p>
                    <input type="text" name="proname" placeholder="Product Name" id="" class="input-info">
                </li>
                <li class="item-info">
                    <p>Warehouse ID:</p>
                    <input type="text" name="shopid" placeholder="Warehouse ID" id="" class="input-info">
                </li>
                <li class="item-info">
                    <p>Publisher ID:</p>
                    <input type="text" name="pubid" placeholder="Publisher ID" id="" class="input-info">
                </li>
                <li class="item-info">
                    <p>Image:</p>
                    <input type="file" name="image" id="" class="input-info">
                </li>
                <li class="item-info">
                    <p>Category ID:</p>
                    <input type="text" name="cateid" placeholder="Cateory ID" id="" class="input-info">
                </li>
                <li class="item-info">
                    <p>Price:</p>
                    <input type="text" name="pric" placeholder="Price" id="" class="input-info">
                </li>
                <li class="item-info">
                    <p>Quantity:</p>
                    <input type="text" name="qty" placeholder="Quantity" id="" class="input-info">
                </li>
            </ul>

            <button class="sm-btn" name="add-pro-btn" type="submit">Add

            </button>
        </div>

    </div>
</body>

</html>