<!DOCTYPE html>
<html>
<header>
<title>Laptop - Product detail</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" type="image/png" sizes="16x16" href="../img/favicon.png">
<link rel="stylesheet" href="../style.css">
<script src="../script.js"></script>
</header>
<body>

<ul class="nav">
	<li><a href="javascript:Menu();"><img class="navbtn" src="../img/menu.svg" alt="Menu"></a></li>
	<div class="logoholder1"><a href="../"><img class="logo" src="../img/logo1.png" alt="Laptop"></a></div>
	<div class="logoholder2"><a href="../"><img class="logo" src="../img/logo2.png" alt="Laptop"></a></div>
	<form id="search" action="../search.php" method="get">
		<input type="search" placeholder="Search..." name="keyword">
	</form>
	<li><a href="../login.php"><img class="navbtn" src="../img/account.svg" alt="Account"></a></li>
	<li><a href="../cart.php"><img class="navbtn" src="../img/cart.svg" alt="Shopping cart"></a></li>
</ul>

<ul id="menu">
	<div class="menuaccountcard">
		<img src="../img/card.png" width="100%">
		<div class="menuaccount">
			<span class="menuaccounticon"><img class="menuaccountimg" src="../img/account.svg" alt="Account"></span>
			<p>Guest</p>
		</div>
	</div>
	<li><a class="menubtn" href="../">Home</a></li>
	<li><a class="menutitle">Range</a></li>
	<li><a class="menubtn" href="../search.php?range=low">Low-end</a></li>
	<li><a class="menubtn" href="../search.php?range=mid">Mid-end</a></li>
	<li><a class="menubtn" href="../search.php?range=high">High-end</a></li>
	<li><a class="menutitle">Categories</a></li>
	<li><a class="menubtn" href="../search.php?category=best-value">Best value<br><small>(cost/performance ratio)</small></a></li>
	<li><a class="menubtn" href="../search.php?category=portability">For high portability</a></li>
	<li><a class="menubtn" href="../search.php?category=gaming">For gaming</a></li>
	<li><a class="menubtn" href="../search.php?category=content-creation">For content creation</a></li>
	<li><a class="menubtn" href="../search.php?category=business">For business</a></li>
	<li><a class="menutitle">More</a></li>
	<li><a class="menubtn" href="../sitemap.html">Sitemap</a></li>
	<li><a class="menubtn" href="../about.html">About us</a></li>
