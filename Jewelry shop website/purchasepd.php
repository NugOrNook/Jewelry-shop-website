<?php 
session_start();
if (!isset($_SESSION['username'])) {
	header("location:login.php");
}
include "connect2.php"

?>
<html>
    <head>
        <meta charset="utf-8">
        <script src="https://kit.fontawesome.com/ea69c221e1.js" crossorigin="anonymous"></script>
        <link href="style/st_home.css" rel="stylesheet">

        <script>
            function send(){
                request = new XMLHttpRequest();
                request.onreadystatechange = showResult;

                var keyword = document.getElementById("keyword").value;
                var url = "searchajax.php?keyword="+keyword;
                request.open("GET", url, true);
                request.send(null);
            }
            function showResult(){
                if(request.readyState==4){
                    if(request.status==200){
                        document.getElementById("result").innerHTML=request.responseText;
                    }
                }
            }
        </script>
    </head>
    <body>
        <header class='header'>
            <div id="jewshop">
                <img src="img_decorate/jewshop5.png" width="200" height="40">
            </div>
            <!-- cart -->
            <a class="cart" href="cart.php"></a>
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
                    <input type="text" id="keyword" onkeyup="send()">
                    <input class='butt' type='button' value='ค้นหา'>
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
            <?php
                $stmt=$pdo->prepare("SELECT * FROM `po` JOIN product ON product.id_product=po.id_product WHERE po.username_cus =?");
                $stmt->bindParam(1,$_SESSION["username"]);
                $stmt->execute();
                $row=$stmt->fetch();
                while ($row = $stmt->fetch()) {
                    echo"Date order:".$row["date_order"]."<br>";
                    echo"Time_order:".$row["time_order"]."<br>";
                    echo"Qauntity:".$row["qty_product"]."<br>";
                    echo"ID_Product:".$row["id_product"]."<br>";
                    echo"Product:".$row["name_product"]."<br>";
                    
                    echo"Status:" .$row["payment_status"]."<br><hr>";
                }?>
            

           
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