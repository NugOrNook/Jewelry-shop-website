<?php include "connect2.php"?>
<html>
<head><meta charset="utf-8">
    <script>
        function confirmDelete(id_product){
            var ans=confirm("ต้องการลบสมาชิก"+ id_product);
            if (ans==true)
            document.location ="deleteproduct.php?id_product="+id_product;
        }
    </script>
<style>
    .list{
        padding: 100px;
        background-color:white;
        margin:100px 100px;
        border-radius:50px;

    }
    body{
        background-color:black;
    }
    header{
            background-color:black;
            display: flex;
            justify-content:center;
            height: 85px;
            align-items: center;
            
        }
    nav{
        text-align:center;
    }
    nav a{
        display: inline-flex;
        text-align:center;
        font-size:30px;
        border-radius:10px;
        margin:20px;
        padding:30px;
        /* padding:20px;
        margin-left:650px;
        margin-right:650px; */
        background:white;
        color:black;
    }
    a:link{
        text-decoration:none;
    }
    a:hover{
        background:yellow;
    }
</style>
</head>
<body>
<header><img src="img_decorate/jewshop5.png" width="200" height="40" ></header>
<nav>
    <a href="homead.php">BACK  </a><a href="#">Necklace</a><a href="#">Ring</a><a href="#">Earring</a><a href="#">Bracelace</a>
</nav>
<div class="list">
<?php
$stmt = $pdo->prepare("SELECT * FROM product");
$stmt->execute();
while ($row = $stmt->fetch()) {



echo "รหัสสินค้า:" .$row ["id_product"]."<br>";
echo "ชื่อสินค้า:" .$row ["name_product"]."<br>";
echo "ราคาสินค้า:" .$row ["price_product"]. "<br>";
echo "จำนวน:" .$row ["num_product"]. "<br>";
echo "ประเภทสินค้า:" .$row ["id_type"]. "<br>";

// echo "<a href='addproduct.php?id_product=".$row ["id_product"]."'>เพิ่มสินค้า</a> |";
echo "<a href='editformproduct.php?id_product=".$row ["id_product"]."'>แก้ไข</a> |";
echo "<a href='#' onclick= confirmDelete('".$row["id_product"]."')> ลบ</a>";
echo "<hr>\n";
 } ?>
</div>
</body>
</html>