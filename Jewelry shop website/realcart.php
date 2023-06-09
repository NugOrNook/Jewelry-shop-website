<?php

session_start();
if (!isset($_SESSION['username'])) {
	header("location:login.php");
}
if(!isset($_SESSION['cart'])){
    header("location:homepage.php");
}
include "connect2.php";
// เพิ่มสินค้า
if ($_GET["action"]=="add") {
	$id_product = $_GET['id_product'];
	$cart_item = array(
 		'id_product' => $id_product,
		'name_product' => $_GET['name_product'],
		'price_product' => $_GET['price_product'],
		'num_product' => $_POST['num_product']
	);
	// ถ้ายังไม่มีสินค้าใดๆในรถเข็น
	if(empty($_SESSION['cart']))
    	$_SESSION['cart'] = array();
        
	// ถ้ามีสินค้านั้นอยู่แล้วให้บวกเพิ่ม
	if(array_key_exists($id_product, $_SESSION['cart']))
		$_SESSION['cart'][$id_product]['num_product'] += $_POST['num_product'];
 
	// หากยังไม่เคยเลือกสินค้นนั้นจะ
	else
	    $_SESSION['cart'][$id_product] = $cart_item;
        

// ปรับปรุงจำนวนสินค้า
} else if ($_GET["action"]=="update") {
	$id_product = $_GET["id_product"];     
	$num_product = $_GET["num_product"];
	$_SESSION['cart'][$id_product]["num_product"] = $num_product;

// ลบสินค้า
} else if ($_GET["action"]=="delete") {
	
	$id_product = $_GET['id_product'];
	unset($_SESSION['cart'][$id_product]);
}
?>

<html>
<head>
	<meta charset="utf-8">
        <script src="https://kit.fontawesome.com/ea69c221e1.js" crossorigin="anonymous"></script>
        <link href="style/st_home.css" rel="stylesheet">
	<script>
		
		// ใช้สำหรับปรับปรุงจำนวนสินค้า
		function update(id_product) {
			var num_product = document.getElementById(id_product).value;
			// ส่งรหัสสินค้า และจำนวนไปปรับปรุงใน session
			document.location = "realcart.php?action=update&id_product=" + id_product + "&num_product=" + num_product; 
		}
	</script>
</head>
<body>
<header class='header'>
<div id="jewshop">
                <img src="img_decorate/jewshop5.png" width="200" height="40">
            </div>
            <!-- cart -->
            <a class="cart" href="realcart.php?action="></a>
            <!-- <div>
                <a class="cart" href="realcart.php?action="></a>
            </div> -->
            <!-- dropdown profile -->
            <div class="dropdown">
                <a class="dropbtn"></a>
                <div class="dropdown-content">
                    <a href="profile.php">PROFILE</a>
                    <a href="logout.php">LOGOUT</a>
                </div>
            </div>
            <!-- input_search -->
            <div id="search">
                <form>
                    <!-- <input type="search" name="keyword"> -->
                    <input class='input_s' placeholder='ค้นหา' type="text" id="keyword" onkeyup="send()">
                    <input class='butt' id='butt' type='button' value='ค้นหา'>
                </form>
            </div>
        </header>

		<nav>
            <ul class="navbar">
                <li><a class="navlinkhome" href="homepage.php">HOME</a></li>|
                <li><a class="navlink" href="necklace.php">NECKLACE</a></li>|
                <li><a class="navlink" href="ring.php">RING</a></li>|
                <li><a class="navlink" href="earing.php">EARRING</a></li>|
                <li><a class="navlink" href="bracelet.php">BRACELET</a></li>
                <!-- |<li><a class="navlink" href="cart.php">CART</a></li> -->
            </ul>
        </nav>


	<main>
		<div class="show_cart">
			<div><br><br>
			
				<form action="submitorder.php" method="post">
					<table border="1">
						<?php 
							$sum = 0;
							foreach ($_SESSION["cart"] as $item) {
								$sum += $item["price_product"] * $item["num_product"];
						?>
						<tr><em>
							<td><img src='img_decorate/product1/<?= $item["id_product"]?>.jpg' width='220' ></td>
							<td><?=$item['id_product']?></td>
							<td><?=$item["name_product"]?></td>
							<td><?=$item["price_product"]?></td>
							รหัสสินค้า: <input type="text" value=<?=$item['id_product']?> name="id_product"><br>
							<td>			
								<input type="number" id="<?=$item["id_product"]?>" value="<?=$item["num_product"]?>" min="1" max="9" name="num_product">
								<a href="#" onclick="update(<?=$item['id_product']?>)">แก้ไข</a>
								<a href="?action=delete&id_product=<?=$item["id_product"]?>">ลบ</a>
							</td>
						</tr>
						<?php } ?>
						<tr><td colspan="5" align="right">รวม <?=$sum?> บาท</td></tr>
					<!-- </table> -->
					วันที่ทำการชำระเงิน: <input type="text" placeholder="YYYY-MM-DD" name="pdate"><br>
					เวลาที่ทำการชำระเงิน: <input type="text" placeholder="00:00:00" name="ptime"><br>
					สถานะ: <input type="radio" id="paid" name="pm_status" value="paid">
					<label for="paid">paid</label>
					<!-- <input type="radio" id="notpaid" name="pm_status" value="notpaid">
					<label for="notpaid">Not paid</label> -->
					<br><br></em>
					<input class="butt" type="submit" value="ยืนยัน"><br><br>
					</table>
					
				</form><br><em>
				ช่องทางการชำระเงิน<br>
				ธนาคาร:<br>
				เลขบัญชี:<br>
				ชื่อบัญชี:<br></em>
				<br><br>
			</div>
		</div>
	</main>
	<footer>
        <div class="jsonn"><br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <a>สาขาในกรุงเทพมหานครและปริมณฑล</a>
                <ul id="result2"></ul>
            
                <script>
                    function showResult(){
                        if(request.readyState==4){
                            if(request.status==200){
                                document.getElementById("result2").innerHTML=request.responseText;
                            }
                        }
                    } 
                    async function getDataFromAPI() {
                        let response = await fetch('branch.json')
                        let rawData = await response.text() // อ่านผลลัพธ์
                        objectData = JSON.parse(rawData) // แปลผลลัพธ์เป็น object
                        let result = document.getElementById('result2') // ดึง <ul> เพื่อใช้ในการเพิ่มแท็ก <li>

                        for (let i = 0; i < objectData.shop.length; i++) {
                            let content = 'สาขา: ' + objectData.shop[i].branch + '&nbsp'
                            content += 'ที่อยู่: ' + objectData.shop[i].address + '&nbsp'
                            content += 'เบอร์โทรติดต่อ: ' + objectData.shop[i].contact;
                            let li = document.createElement('li') ;
                            li.innerHTML = content ;
                            result.appendChild(li) 
                        }
                    }
                    getDataFromAPI() // เรียกฟังก์ชัน    
                </script><br>
            </div> 
        </footer>

</body>
</html>