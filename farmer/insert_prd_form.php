<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../assets/css/style.css">
    <title>Insert Products</title>
</head>
<body>
    <?php 
        require_once('../assets/partials/header.php');
    ?>
    <?php

    session_start();
    if(!(isset($_SESSION['farmer']))){
        header("location:../registration/login.php");
    }
    // if($_REQUEST['ok'] == 1)
    // {
    // 	echo "<h1 style='color:green'> Successfully added </h1>";
    // }
    ?>
    <h1 class="formh1 h1Bg"> Farmer adds product to the warehouse </h1>

    <a class="linkToDashboard addProducts" href="show_prd_farm.php"> Show Products available in warehouse </a>
    <form class="form addProductForm" method="post" action="insert_prd.php" name="f1">

    <div class="addProductsContainer">
        <div class="fields">
            <div class="insertText"> Product : </div>
            <select name="catId" required>
                <option> </option>
                <?php
                    
                    include('connect.php');
                    $query = "select * from category_detail where deleted=0"; 
                    $rs_category = mysqli_query($con,$query);
                    while($row_category = mysqli_fetch_array($rs_category))
                    {
                        echo'<option value="'.$row_category['catId'].'">'.$row_category['catName'].'</option>';
                    }
                ?>
            </select>
        </div>
        <div class="fields"><div  class="insertText"> Rate(per kg. or dozens)</div>
        <input type="number" name="rate" required>
        </div> 
        <div class="fields"><div  class="insertText"> Quantity(in kg. or dozens)</div>
        <input type="number" name="qty" required>
        </div>
        <div class="fields">
            <input type="submit" value="submit">
        </div>
    </div>
    </form>
    <?php 
        require_once('../assets/partials/footer.php');
    ?>
</body>
</html>