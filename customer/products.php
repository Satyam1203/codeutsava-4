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
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<?php 

    $dsn = 'mysql:host=localhost;dbname=codeutsava';
    $pdo = new PDO($dsn,'root','');
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);

    $sql = 'SELECT * from product_detail';

    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    $row=$stmt->fetchAll();
    foreach($row as $r){
        $prod_id=$r->catId;
        $q="SELECT * from category_detail where catId=?";
        $stmt = $pdo->prepare($q);;
        $stmt->execute([$prod_id]);
        $prod=$stmt->fetch();

        if($r->remQty>0){
            echo "
                <div style='border:1px solid grey;border-radius:5px;margin:50px;display:inline-block;'>
                    
                    <img src='$prod->catImg' width='100px' height='80px' />
                    <div>
                        <p>$prod->catName</p>
                        <p>$r->pRate</p>
                    </div>
                    <button onclick='addItem($r->pId,`$prod->catName`,$r->pRate)'>Add to cart</button>
                </div>
            ";
        }
    }
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





<script>
    let purchasedProduct=[],totalPrice;
    let addItem = (productId,name,price)=>{
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
        console.log(purchasedProduct);
        totalPrice=0;
        var htmlTags='<table border=2><tr><td>ID</td><td> Name</td><td>Price /Kg</td><td>Quantity</td></tr>'
        for(var i=0;i<purchasedProduct.length;++i)
        {
           htmlTags+=`<tr><td>${purchasedProduct[i].id}</td><td>${purchasedProduct[i].name}</td><td>${purchasedProduct[i].price}</td><td>${purchasedProduct[i].qty}</td></tr>`
           totalPrice=totalPrice+parseInt(purchasedProduct[i].price)*parseInt(purchasedProduct[i].qty);
        }
        htmlTags+='</table>';
        document.getElementById('cart').innerHTML=htmlTags;
        document.getElementById('price').innerHTML=`Total Price ${totalPrice}`;
        }
        else{
                window.location='../registration/login.php'
        }
    };

    let payPage = ()=>{
        let url = '../payment/payment_setup.php?amt='+totalPrice+'&cust_id='+cust_id;
        window.location=url;
    }
</script>

</body>
</html>