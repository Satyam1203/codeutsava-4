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
</script>