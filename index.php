<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>HOI4 National Focus Tool</title>
<meta name="description" content="Tool for making national focuses in Hearts of Iron IV">
<!-- Bootstrap Core CSS -->
<link href="css/bootstrap.min.css?v=1" rel='stylesheet' type='text/css' />
<!-- Custom CSS -->
<link href="css/style.css?v=096" rel='stylesheet' type='text/css' />
<!-- Graph CSS -->
<link href="css/font-awesome.css?v=1" rel="stylesheet"> 
<!-- jQuery -->
<script src="js/jquery-2.1.4.min.js?v=1"></script>
<!-- //jQuery -->
<script src="js/script.js?v=096"></script>
<link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
<!-- lined-icons -->
<link rel="stylesheet" href="css/icon-font.min.css?v=1" type='text/css' />
<!-- //lined-icons -->
</head> 
<body>
	<div class="page-container">
   	<div id="edit">	
		<div class="panel" style="left:265px">
			<div class="panel-head">
			<p id="edit-close" class="close-button">X</p>
				<h3>Add/Edit Focus</h3>
			</div>
			<div class="panel-body">
				<p>
					<p>Name</p>
					<input id="name">
				</p>
				<p>
					<p>Description</p>
					<textarea id="desc"></textarea>
				</p>
					<p>
					<button id="open-gfx">Choose GFX</button>
					<input id="chosen-gfx" value="goal_unknown" hidden>
					<img src="images/goal_unknown.png" id="display-gfx">
				</p>
				<div id="choosegfx">
					<?php
					$directory = 'images/';
					$scanned_directory = array_diff(scandir($directory, 1), array('..', '.'));
					foreach ($scanned_directory as $value) {
						$file = 'images/' . $value;
						$id = str_replace(".png","",$value);
						echo '<img id="'.$id.'" class="nficon" src="'.$file.'">';
					}
					?>
			
			</div>
				<p>
					<p>Bypass</p>
					<textarea id="bypass"></textarea>
				</p>
				<p>
					<p>Available</p>
					<textarea id="available"></textarea>
				</p>
				<p>
					<p>Mutually Exclusive</p>
					<input id="mutual">
				</p>
				<p>
					<p>Prerequisite</p>
					<input id="prefocus">
				</p>
				<p>
					<p>AI Will Do Factor</p>
					<input id="ai" type="number">
				</p>
				<p>
					<p>Time to Complete</p>
					<select id="time">
						<option value="1">1 Week</option>
						<option value="2">2 Weeks</option>
						<option value="3">3 Weeks</option>
						<option value="4">4 Weeks</option>
						<option value="5">5 Weeks</option>
						<option value="6">6 Weeks</option>
						<option value="7">7 Weeks</option>
						<option value="8">8 Weeks</option>
						<option value="9">9 Weeks</option>
						<option value="10" selected>10 Weeks</option>
						<option value="11">11 Weeks</option>
						<option value="12">12 Weeks</option>
						<option value="13">13 Weeks</option>
						<option value="14">14 Weeks</option>
						<option value="15">15 Weeks</option>
					</select>
				</p>
				<p>
					<p>Location - X|Y</p>
					<input id="x">|<input id="y">
				</p>
				<p>
					<p>Complete Tooltip</p>
					<textarea id="tooltip"></textarea>
				</p>
				<p>
					<p>Reward</p>
					<textarea id="reward"></textarea>
				</p>
				<p>
					<button id="submit-focus">Submit</button>
				</p>
			</div>
		</div>
	</div>
	<div id="export-help-box">	
		<div class="panel" style="left:265px">
			<div class="panel-head">
			<p id="close-export-help" class="close-button">X</p>
				<h3>Export Help</h3>
			</div>
			<div class="panel-body">
				<p>Saving to local storage will allow you to leave this page, and return with your focus tree exactly how you left it.</p>
				<p>Saving to server will allow you to save your current focus tree to the server, and access it from any location using the password you will be given once the focus tree has saved.</p>
				<p>Exporting will give you 2 files, if your browser asks if it is okay for this site to download multiple files you will need to accept, otherwise you won't get them both.<br>The files are your national focus tree, and the language file that goes with it. You will need to append the information to the correct language file, e.g. focus_l_english.yml</p>
			</div>
		</div>
	</div>
	<div id="help-box">
		<div class="panel" style="left:265px">
			<div class="panel-head">
			<p id="close-help" class="close-button">X</p>
				<h3>How to use this tool</h3>
			</div>
			<div class="panel-body">
				<p>By pressing the "Add Focus" button at the top of the page you will be able to start creating your focus tree</p>
			<p>Once you have created a focus you will be able to select it when creating a new focus as a prerequisite/mutually exclusive focus</p>
			<p>If you have made a mistake in one of the focuses, simply click the one you want to edit, and the editor will open up with the focus information in it<br>If you select the checkbox for delete mode, you will delete focuses when you click them.</p>
			<hr>
			<h4>How does the available/rewards section work?</h4>
			<p>You will be given a popup box when you click the boxes which will allow you to build these with relative ease. However, the default formatting may not work for all of the things you try.</p>
			</div>
		</div>
	</div>
	<!-- Save to server -->
	<div id="server-box">
		<div class="panel" style="left:265px">
			<div class="panel-head">
			<p id="close-server" class="close-button">X</p>
				<h3>Save to Server</h3>
			</div>
			<div class="panel-body">
				<p>If you would like your focuses to be public, e.g. anyone can use them, check the box below</p>
				<p><input id="public_focuses" type="checkbox"></p>
				<p>Please input which country/countries your focus(es) relate to seperated by comma for multiple countries, e.g ENG,SOV,GER<br>If it is for a generic focus tree leave it blank.</p>
				<p><input id="country_tags"></p>
				<button id="savetoserver">Save To Server</button>
			</div>
		</div>
	</div>
	<div id="import-box">
		<div class="panel" style="left:265px">
			<div class="panel-head">
			<p id="close-import" class="close-button">X</p>
				<h3>Import</h3>
			</div>
			<div class="panel-body">
				<p>Input the password of the focus(es) you want to add into the textbox below, or leave it blank to see all public focuses.</p>
				<input name="import_password" id="import_password">
				<button id="sub-pass">Submit Password</button>
				<div id="show-output">
				</div>
			</div>
		</div>
	</div>
	
	<div id="selectfocusarea" class="secondbox">
		<div class="panel2">
			<div class="panel-head">
			<p id="close-selector" class="close-button">X</p>
				<h3>Select Focus</h3>
			</div>
			<div class="panel-body">
				<p>Want to select multiple? Choose whether you want all to be required, or any to be required</p>
				<p>ALL - <input type="checkbox" id="select-and" style="width:1rem;"> | ANY - <input type="checkbox" id="select-or" style="width:1rem;"> | RESET - <input type="checkbox" id="select-reset" style="width:1rem;"> </p>
				<div id="selectfocus">
				</div>
			</div>
		</div>
	</div>
	<div id="builder" class="secondbox">
		<div class="panel2">
			<div class="panel-head">
			<p id="close-builder" class="close-button">X</p>
				<h3>Available/Bypass/Reward</h3>
			</div>
			<div class="panel-body">
				<p>Search</p>
				<p><input id="searchjson"></p>
				<small>After searching, click the output to see the example, click the example to add it to the builder</small>
				<div id="searchoutput">
				</div>
				<div id="build-output" style="margin-top:2rem;">
					<div id="build-preview" class="current-build-add-location">
					</div>
					<button id="submit-build" build="null">Submit</button>
				</div>
			</div>
		</div>
	</div>
	<div id="tag-box" class="secondbox-extra">
		<div class="panel2-extra">
			<div class="panel-head">
			<p id="close-builder" class="close-button">X</p>
				<h3>TAG Selector</h3>
			</div>
			<div class="panel-body">
				<p>Search</p>
				<p><input id="searchtags"></p>
				<div id="tagsearchoutput">
				</div>
			</div>
		</div>
	</div>
	<div id="state-box" class="secondbox-extra">
		<div class="panel2-extra">
			<div class="panel-head">
			<p id="close-builder" class="close-button">X</p>
				<h3>State Selector</h3>
			</div>
			<div class="panel-body">
				<p>Search</p>
				<p><input id="searchstates"></p>
				<div id="statesearchoutput">
				</div>
			</div>
		</div>
	</div>
	<div id="export-box">
		<div class="panel" style="left:265px">
			<div class="panel-head">
			<p id="close-export" class="close-button">X</p>
				<h3>Export</h3>
			</div>
			<div class="panel-body">
				<p>Focus tree ID (ASCII alphabet characters only - all spaces will be removed)</p>
				<p><input name="focus-tree-id" id="focus-tree-id"></p>
				<p>Language ID (braz_por is Portuguese)</p>
				<select id="tree-language">
					<option id="braz_por">braz_por</option>
					<option id="english">english</option>
					<option id="french">french</option>
					<option id="german">german</option>
					<option id="polish">polish</option>
					<option id="russian">russian</option>
					<option id="spanish">spanish</option>
				</select>
				<p>Country this focus tree is for</p>
				<p><input id="export-country"></p>
				<p id="export-country-results">Start typing to search for country</p>
				<p><button id="export-focus">Export Focus</button></p>
				<p>After you have your files, you will need to resave the language file (the second file to download) with UTF8 BOM encoding as this tool cannot do that. Once resaved, both of these files can be put directly into the correct folders in your mod's folder, and the focus tree should load as expected.</p>
			</div>
		</div>
	</div>
	<div id="help-out-box">
		<div class="panel" style="left:265px">
			<div class="panel-head">
				<p id="close-help-out" class="close-button">X</p>
				<h3>Help Out</h3>
			</div>
			<div class="panel-body">
				<h4>Help with coding</h4>
				<p>Helping with coding could make the tool grow and evolve much faster, if you understand Javascript/jQuery and/or PHP, as well as basic CSS and HTML you may be able help out.</p>
				<p>The code behind this tool is available <a href="https://github.com/jordsta95/hoi4-national-focus-maker/">on GitHub</a></p>
				<h4>Help keep the site running</h4>
				<p>Being web-based, this tool requires a server to run on. And when it comes to websites, I will never put anything on it which I wouldn't want to see myself, which means no adverts.</p>
				<p>$3 a month is all it costs to keep this tool online. I am more than happy to pay this myself, though any donations towards the upkeep are greatly appreciated, and I will find a way to honour anyone who donates.</p>
				<p style="text-align:center;margin-top:2.5rem;"><a class="donate" href="https://www.paypal.me/hoi4modding" target="_blank">Donate</a></p>
			</div>
		</div>
	</div>
	<div id="editing"></div>
   <!--/content-inner-->
