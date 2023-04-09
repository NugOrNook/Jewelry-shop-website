<?php include "connect2.php"?>
<html>
    <head>
        <meta charset="utf-8">
        <link href="style/st_home.css" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <script src="https://kit.fontawesome.com/12745130dd.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <header class='header'>
            <div id="jewshop">
                <img src="img_decorate/jewshop5.png" width="200" height="40">
            </div>
            <div id="search">
                <form>
                    <input type="search" name="keyword">
                    <input id='butt' type='submit' value='ค้นหา'>
                </form>
            </div>
            
            <div class="dropdown">
                <a class="dropbtn"></a>
                <div class="dropdown-content">
                    <a href="#">PROFILE</a>
                    <a href="#">LOGUOT</a>
                </div>
            </div>
        </header>

        <nav>
            <ul class="navbar" data-toggle="dropdown">
                <li><a class="navlinkhome" href="homepage.php">HOME</a></li>|
                <li><a class="navlink" href="categories.php">CATEGORIES</a></li>|
                <li><a class="navlink" href="about_us.php">ABOUT US</a></li>|
                <li><a class="navlink" href="contact.php">CONTACT</a></li>|
                <li><a class="navlink" href="cart.php">CART</a></li>
            </ul>
        </nav>


        <main><br><br>
        <!-- search -->
        <div class="productall">
        <?php
            $stmt=$pdo->prepare("SELECT * FROM product WHERE name_product LIKE ?");
            if(!empty($_GET)){
                $value = '%'.$_GET["keyword"].'%';
            }
            $stmt->bindParam(1,$value);
            $stmt->execute();

            while($row=$stmt->fetch()){
        ?>
            <div class="product">
                <a href="homepage.php?id_product=<?= $row["id_product"]?>">
                    <img src='img_decorate/product1/<?= $row["id_product"]?>.jpg' width='220'>
                </a>
                <p class="product"><?= $row["price_product"]?>BATH</p>
                <p class="product"><?= $row["name_product"]?></p>
                <a href="cart.php" style="text-decoration: none;"><p class="buy">BUY</p></a>
            </div>
        <?php
            }
        ?>

        </div><br><br>
        <!-- show all product -->
        <div class="productall">
            <?php
                $stmt=$pdo->prepare("SELECT * FROM product");
                $stmt->execute();

                while($row=$stmt->fetch()){
            ?>
                
                    <div class="product">
                        <a href="homepage.php?id_product=<?= $row["id_product"]?>">
                            <img src='img_decorate/product1/<?= $row["id_product"]?>.jpg' width='220'>
                        </a>
                        <p class="product"><?= $row["price_product"]?> BATH</p>
                        <p class="product"><?= $row["name_product"]?></p>
                        <a href="cart.php" style="text-decoration: none;"><p class="buy">BUY</p></a>
                    </div>
            <?php
                }
            ?>
        </div>

        <div class="productall">
            <?php
                $stmt=$pdo->prepare("SELECT * FROM product");
                $stmt->execute();

                while($row=$stmt->fetch()){
            ?>
                <div class="product">
                    <a href="detail.php?id_product=<?= $row["id_product"]?>">
                        <img src='img_decorate/product1/<?= $row["id_product"]?>.jpg' width='200'>                      
                    </a>
                </div>
            <?php
            }
            ?>
        </div>
        </main>
    </body>
</html>