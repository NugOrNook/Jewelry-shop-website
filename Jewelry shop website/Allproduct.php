<?php include "connect2.php"?>
<html>
<head><meta charset="utf-8">
 <link href="style/style_ad.css" rel="stylesheet"> 
</head>
<body>
    <header><img src="img_decorate/jewshop5.png" width="200" height="40" ></header>
    <nav>
    <a href="homead.php">BACK</a><a href="T001.php">Necklace</a><a href="T002.php">Ring</a><a href="T003.php">Earring</a><a href="T004.php">Bracelet</a>
    </nav>
<section class="list">
<?php
$stmt = $pdo->prepare("SELECT * FROM product");
$stmt->execute();
while ($row = $stmt->fetch()) {



echo "รหัสสินค้า:" .$row ["id_product"]."<br>";
echo "ชื่อสินค้า:" .$row ["name_product"]."<br>";
echo "ราคาสินค้า:" .$row ["price_product"]. "<br>";
echo "จำนวน:" .$row ["num_product"]. "<br>";
echo "ประเภทสินค้า:" .$row ["id_type"]. "<br><hr>";

// // echo "<a href='addproduct.php?id_product=".$row ["id_product"]."'>เพิ่มสินค้า</a> |";
// echo "<a href='editformproduct.php?id_product=".$row ["id_product"]."'>แก้ไข</a> |";
// echo "<a href='#' onclick= confirmDelete('".$row["id_product"]."')> ลบ</a>";
// echo "<hr>\n";
 } ?>
</section>
</body>
</html>