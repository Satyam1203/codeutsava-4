<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../assets/css/style.css">
    <title>Products</title>
</head>
<body>
<!-- header -->

<header class="header">
        <div class="icon"></div>
        <div class="titleContainer">
            <div class="scrollContainer">
                <div class="companyName">Local Farm</div>
                <div class="companyName">Farm to your Home</div>
            </div>
        </div>
        <div class="menu">
            <a href="http://localhost/codeutsava-4/index.php" class="links">Home</a>
            <a href="http://localhost/codeutsava-4/customer/products.php" class="links">Products </a>
            <a href="" class="links">Ware Houses</a>
            <a href="http://localhost/codeutsava-4/farmer/show_prd_farm.php" class="links">Farmers</a>
            <a href="http://localhost/codeutsava-4/registration/login.php" class="links">Login</a>
        </div>
        <div class="menuBars" onclick="openMenu()"></div>
        <div class="mobileMenu">
            <a href="http://localhost/codeutsava-4/index.php" class="mobileLinks">Home</a>
            <a href="/" class="mobileLinks">Products </a>
            <a href="/" class="mobileLinks">Ware Houses</a>
            <a href="farmer/show_prd_farm.php" class="mobileLinks">Farmers</a>
            <a href="registration/login.php" class="mobileLinks">Login</a>
        </div>
</header>

<!-- header ends -->
<?php 
    $dsn = 'mysql:host=localhost;dbname=codeutsava';
    $pdo = new PDO($dsn,'root','');
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);

    $sql = 'SELECT * from product_detail';

    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    $row=$stmt->fetchAll();
    echo "<div class='cartContainer'>";
    foreach($row as $r){
        $prod_id=$r->catId;
        $q="SELECT * from category_detail where catId=?";
        $stmt = $pdo->prepare($q);;
        $stmt->execute([$prod_id]);
        $prod=$stmt->fetch();
        if($r->remQty>0){
            echo "
                <div class='productContainer'>
                    <div class='productImg' 
                    style='background-image: url($prod->catImg);'></div>
                    <div class='description'>
                        <div>$prod->catName</div>
                        <div>$r->pRate</div>
                    </div>
                    <button class='formButton cartButton' onclick='addItem($r->pId,`$prod->catName`,$r->pRate)'>Add to cart</button>
                </div>
            ";
        }
    }
    echo "</div>";
?>
 <?php 
        require_once('../assets/partials/footer.php');
    ?>
<script>
    let purchasedProduct=[];
    let addItem = (productId,name,price)=>{
        let c=0;
        console.log(name);
        for (i of purchasedProduct){
            if(i.id==productId){
                i.qty += 1;
                c=1;
            }
        }
        if(!c){
            let purchasedItem={
                id:productId,
                name:name,
                price:price,
                qty:1   
            }
            purchasedProduct.push(purchasedItem);
        }
        console.log(purchasedProduct);
    };

// menu logic

    var div2 = `<div class="companyName">Farm to your Home</div>`;
    var div1 = `<div class="companyName">Local Farm</div>`;
    var titleContainer = document.querySelector('.scrollContainer');
    var oddEven = 1;
    var title = setInterval(() => {
        if(oddEven) {
            titleContainer.innerHTML = div1 + div2;
            titleContainer.style.transition = 'none';
            titleContainer.style.marginTop = '0';
            oddEven = 0;
            setTimeout(() => {
                titleContainer.style.transition = '1s ease-in-out';
                titleContainer.style.marginTop = 'calc(-4vh + 1px)';
            }, 2500);
        } else {
            titleContainer.innerHTML = div2 + div1;
            titleContainer.style.transition = 'none';
            titleContainer.style.marginTop = '0';
            oddEven = 1;
            setTimeout(() => {
                titleContainer.style.transition = '1s ease-in-out';
                titleContainer.style.marginTop = 'calc(-4vh + 1px)';
            }, 2500);
        }
        
    }, 5000);
function openMenu() {
    var mobileMenu = document.querySelector('.mobileMenu').style;
    console.log(mobileMenu)
    if(
        mobileMenu.marginTop == "-400px"
        || mobileMenu.marginTop == ""
        || mobileMenu.marginTop == "none") {
            mobileMenu.marginTop = "10vh"
    } else {
        mobileMenu.marginTop = "-400px"
    }
}
</script>
</body>
</html>