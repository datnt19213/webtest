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
        <div class="radio-container">
            <div class="add-radio">
                <a href="?page=add">
                <input type="submit" name="radio" checked id="" onclick="choice(0)" class="radio-change-function">
                <p class="radio-title">Add products</p></a>
            </div>
            <div class="update-radio">
                <a href="?page=update">
                <input type="submit" name="radio" id="" onclick="choice(1)" class="radio-change-function">
                <p class="radio-title">Update products</p></a>
            </div>
            <div class="delete-radio">
                <a href="?page=delete">
                <input type="submit" name="radio" id="" onclick="choice(2)" class="radio-change-function">
                <p class="radio-title">Delete products</p></a>
            </div>
            <div class="add-pub-radio">
                <a href="?page=addpub">
                <input type="submit" name="radio" id="" onclick="choice(3)" class="radio-change-function">
                <p class="radio-title">Add Publisher</p></a>
            </div>
            <div class="add-cate-radio">
                <a href="?page=addcate">
                <input type="submit" name="radio" id="" onclick="choice(4)" class="radio-change-function">
                <p class="radio-title">Add Category</p></a>
            </div>
            <div class="add-shop-radio">
                <a href="?page=addshop">
                <input type="submit" name="radio" id="" onclick="choice(5)" class="radio-change-function">
                <p class="radio-title">Add Shop</p></a>
            </div>
            <div class="statistic">
                <a href="?page=addpub">
                <input type="submit" name="radio" id="" onclick="choice(6)" class="radio-change-function">
                <p class="radio-title">Add Publisher</p></a>
            </div>
        </div>
    </div>
</body>

</html>