<div class="left-content">
	   <div class="mother-grid-inner">
             <!--header start here-->
				<div class="header-main">
					<div style="position:relative">
						<div id="display">
						</div>
					</div>
				</div>
<!--heder end here-->
			
<!-- script-for sticky-nav -->
		<script>
		$(document).ready(function() {
			 var navoffeset=$(".header-main").offset().top;
			 $(window).scroll(function(){
				var scrollpos=$(window).scrollTop(); 
				if(scrollpos >=navoffeset){
					$(".header-main").addClass("fixed");
				}else{
					$(".header-main").removeClass("fixed");
				}
			 });
			 
		});
		</script>
		<!-- /script-for sticky-nav -->
<!--inner block start here-->
<div class="inner-block">

</div>
<!--inner block end here-->
</div>
</div>
  <!--//content-inner-->
			<!--/sidebar-menu-->
				<div class="sidebar-menu">
					<header class="logo1">
						<span class="sidebar-icon"> <span class="fa fa-bars"></span> </span> 
					</header>
						<div style="border-top:1px ridge rgba(255, 255, 255, 0.15)"></div>
                           <div class="menu">
									<ul id="menu" >
										<li id="add-focus"><p><i class="fa fa-plus"></i> <span>Add Focus</span></p></li>
									 	<li class="sub-menu" ><p><i class="fa fa-download" aria-hidden="true"></i><span> Save/Export</span> <span class="fa fa-angle-right" style="float: right"></span></p>
											<ul class="sub-menu" >
										  		<li id="savetostorage" ><p>Save To Storage</p></li>
												<li id="serverpanel" ><p>Save To Server</p></li>
												<li id="export" ><p>Export Files</p></li>
												<li id="export-help"><p>Save/Export Help</p></li>
										  	</ul>
										</li>
										<li id="import" ><p><i class="fa fa-file" aria-hidden="true"></i><span>Import</span></p></li>
										<li id="help"><p><i class="fa fa-question"></i>  <span>Help</span></p></li>
										<li><p><i class="fa fa-trash"></i>  <span>Delete Mode</span></p>
											<ul class="sub-menu" >
										  		<li><p>Enable Delete Mode? <input type="checkbox" id="delete" name="delete" style="width:1rem;"></p></li>
										  	</ul>
										</li>
										<li id="help-out"><p><span>Help Out</span></p></li>
									</ul>
								</div>
							  </div>	
							</div>
						
							<script>
							var toggle = true;
										
							$(".sidebar-icon").click(function() {                
							  if (toggle)
							  {
								$(".page-container").addClass("sidebar-collapsed").removeClass("sidebar-collapsed-back");
								$(".panel").css({"left":"70px"});
							  }
							  else
							  {
								$(".page-container").removeClass("sidebar-collapsed").addClass("sidebar-collapsed-back");
								setTimeout(function() {
								  $(".panel").css({"left":"234px"});
								}, 400);
							  }
											
											toggle = !toggle;
										});
								
							</script>
							<div style="display:none;">
	<textarea id="workplace-lang"></textarea>
	<textarea id="workplace-focus"></textarea>
</div>

</body>
</html>