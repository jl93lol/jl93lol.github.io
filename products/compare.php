<!DOCTYPE html>
<html>
<header>
<title>Laptop - Product comparison</title>
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
		<p>Product comparison</p>
	</div>
	<div id="addproductmenu">
		<div class="logodarkholder1"><img class="logodark" src="../img/logodark1.png" alt="Laptop"></div>
		<div class="logodarkholder2"><img class="logodark" src="../img/logodark2.png" alt="Laptop"></div>
		<span class="cross" onclick="AddProductDiv()">&#x2716;</span>
		<div class="addproductmain">
			<input id="addproductinput" type="text" placeholder="Search for another product..." onclick="DropListSearch()" oninput="DropListSearch()" autocomplete="off">
			<div id="addproductdroplistgroup">
				
			</div>
		</div>
	</div>
	<div id="addnewproduct"></div>
	<div class="productinfo" id="productinfo">
		
	</div>
	<h2 class="title">Relative Specification</h2>
	
	<div class="comparegroup">
		<div class="comparescore">
			<h3 class="comparetitle">Processor: Single-Core Score</h3>
			<div class="description1">
				<small>Rank by scores in Geekbench 5, higher is better</small>
			</div>
			<br>
			
			<div id="CPU1">
				
			</div>
		</div>
		
		<div class="comparescore">
			<h3 class="comparetitle">Processor: Multi-Core Score</h3>
			<div class="description1">
				<small>Rank by scores in Geekbench 5, higher is better</small>
			</div>
			<br>
			
			<div id="CPU2">
				
			</div>
		</div>
		
		<div class="comparescore">
			<h3 class="comparetitle">Graphics: Graphics Score<small class="price"> (Apple laptop not supported)</small></h3>
			<div class="description2">
				<small>Rank by scores in 3DMark (Time Spy benchmark), higher is better</small>
			</div>
			<br>
			
			<div id="GPU1">
				
			</div>
		</div>
		
		<div class="comparescore">
			<h3 class="comparetitle">Memory: Amount Available</h3>
			<div class="description3">
				<small>Rank by the amount of memory available, higher is better</small>
			</div>
			<br>
			
			<div id="RAM1">
				
			</div>
		</div>
		
		<div class="comparescore">
			<h3 class="comparetitle">Memory: Speed</h3>
			<div class="description3">
				<small>Rank by the speed of the memory, higher is better</small>
			</div>
			<br>
			
			<div id="RAM2">
				
			</div>
		</div>
		
		<div class="comparescore">
			<h3 class="comparetitle">Storage: Amount Available</h3>
			<div class="description4">
				<small>Rank by the amount of storage available, higher is better</small>
			</div>
			<br>
			
			<div id="Storage1">
				
			</div>
		</div>
		
		<div class="comparescore">
			<h3 class="comparetitle">Screen: Resolution</h3>
			<div class="description5">
				<small>Rank by the resolution of the screen, higher is better</small>
			</div>
			<br>
			
			<div id="Screen1">
				
			</div>
		</div>
		
		<div class="comparescore">
			<h3 class="comparetitle">Screen: Refresh Rate</h3>
			<div class="description5">
				<small>Rank by the refresh rate of the screen, higher is better</small>
			</div>
			<br>
			
			<div id="Screen2">
				
			</div>
		</div>
		
		<div class="comparescore">
			<h3 class="comparetitle">Battery: Capacity</h3>
			<div class="description6">
				<small>Rank by the capacity of the battery, higher is better</small>
			</div>
			<br>
			
			<div id="Battery1">
				
			</div>
		</div>
		
		<div class="comparescore">
			<h3 class="comparetitle">Weight</h3>
			<div class="description7">
				<small>Rank by the weight, lower is better</small>
			</div>
			<br>
			
			<div id="Weight1">
				
			</div>
		</div>
	</div>
	
	<h2 class="title">Specification</h2>
	
	<img class="menuaccountimg" src="../img/OS.svg" alt="Account">
	
	<script>
	var File = new XMLHttpRequest();
	var content;
    File.open("GET", "../products/database.txt", false);
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
	
	var IDArray = new Array();
	var IDVersionArray = new Array();
	var start = 0;
	var CompareArray = new Array();
	var HighestScore = 0;
	
	for (pos = 0; pos < id.length; pos++) {
		if (id.substring(pos, pos + 1) == ";" && IDArray.length < 10) {
			for (pos1 = start; pos1 <= pos; pos1++) {
				if (id.substring(pos1, pos1 + 1) == "(") {
					IDArray.push(id.substring(start, pos1));
					IDVersionArray.push(id.substring(pos1 + 1, pos - 1));
				}
			}
			start = pos + 1;
		}
	}
	
	var numofid = IDArray.length;
	
	var gridTemplateColumnsString = "";
	for (idpos = 0; idpos < numofid; idpos++) {
		for (let i in database) {
			if (database[i].ID == IDArray[idpos]) {
				//document.getElementById('productinfo').innerHTML += '<span class="dot' + (idpos + 1) + '"></span><span>' + database[i].Name + '<br><small>(' + database[i].Short[IDVersionArray[idpos]] + ')</small></span>';
				document.getElementById('productinfo').innerHTML += '<div class="compareinfo"><span class="dot' + (idpos + 1) + '"></span><h3 class="comparetitle">' + database[i].Name + '</h3><small>(' + database[i].Short[IDVersionArray[idpos]] + ')</small><hr><img width="100%" src="./img/preview/' + database[i].Name + '.png"></img></div>';
				gridTemplateColumnsString += " 40%";
				CompareArray.push(database[i].CPU1[IDVersionArray[idpos]]);
			}
		}
	}
	document.getElementById('productinfo').style.gridTemplateColumns = gridTemplateColumnsString;
	
	if (numofid < 10) {document.getElementById('addnewproduct').innerHTML = '<button class="addproductbtn" onclick="AddProductDiv()">Add another product</button>'};
	HighestScore = Math.max.apply(Math, CompareArray);
	
	for (idpos = 0; idpos < numofid; idpos++) {
		for (let i in database) {
			if (database[i].ID == IDArray[idpos]) {
				//document.getElementById('CPU1').innerHTML += '<span>' + database[i].CPU[IDVersionArray[idpos]] + '</span><div class="progress"><span class="progress' + (idpos + 1) + '" style="width:' + (database[i].CPU1[IDVersionArray[idpos]] / HighestScore * 100).toFixed(2) + '%;"><p class="progresstext">' + database[i].CPU1[IDVersionArray[idpos]] + '</p></span></div>';
				document.getElementById('CPU1').innerHTML += '<span>' + database[i].CPU[IDVersionArray[idpos]] + '</span><div class="progress"><span class="progress' + (idpos + 1) + '" style="width:' + (database[i].CPU1[IDVersionArray[idpos]] / HighestScore * 100).toFixed(2) + '%;"></span></div>';
			}
		}
	}
	
	//CPU2
	CompareArray = new Array();
	
	for (idpos = 0; idpos < numofid; idpos++) {
		for (let i in database) {
			if (database[i].ID == IDArray[idpos]) {
				CompareArray.push(database[i].CPU2[IDVersionArray[idpos]]);
			}
		}
	}
	
	HighestScore = Math.max.apply(Math, CompareArray);
	
	for (idpos = 0; idpos < numofid; idpos++) {
		for (let i in database) {
			if (database[i].ID == IDArray[idpos]) {
				document.getElementById('CPU2').innerHTML += '<span>' + database[i].CPU[IDVersionArray[idpos]] + '</span><div class="progress"><span class="progress' + (idpos + 1) + '" style="width:' + (database[i].CPU2[IDVersionArray[idpos]] / HighestScore * 100).toFixed(2) + '%;"></span></div>';
			}
		}
	}
	
	//GPU1
	CompareArray = new Array();
	
	for (idpos = 0; idpos < numofid; idpos++) {
		for (let i in database) {
			if (database[i].ID == IDArray[idpos]) {
				CompareArray.push(database[i].GPU1[IDVersionArray[idpos]]);
			}
		}
	}
	
	HighestScore = Math.max.apply(Math, CompareArray);
	
	for (idpos = 0; idpos < numofid; idpos++) {
		for (let i in database) {
			if (database[i].ID == IDArray[idpos]) {
				document.getElementById('GPU1').innerHTML += '<span>' + database[i].GPU[IDVersionArray[idpos]] + '</span><div class="progress"><span class="progress' + (idpos + 1) + '" style="width:' + (database[i].GPU1[IDVersionArray[idpos]] / HighestScore * 100).toFixed(2) + '%;"></span></div>';
			}
		}
	}
	
	//RAM1
	CompareArray = new Array();
	
	for (idpos = 0; idpos < numofid; idpos++) {
		for (let i in database) {
			if (database[i].ID == IDArray[idpos]) {
				CompareArray.push(database[i].RAM1[IDVersionArray[idpos]]);
			}
		}
	}
	
	HighestScore = Math.max.apply(Math, CompareArray);
	
	for (idpos = 0; idpos < numofid; idpos++) {
		for (let i in database) {
			if (database[i].ID == IDArray[idpos]) {
				document.getElementById('RAM1').innerHTML += '<span>' + database[i].RAM[IDVersionArray[idpos]] + '</span><div class="progress"><span class="progress' + (idpos + 1) + '" style="width:' + (database[i].RAM1[IDVersionArray[idpos]] / HighestScore * 100).toFixed(2) + '%;"></span></div>';
			}
		}
	}
	
	//RAM2 (no reuse)
	CompareArray = new Array();
	
	for (idpos = 0; idpos < numofid; idpos++) {
		for (let i in database) {
			if (database[i].ID == IDArray[idpos]) {
				CompareArray.push(database[i].RAM2[IDVersionArray[idpos]]);
			}
		}
	}
	
	HighestScore = Math.max.apply(Math, CompareArray);
	
	for (idpos = 0; idpos < numofid; idpos++) {
		for (let i in database) {
			if (database[i].ID == IDArray[idpos]) {
				document.getElementById('RAM2').innerHTML += '<span>' + database[i].RAM2[IDVersionArray[idpos]] + ' MHz</span><div class="progress"><span class="progress' + (idpos + 1) + '" style="width:' + (database[i].RAM2[IDVersionArray[idpos]] / HighestScore * 100).toFixed(2) + '%;"></span></div>';
			}
		}
	}
	
	//Storage1
	CompareArray = new Array();
	
	for (idpos = 0; idpos < numofid; idpos++) {
		for (let i in database) {
			if (database[i].ID == IDArray[idpos]) {
				CompareArray.push(database[i].Storage1[IDVersionArray[idpos]]);
			}
		}
	}
	
	HighestScore = Math.max.apply(Math, CompareArray);
	
	for (idpos = 0; idpos < numofid; idpos++) {
		for (let i in database) {
			if (database[i].ID == IDArray[idpos]) {
				document.getElementById('Storage1').innerHTML += '<span>' + database[i].Storage[IDVersionArray[idpos]] + '</span><div class="progress"><span class="progress' + (idpos + 1) + '" style="width:' + (database[i].Storage1[IDVersionArray[idpos]] / HighestScore * 100).toFixed(2) + '%;"></span></div>';
			}
		}
	}
	
	//Screen1 (no reuse)
	CompareArray = new Array();
	
	for (idpos = 0; idpos < numofid; idpos++) {
		for (let i in database) {
			if (database[i].ID == IDArray[idpos]) {
				CompareArray.push(database[i].Screen1[IDVersionArray[idpos]]);
			}
		}
	}
	
	HighestScore = Math.max.apply(Math, CompareArray);
	
	for (idpos = 0; idpos < numofid; idpos++) {
		for (let i in database) {
			if (database[i].ID == IDArray[idpos]) {
				document.getElementById('Screen1').innerHTML += '<span>' + database[i].Screen1[IDVersionArray[idpos]] + 'P (' + database[i].Screen[IDVersionArray[idpos]] + ')</span><div class="progress"><span class="progress' + (idpos + 1) + '" style="width:' + (database[i].Screen1[IDVersionArray[idpos]] / HighestScore * 100).toFixed(2) + '%;"></span></div>';
			}
		}
	}
	
	//Screen2 (no reuse)
	CompareArray = new Array();
	
	for (idpos = 0; idpos < numofid; idpos++) {
		for (let i in database) {
			if (database[i].ID == IDArray[idpos]) {
				CompareArray.push(database[i].Screen2[IDVersionArray[idpos]]);
			}
		}
	}
	
	HighestScore = Math.max.apply(Math, CompareArray);
	
	for (idpos = 0; idpos < numofid; idpos++) {
		for (let i in database) {
			if (database[i].ID == IDArray[idpos]) {
				document.getElementById('Screen2').innerHTML += '<span>' + database[i].Screen2[IDVersionArray[idpos]] + ' Hz (' + database[i].Screen[IDVersionArray[idpos]] + ')</span><div class="progress"><span class="progress' + (idpos + 1) + '" style="width:' + (database[i].Screen2[IDVersionArray[idpos]] / HighestScore * 100).toFixed(2) + '%;"></span></div>';
			}
		}
	}
	
	//Battery1 (no reuse)
	CompareArray = new Array();
	
	for (idpos = 0; idpos < numofid; idpos++) {
		for (let i in database) {
			if (database[i].ID == IDArray[idpos]) {
				CompareArray.push(database[i].Battery[IDVersionArray[idpos]]);
			}
		}
	}
	
	HighestScore = Math.max.apply(Math, CompareArray);
	
	for (idpos = 0; idpos < numofid; idpos++) {
		for (let i in database) {
			if (database[i].ID == IDArray[idpos]) {
				document.getElementById('Battery1').innerHTML += '<span>' + database[i].Battery[IDVersionArray[idpos]] + ' WHr</span><div class="progress"><span class="progress' + (idpos + 1) + '" style="width:' + (database[i].Battery[IDVersionArray[idpos]] / HighestScore * 100).toFixed(2) + '%;"></span></div>';
			}
		}
	}
	
	//Weight1 (no reuse)
	CompareArray = new Array();
	
	for (idpos = 0; idpos < numofid; idpos++) {
		for (let i in database) {
			if (database[i].ID == IDArray[idpos]) {
				CompareArray.push(database[i].Weight[IDVersionArray[idpos]]);
			}
		}
	}
	
	HighestScore = Math.max.apply(Math, CompareArray);
	
	for (idpos = 0; idpos < numofid; idpos++) {
		for (let i in database) {
			if (database[i].ID == IDArray[idpos]) {
				document.getElementById('Weight1').innerHTML += '<span>' + database[i].Weight[IDVersionArray[idpos]] + ' kg</span><div class="progress"><span class="progress' + (idpos + 1) + '" style="width:' + (database[i].Weight[IDVersionArray[idpos]] / HighestScore * 100).toFixed(2) + '%;"></span></div>';
			}
		}
	}
	
	
	
	
	
	
	
	
	function AddProductDiv() {
		var x = document.getElementById("addproductmenu");
		if (x.style.width == "0vw" || x.style.width == "") {
			x.style.width = "100vw";
		} else {
			x.style.width = "0vw";
		}
	}
	
	function DropListSearch() {
		var File = new XMLHttpRequest();
		var content;
		File.open("GET", "../products/database.txt", false);
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
		
		document.getElementById('addproductdroplistgroup').innerHTML = "";
		var userinput = document.getElementById("addproductinput").value;
		userinput = userinput.toLowerCase();
		var id = "<?php echo"$id"?>";
		var IDArray = new Array();
		var IDVersionArray = new Array();
		var start = 0;
		
		for (pos = 0; pos < id.length; pos++) {
			if (id.substring(pos, pos + 1) == ";" && IDArray.length < 10) {
				for (pos1 = start; pos1 <= pos; pos1++) {
					if (id.substring(pos1, pos1 + 1) == "(") {
						IDArray.push(id.substring(start, pos1));
						IDVersionArray.push(id.substring(pos1 + 1, pos - 1));
					}
				}
				start = pos + 1;
			}
		}
		
		for (let i in database) {
			var end = length;
			var match = false;
			var VersionNotAvailable = new Array();

			for (start = 0; end <= database[i].Name.length; start++) {
				end = start + userinput.length;
				match = match || database[i].Name.substring(start,end).toLowerCase().includes(userinput);
			}
			
			for (i2 = 0; i2 < IDArray.length; i2++) {
				if (IDArray[i2] == database[i].ID) {
					VersionNotAvailable.push(IDVersionArray[i2]);
				}
			}
			
			if (match) {
				for (i3 = 0; i3 < database[i].Short.length; i3++) {
					var available = true;
					for (i4 = 0; i4 < VersionNotAvailable.length; i4++) {
						if (VersionNotAvailable[i4] == i3) {
							available = false;
						}
					}
					if (available) {
						document.getElementById('addproductdroplistgroup').innerHTML += '<a class="addproductdroplist" href="./compare.php?id=' + id + database[i].ID + '(' + i3 + ');">' + database[i].Name + '<br><small>(' + database[i].Short[i3] + ')</small></a>';
					}
				}
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