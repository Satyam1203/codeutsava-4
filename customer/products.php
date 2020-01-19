<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../assets/css/style.css">
    <title>Products</title>
</head>
<body>
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
            <a href="http://localhost/codeutsava-4/customer/products.php" class="mobileLinks">Products </a>
            <a href="/" class="mobileLinks">Ware Houses</a>
            <a href="http://localhost/codeutsava-4/farmer/show_prd_farm.php" class="mobileLinks">Farmers</a>
            <a href="http://localhost/codeutsava-4/registration/login.php" class="mobileLinks">Login</a>
        </div>
</header>

<?php
session_start();
if(isset($_SESSION['customer']))
{    
   echo "
        <script>
            var temp=1 ;
            var cust_id=`$_SESSION[customer]`;
        </script>
   "; 
}
else{
    echo"<script>var temp=0 ;</script>";
}
?>
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
                    <div class='addToCartContainer'>
                        <button class='formButton cartButton' onclick='removeItem($r->pId,`$prod->catName`,$r->pRate)''><span>-</span></button>
                        <div class='productCount' id='id$r->pId'><span>0</span></div>
                        <button class='formButton cartButton' onclick='addItem($r->pId,`$prod->catName`,$r->pRate)'><span>+</span></button>
                    </div>
                </div>
            ";
        }
    }
    echo "</div>";
?>

<div class="container">
  <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">View Cart</button>
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Your Cart</h4>
        </div>
        <div class="modal-body">
          <div id='cart'></div>
        </div>
        <div class="modal-footer">
            <h3 id='price'></h3>
          <a type="button" onclick="payPage()" class="btn btn-default" >Check Out</a>
        </div>
      </div>
    </div>
  </div>
</div>

<?php 
        require_once('../assets/partials/footer.php');
?>



<script>
    let purchasedProduct=[],totalPrice=0;
    let addItem = (productId,name,price)=>{
        add(productId);
        let c=0;
        if(temp===1){
              
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
        calcPrice();

        }
        else{
                window.location='../registration/login.php'
        }
    };

    let removeItem = (productId,name,price)=>{
        remove(productId);
        if(temp===1){
              
        for (i of purchasedProduct){
            if(i.id==productId){
                if(i.qty>0){
                    i.qty -= 1;
                }
            }
        }
        
        calcPrice();
        }
        else{
                window.location='../registration/login.php'
        }
    };

    function calcPrice() {
        console.log(purchasedProduct);
        totalPrice = 0;
        var htmlTags='<table border=2><tr><td>ID</td><td> Name</td><td>Price /Kg</td><td>Quantity</td></tr>'
        for(var i=0;i<purchasedProduct.length;++i)
        {
           htmlTags+=`<tr><td>${purchasedProduct[i].id}</td><td>${purchasedProduct[i].name}</td><td>${purchasedProduct[i].price}</td><td>${purchasedProduct[i].qty}</td></tr>`
           totalPrice=totalPrice+(parseInt(purchasedProduct[i].price) * 1.05)*parseInt(purchasedProduct[i].qty);
        }
        htmlTags+='</table>';
        document.getElementById('cart').innerHTML=htmlTags;
        document.getElementById('price').innerHTML=`Total Price ${totalPrice}`;
    }

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

    let payPage = ()=>{
        let url = '../payment/payment_setup.php?amt='+totalPrice+'&cust_id='+cust_id;
        window.location=url;
    }
    
    function remove(id) {
        var ele = document.querySelector("#id"+id+" span")
        let x = parseInt(ele.textContent) - 1;
        if(x < 0)
            x = 0;
        ele.innerHTML = x
    }
    function add(id) {
        var ele = document.querySelector("#id"+id+" span")
        let x = parseInt(ele.textContent) + 1;
        ele.innerHTML = x;
    }
</script>
</body>
</html>