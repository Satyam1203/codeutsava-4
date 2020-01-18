<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="./login.css">
    <title>Login Page</title>
</head>
<body>
    <div id="form">
        <form action="" method="POST">
            <div>
                <label>Username</label>
                <input type="text" name="user" required>
            </div>
            <div>
                <label>Password</label>
                <input type="text" name="pwd" required>
            </div>
            <button type="submit">Log In</button>
        </form>
    </div>
    <?php
        if(isset($_REQUEST['user'])){
            $user=$_REQUEST['user'];
            $pwd=md5($_REQUEST['pwd']);

            $dsn = 'mysql:host=localhost;dbname=codeutsava';
            $pdo = new PDO($dsn,'root','');
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);

            $sql = 'SELECT * FROM login_detail where user=?';

            $stmt = $pdo->prepare($sql);
            $stmt->execute([$user]);

            $row=$stmt->fetch();
            if($row){
                if($row->pass==$pwd){
                    echo "logged in";
                    if($user[0]=='f'){
                        session_start();
                        $_SESSION['farmer']=$user;
                        header("location:../farmer/show_prd_farm.php");
                    }else if($user[0]=='w'){
                        echo "Warehouse";
                     }else if($user[0]=='c'){
                        session_start();
                        $_SESSION['customer']=$user;
                        header("location:../customer/products.php");
                    }else{
                        echo "Something went wrong. ☹ "; 
                    }
                }else{
                    echo "wrong password";
                }
            }
            else{
                echo "Username invalid";
            }
        }
    ?>
</body>
</html>