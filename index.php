<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./assets/css/style.css">
    <title>NAvbar</title>
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
            <span class="links">Home</span>
            <span class="links">Cart</span>
            <span class="links">Ware Houses</span>
            <span class="links">Farmers</span>
        </div>
    </header>
    <div class="intialAdvertisement">
        <div class="intialAdvertisementContainer">
            <div class="fruitAdvertisement">
                <div class="title">Buy Fruits at best price</div>
            </div>
            <div class="vegetablesAdvertisement">
                <div class="title">Buy vegetables at best price</div>
            </div>
        </div>
    </div>
    <div class="vegetableListContainer">
        <div class="vegetableListScroll">
            <div class="vegetableListBox"></div>
            <div class="vegetableListBox"></div>
            <div class="vegetableListBox"></div>
            <div class="vegetableListBox"></div>
            <div class="vegetableListBox"></div>
            <div class="vegetableListBox"></div>
        </div>
    </div>
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

    </script>
</body>
</html>