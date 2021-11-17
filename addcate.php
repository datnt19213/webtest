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
        if (isset($_POST["add-cate-btn"])) {
            $cid = $_POST['categoryid'];
            $cname = $_POST["categoryname"];

            $err2 = "";

            if (($cid) == "") {
                $err2 .= "Enter Category ID, please!<br/>";
            }
            if (trim($cname) == "") {
                $err2 .= "Enter Category Name, please!<br/>";
            }
            if ($err2 != "") {
                echo "$err2</b><br/>";
            } else {
                $result2 = pg_query($con, "SELECT * FROM public.category WHERE cateId='$cid'") or die . $con;;
                if (pg_num_rows($result2) == 0) {
                    $sqlstring2 = "INSERT INTO public.category(pubId, pubName) VALUES ('$pid', '$pname')";
                    pg_query($con, $sqlstring2);
                    echo '<meta http-equiv="refresh" content="0;URL=?page=management.php"/>';
                } else {
                    echo "Duplicae Category ID<br/>";
                }
            }
        }
        ?>

        <div id="add-cate" method="POST" class="add-cate">
            <h1 style="text-align: center;">Add Category</h1>
            <ul class="list-info">
                <li class="item-info">
                    <p>Category ID:</p>
                    <input type="text" placeholder="Category ID" name="categoryid" id="" class="input-info">
                </li>
                <li class="item-info">
                    <p>Category Name:</p>
                    <input type="text" name="categoryname" placeholder="Category Name" id="" class="input-info">
                </li>
            </ul>

            <button class="sm-btn" name="add-cate-btn" type="submit">Add

            </button>
        </div>
    </div>
</body>

</html>