<html>
<head>
    <meta charset="utf-8">
    <link href="style/style_ad.css" rel="stylesheet"> 
</head>
<body>
<?php include "connect2.php" ?>
    <header><img src="img_decorate/jewshop5.png" width="200" height="40" ></header>
    <nav>
    <a href="listproduct.php">BACK</a>
    </nav>
    <section class='list'>
<?php
        // date_order	
// time_order	
// qty_product	
// username_cus	
// id_product	
// payment_status
    $stmt = $pdo->prepare("UPDATE po SET date_order=?,time_order=?,qty_product=?,username_cus=?,id_product=?,payment_status=? where date_order=? AND time_order=? AND qty_product=? AND username_cus=? AND id_product=? AND payment_status=?;");
    $stmt->bindParam(1, $_GET["date_order"]); 
    $stmt->bindParam(2, $_GET["time_order"]); 
    $stmt->bindParam(3, $_GET["qty_product"]); 
    $stmt->bindParam(4, $_GET["username_cus"]); 
    $stmt->bindParam(5, $_GET["id_product"]); 
    $stmt->bindParam(6, $_GET["payment_status"]); 
    if ($stmt->execute()){
    echo "แก้ไขสมาชิก" .$_POST["payment_status"]."สำเร็จ";
    }
    ?>
    </section>
</body>
</html>