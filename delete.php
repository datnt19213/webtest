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
        <div id="delete" method="POST" class="delete">
            <h1>Delete Product</h1>
            <ul class="list-info">
                <li class="item-info">
                    <p>Product ID:</p>
                    <input type="text" name="productid" placeholder="Product ID" id="" class="input-info">
                </li>
                <li class="item-info">
                    <p>Product Name:</p>
                    <input type="text" name="productname" placeholder="Product Name" id="" class="input-info">
                </li>
                <li class="item-info">
                    <p>Warehouse ID:</p>
                    <input type="text" name="warehouseid" placeholder="Warehouse ID" id="" class="input-info">
                </li>
                <li class="item-info">
                    <p>Publisher ID:</p>
                    <input type="text" name="publishid" placeholder="Publisher ID" id="" class="input-info">
                </li>
                <li class="item-info">
                    <p>Category ID:</p>
                    <input type="text" name="categoriesid" placeholder="Cateory ID" id="" class="input-info">
                </li>
                <li class="item-info">
                    <p>Price:</p>
                    <input type="text" name="prices" placeholder="Price" id="" class="input-info">
                </li>
                <li class="item-info">
                    <p>Quantity:</p>
                    <input type="text" name="productquantity" readonly placeholder="Quantity" id="" class="input-info">
                </li>
            </ul>

            <!-- <button class="sm-btn" name="del-btn" type="submit">Delete

            </button> -->
            <input type="submit" value="Delete" class="sm-btn" name="add-pro-btn" type="submit">
        </div>
    </div>
</body>

</html>