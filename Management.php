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
                <input type="radio" name="radio" checked id="" onclick="choice(0)" class="radio-change-function">
                <a href="?page=add"><p class="radio-title">Add products</p></a>
            </div>
            <div class="update-radio">
                <input type="radio" name="radio" id="" onclick="choice(1)" class="radio-change-function">
                <a href="?page=update"><p class="radio-title">Update products</p></a>
            </div>
            <div class="delete-radio">
                <input type="radio" name="radio" id="" onclick="choice(2)" class="radio-change-function">
                <a href="?page=delete"><p class="radio-title">Delete products</p></a>
            </div>
            <div class="add-pub-radio">
                <input type="radio" name="radio" id="" onclick="choice(3)" class="radio-change-function">
                <a href="?page=addpub"><p class="radio-title">Add Publisher</p></a>
            </div>
            <div class="add-cate-radio">
                <input type="radio" name="radio" id="" onclick="choice(4)" class="radio-change-function">
                <a href="?page=addcate"><p class="radio-title">Add Category</p></a>
            </div>
            <div class="add-shop-radio">
                <input type="radio" name="radio" id="" onclick="choice(5)" class="radio-change-function">
                <a href="?page=addshop"><p class="radio-title">Add Shop</p></a>
            </div>
            <div class="statistic">
                <input type="radio" name="radio" id="" onclick="choice(6)" class="radio-change-function">
                <p class="radio-title">Statistic</p>
            </div>
        </div>
    </div>
</body>

</html>