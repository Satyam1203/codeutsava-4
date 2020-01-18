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

        echo "
            <div>
                
                <img src='$prod->catImg' width='100px' height='80px' />
                <div>
                    <p>$r->pName</p>
                    <p>$r->pRate</p>
                </div>
                <button>Add to cart</button>
            </div>
        ";
    }
?>