</ul>
<div id="main">
	<?php
	$id = $_GET['id'];
	?>
	<div class="productnav">
		<p>Product ID: <b id="code"></b></p>
		<!--<b class="price" style="float: right;">(Beta)</b>-->
	</div>
	
	<div class="productcontent">
		<div class="productimgcontent">
			<div class="productimg">
				<img id="pic" width="100%">
			</div>
		</div>
		<div>
			<h2 id="name"></h2>
			<h3 class="price" id="price"></h3>
			<div class="productactiongroup">
				<button class="comparebtn" id="comparebtn">Compare</button>
				<button onclick="javascript:void(0);" class="addtocartbtn">Add to cart<br><small>(coming soon)</small></button>
			</div>			
			<div id="productbtngroup">
			
				<!--
				<button class="productbtn seleted" id="1" onclick="javascript:SeletedSpec(1);">AMD Ryzen™ 5 4600HS + NVIDIA® GeForce® GTX 1650 Ti</button>
				<button class="productbtn" id="2" onclick="javascript:SeletedSpec(1);">AMD Ryzen™ 7 4800HS + NVIDIA® GeForce® GTX 1650 Ti</button>
				-->
			
			</div>
			
			<h2 class="title">Specification</h2>
			<div class="productdetail">
				<table>
					<tr>
						<th>Operating System</th>
						<td id="OS"></td>
					</tr>
					<tr>
						<th>Processor</th>
						<td id="CPU"></td>
					</tr>
					<tr>
						<th>Graphics</th>
						<td id="GPU"></td>
					</tr>
					<tr>
						<th>Memory</th>
						<td id="RAM"></td>
					</tr>
					<tr>
						<th>Storage</th>
						<td id="Storage"></td>
					</tr>
					<tr>
						<th>Screen</th>
						<td id="Screen"></td>
					</tr>
					<tr>
						<th>Battery</th>
						<td id="Battery"></td>
					</tr>
					<tr>
						<th>Weight</th>
						<td id="Weight"></td>
					</tr>
				</table>
			</div>
		</div>
	</div>
	
	<h2 class="title">Introduction</h2>
	<p id="Intro"></p>
	
	<h2 class="title">Overall (coming soon...)</h2>
	
	<h2 class="title">Similar products (coming soon...)</h2>
	
	<script>
	var File = new XMLHttpRequest();
	var content;
	File.open("GET", "./database.txt", false);
	File.onreadystatechange = function ()
	{
		if(File.readyState === 4)
		{
			if(File.status === 200 || File.status == 0)
			{
				content = File.responseText;
			}
		}
	}
	File.send(null);
	
	var database = JSON.parse(content);

	var id = "<?php echo"$id"?>";
	var seleted = false;
	var seletednum = 0;
	for (let i in database) {
		if (database[i].ID == id) {
			for (i2 = 0; i2 < Object.keys(database[i].CPU).length; i2++) {
				if (database[i].Price[i2] == 0) {
					document.getElementById('productbtngroup').innerHTML += '<button class="productbtn disabled" id="' + (i2 + 1) + '" onclick="javascript:SeletedSpec(' + (i2 + 1) + ');">' + database[i].Short[i2] + '</button>';
				} else {
					if (!seleted) {
						document.getElementById('productbtngroup').innerHTML += '<button class="productbtn selected" id="' + (i2 + 1) + '" onclick="javascript:SeletedSpec(' + (i2 + 1) + ');">' + database[i].Short[i2] + '</button>';
						seleted = true;
						seletednum = i2;
					} else {
						document.getElementById('productbtngroup').innerHTML += '<button class="productbtn" id="' + (i2 + 1) + '" onclick="javascript:SeletedSpec(' + (i2 + 1) + ');">' + database[i].Short[i2] + '</button>';
					}
				}
			}
			
			document.getElementById("code").textContent = database[i].ID;
			document.getElementById("pic").src = "./img/" + database[i].Name + ".jpg";
			document.getElementById("name").textContent = database[i].Name;
			document.getElementById("price").textContent = "HKD$" + database[i].Price[seletednum];
			
			document.getElementById("OS").textContent = database[i].OS[seletednum];
			document.getElementById("CPU").textContent = database[i].CPU[seletednum];
			document.getElementById("GPU").textContent = database[i].GPU[seletednum];
			document.getElementById("RAM").textContent = database[i].RAM[seletednum];
			document.getElementById("Storage").textContent = database[i].Storage[seletednum];
			document.getElementById("Screen").textContent = database[i].Screen[seletednum];
			document.getElementById("Battery").textContent = database[i].Battery[seletednum] + " WHr";
			document.getElementById("Weight").textContent = database[i].Weight[seletednum] + " kg";
			
			document.getElementById("Intro").textContent = database[i].Intro;
			
			document.getElementById("comparebtn").setAttribute('onclick',"javascript:location.href='./compare.php?id=" + id + "(" + seletednum + ");'");
		}
	}
	
	function SeletedSpec(num) {
	var i = 1;
	var x = document.getElementById(i);
	
	while (x != null) {
			if (i != num && x.className != "productbtn disabled") {
				x.className = "productbtn";
			} else if (i == num && x.className != "productbtn disabled") {
				x.className = "productbtn selected";
			}
		i++;
		x = document.getElementById(i);
	}

	var File = new XMLHttpRequest();
	var content;
	File.open("GET", "./database.txt", false);
	File.onreadystatechange = function ()
	{
		if(File.readyState === 4)
		{
			if(File.status === 200 || File.status == 0)
			{
				content = File.responseText;
			}
		}
	}
	File.send(null);
	
	var database = JSON.parse(content);
	
	var id = "<?php echo"$id"?>";
	for (let i in database) {
		if (database[i].ID == id) {
			if (document.getElementById(num).className == "productbtn disabled") {
				document.getElementById("price").textContent = "Currently unavailable";
			} else {
				document.getElementById("price").textContent = "HKD$" + database[i].Price[num-1];
			}
			document.getElementById("OS").textContent = database[i].OS[num-1];
			document.getElementById("CPU").textContent = database[i].CPU[num-1];
			document.getElementById("GPU").textContent = database[i].GPU[num-1];
			document.getElementById("RAM").textContent = database[i].RAM[num-1];
			document.getElementById("Storage").textContent = database[i].Storage[num-1];
			document.getElementById("Screen").textContent = database[i].Screen[num-1];
			document.getElementById("Battery").textContent = database[i].Battery[num-1] + " WHr";
			document.getElementById("Weight").textContent = database[i].Weight[num-1] + " kg";
			
			document.getElementById("comparebtn").setAttribute('onclick',"javascript:location.href='./compare.php?id=" + id + "(" + (num - 1) + ");'");
		}
	}
}
	</script>

</div>

</body>

<footer>
<div class="footerlinkgroup">
<a class="footerlink" href="../sitemap.html">Sitemap</a><a class="footerlink" href="../about.html">About us</a><a class="footerlink" href="../login.php">Account</a>
</div>
&copy; Copyright 2020 Laptop, Inc. All rights reserved.
</footer>
</html>