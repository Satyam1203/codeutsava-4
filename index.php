<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./assets/css/style.css">
    <title>Local Farm</title>
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
            <a href="" class="links">Home</a>
            <a href="" class="links">Cart</a>
            <a href="" class="links">Ware Houses</a>
            <a href="farmer/show_prd_farm.php" class="links">Farmers</a>
            <a href="registration/login.php" class="links">Login</a>
        </div>
        <div class="menuBars" onclick="openMenu()"></div>
        <div class="mobileMenu">
            <a href="/" class="mobileLinks">Home</a>
            <a href="/" class="mobileLinks">Cart</a>
            <a href="/" class="mobileLinks">Ware Houses</a>
            <a href="farmer/show_prd_farm.php" class="mobileLinks">Farmers</a>
            <a href="registration/login.php" class="mobileLinks">Login</a>
        </div>
    </header>
    <div class="intialAdvertisement">
        <div class="intialAdvertisementContainer">
            <div class="fruitAdvertisement">
                <div class="bgImgFilter fruitAdvertisementFilter"></div>
                <div class="title">Buy Fruits at best price</div>
            </div>
            <div class="vegetablesAdvertisement">
                <div class="bgImgFilter vegetablesAdvertisementFilter"></div>
                <div class="title">Buy vegetables at best price</div>
            </div>
        </div>
    </div>
    <div class="vegetableListContainer">
        <div class="vegetableListScroll">
            <div class="vegetableListBox cabbage">
                <div class="name">Cabbage</div>
            </div>
            <div class="vegetableListBox cauliflower">
                <div class="name">cauliflower</div>
            </div>
            <div class="vegetableListBox brinjal">
                <div class="name">brinjal</div>
            </div>
            <div class="vegetableListBox broccli">
                <div class="name">broccli</div>
            </div>
            <div class="vegetableListBox celery">
                <div class="name">celery</div>
            </div>
            <div class="vegetableListBox parsley">
                <div class="name">parsley</div>
            </div>
            <div class="vegetableListBox onion">
                <div class="name">onion</div>
            </div>
            <div class="vegetableListBox ginger">
                <div class="name">ginger</div>
            </div>
        </div>
    </div>
    <h1>
        All your needs in one place
    </h1>
    <div class="vegetableListContainer">
        <div class="vegetableListScroll">
        <div class="vegetableListBox orange">
                <div class="name">orange</div>
            </div>
            <div class="vegetableListBox mango">
                <div class="name">mango</div>
            </div>
            <div class="vegetableListBox apple">
                <div class="name">apple</div>
            </div>
            <div class="vegetableListBox bannana">
                <div class="name">bannana</div>
            </div>
            <div class="vegetableListBox papaya">
                <div class="name">papaya</div>
            </div>
            <div class="vegetableListBox pineapple">
                <div class="name">pineapple</div>
            </div>
            <div class="vegetableListBox lime">
                <div class="name">lime</div>
            </div>
            <div class="vegetableListBox watermelon">
                <div class="name">watermelon</div>
            </div>
            <div class="vegetableListBox grape">
                <div class="name">grape</div>
            </div>
            <div class="vegetableListBox chery">
                <div class="name">chery</div>
            </div>
            <div class="vegetableListBox kiwwi">
                <div class="name">kiwwi</div>
            </div>
            <div class="vegetableListBox sitafal">
                <div class="name">sitafal</div>
            </div>
        </div>
    </div>
    <footer>
        <div class="icon footerIcon"></div>
        <div class="social">
        In order to alleviate the crisis on farming fronts, it is necessary that we should think about and debate the mechanisms by which farmers are adequately compensated for their labor.
        </div>
        <div class="menu footerMenu">
            <span class="links footerLinks">Home</span>
            <span class="links footerLinks">Cart</span>
            <span class="links footerLinks">Ware Houses</span>
            <span class="links footerLinks">Farmers</span>
            <span class="links footerLinks">Login</span>
        </div>
    </footer>
    <script>
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