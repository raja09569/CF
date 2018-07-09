<?php
include 'web/includes/db.php';
?>
<!DOCTYPE html>
<html>
  <head>
  	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" type="image/png" href="web/images/favicon.png"/>
	<title>CamerounFacile</title>
	
    <!-- Bootstrap -->
    <link href="web/dist/css/bootstrap.css" rel="stylesheet" media="screen">
    <link href="web/assets/css/custom.css" rel="stylesheet" media="screen">

    <!-- Carousel -->
	<link href="web/examples/carousel/carousel.css" rel="stylesheet">
    <!-- Fonts -->	
	<link href='http://fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:700,400,300,300italic' rel='stylesheet' type='text/css'>	
	<!-- Font-Awesome -->
    <link rel="stylesheet" type="text/css" href="web/assets/css/font-awesome.css" media="screen" />
    <!--[if lt IE 7]><link rel="stylesheet" type="text/css" href="assets/css/font-awesome-ie7.css" media="screen" /><![endif]-->
	
    <!-- REVOLUTION BANNER CSS SETTINGS -->
    <link rel="stylesheet" type="text/css" href="web/css/fullscreen.css" media="screen" />
	<link rel="stylesheet" type="text/css" href="web/rs-plugin/css/settings.css" media="screen" />

    <!-- Picker UI-->	
	<link rel="stylesheet" href="web/assets/css/jquery-ui.css" />		
	
    <!-- jQuery -->	
    <script src="web/assets/js/jquery-3.1.1.js"></script>
	<!--<script src="assets/js/jquery.v2.0.3.js"></script>-->

	
  </head>
  <body id="top">
    
	<!-- Top wrapper -->			  
	<div class="navbar-wrapper2 navbar-fixed-top">
      <div class="container">
		<div class="navbar mtnav">

			<div class="container offset-3">
			  <!-- Navigation-->
			  <div class="navbar-header">
				<button data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggle" type="button">
				  <span class="icon-bar"></span>
				  <span class="icon-bar"></span>
				  <span class="icon-bar"></span>
				</button>
				<a href="index.php" class="navbar-brand"><img src="web/images/logo.png" alt="Travel Agency Logo" class="logo"/></a>
			  </div>
			  <div class="navbar-collapse collapse">
				<ul class="nav navbar-nav navbar-right">
				  <li class="dropdown active">
					<a href="index.php">
						Home
					</a>
				  </li>
				  <li class="dropdown">
					<a href="web/cab_list_page.php">
						Cab
					</a>
				  </li>
				  <!-- <li><a href="web/hotels.php">Hotels</a></li> -->
				  <li><a href="web/bus.php">Bus</a></li>
				  <li><a href="web/Adv/Ads.php">Post AD</a></li>			  
				  <li><a href="web/aboutus.php">About us</a></li>			  
				  <li><a href="web/contactus.php">Contact us</a></li>	
				  <?php
					if(isset($_SESSION['uname'])){
						?>
						<li class="dropdown">
							<a data-toggle="dropdown" class="dropdown-toggle" href="#">My Account<b class="lightcaret mt-2"></b></a>
							<ul class="dropdown-menu">
								<li><a href="web/Admin/Dashboard/index.php">My Account</a></li>	
								<li><a href="web/Admin/Logout.php">Logout</a></li>
							</ul>
						  </li>
						<?php
					}else if(isset($_SESSION['customer_user_uname'])){
						?>
						<li class="dropdown">
							<a data-toggle="dropdown" class="dropdown-toggle" href="#">My Account<b class="lightcaret mt-2"></b></a>
							<ul class="dropdown-menu">
								<li><a href="web/Customer/user_dashboard.php">My Account</a></li>	
								<li><a href="web/Customer/Logout.php">Logout</a></li>
							</ul>
						  </li>
						<?php
					}else{
						?>
						<li class="dropdown">
							<a data-toggle="dropdown" class="dropdown-toggle" href="#">Login<b class="lightcaret mt-2"></b></a>
							<ul class="dropdown-menu">
								<li><a href="web/Customer/Login.php">My Account</a></li>	
								<li><a href="web/Admin/Login.php">Manager Login</a></li>
								<li><a href="web/Bus-Admin/admin">Bus Agent</a></li>
								<li><a href="web/Bus-Admin/admin">Bus Admin</a></li>
								<!-- <li><a href="Bus-Admin/">Bus User</a></li> -->
							</ul>
						  </li>
						<?php
					}
				  ?>
				  <li class="dropdown">
					<a data-toggle="dropdown" class="dropdown-toggle" href="#">Register now<b class="lightcaret mt-2"></b></a>
					<ul class="dropdown-menu">
					  <!--<li class="dropdown-header">Aligned Right Dropdown</li>-->
					  <li><a href="web/Customer/Register.php">User Register</a></li>	
					  <li><a href="web/Driver/Register.php">Driver Register</a></li>
					  <!--<li><a href="#">Manager Login</a></li>-->
					</ul>
				  </li>		
				</ul>
			  </div>
			  <!-- /Navigation-->			  
			</div>
		
        </div>
      </div>
    </div>
	<!-- /Top wrapper -->	
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCPLC2WagSO9xVsvC29-CZ4xnvpfMFZ2S4&libraries=places"></script>
<div id="dajy" class="fullscreen-container mtslide sliderbg fixed">
<div class="fullscreenbanner">
<ul>
<li data-transition="fade" data-slotamount="1" data-masterspeed="300"> 										
<img src="web/images/slider/rome.jpg" alt=""/>
<div class="tp-caption scrolleffect sft"
data-x="center"
data-y="120"
data-speed="1000"
data-start="800"
data-easing="easeOutExpo">
<div class="sboxpurple textcenter">

<span class="lato size28 slim caps white"></span><br/><br/><br/>
<span class="lato size65 slim caps white">Cameroun</span><br/>
<span class="lato size20 normal caps white"></span><br/><br/>
<span class="lato size48 slim uppercase yellow"></span><br/>
</div>
</div>	
</li>	

<!-- FADE -->
<li data-transition="fade" data-slotamount="1" data-masterspeed="300"> 										

<img src="web/images/slider/paris.jpg" alt=""/>
<div class="tp-caption scrolleffect sft"
data-x="center"
data-y="120"
data-speed="1000"
data-start="800"
data-easing="easeOutExpo"  >
<div class="sboxpurple textcenter">
<span class="lato size28 slim caps white"></span><br/><br/><br/>
<span class="lato size65 slim caps white">Cameroun</span><br/>
<span class="lato size20 normal caps white"></span><br/><br/>
<span class="lato size48 slim uppercase yellow"></span><br/>
</div>
</div>	
</li>	

<!-- FADE -->
<li data-transition="fade" data-slotamount="1" data-masterspeed="300"> 										
<img src="web/images/slider/santorini.jpg" alt=""/>
<div class="tp-caption scrolleffect sft"
data-x="center"
data-y="120"
data-speed="1000"
data-start="800"
data-easing="easeOutExpo">
<div class="sboxpurple textcenter">
<span class="lato size28 slim caps white"></span><br/><br/><br/>
<span class="lato size65 slim caps white">Cameroun</span><br/>
<span class="lato size20 normal caps white"></span><br/><br/>
<span class="lato size48 slim uppercase yellow"></span><br/>
</div>
</div>	
</li>


</ul>
<div class="tp-bannertimer none"></div>
</div>
</div>

<!--
##############################
- ACTIVATE THE BANNER HERE -
##############################
-->
<script type="text/javascript">
var tpj=jQuery;
tpj.noConflict();
tpj(document).ready(function() {
	if (tpj.fn.cssOriginal!=undefined)
	tpj.fn.css = tpj.fn.cssOriginal;
	tpj('.fullscreenbanner').revolution({
		delay:9000,
		startwidth:1170,
		startheight:600,
		onHoverStop:"on",						// Stop Banner Timet at Hover on Slide on/off
		thumbWidth:100,							// Thumb With and Height and Amount (only if navigation Tyope set to thumb !)
		thumbHeight:50,
		thumbAmount:3,
		hideThumbs:0,
		navigationType:"bullet",				// bullet, thumb, none
		navigationArrows:"solo",				// nexttobullets, solo (old name verticalcentered), none
		navigationStyle:false,				// round,square,navbar,round-old,square-old,navbar-old, or any from the list in the docu (choose between 50+ different item), custom
		navigationHAlign:"left",				// Vertical Align top,center,bottom
		navigationVAlign:"bottom",					// Horizontal Align left,center,right
		navigationHOffset:30,
		navigationVOffset:30,
		soloArrowLeftHalign:"left",
		soloArrowLeftValign:"center",
		soloArrowLeftHOffset:20,
		soloArrowLeftVOffset:0,
		soloArrowRightHalign:"right",
		soloArrowRightValign:"center",
		soloArrowRightHOffset:20,
		soloArrowRightVOffset:0,
		touchenabled:"on",						// Enable Swipe Function : on/off
		stopAtSlide:-1,							// Stop Timer if Slide "x" has been Reached. If stopAfterLoops set to 0, then it stops already in the first Loop at slide X which defined. -1 means do not stop at any slide. stopAfterLoops has no sinn in this case.
		stopAfterLoops:-1,						// Stop Timer if All slides has been played "x" times. IT will stop at THe slide which is defined via stopAtSlide:x, if set to -1 slide never stop automatic
		hideCaptionAtLimit:0,					// It Defines if a caption should be shown under a Screen Resolution ( Basod on The Width of Browser)
		hideAllCaptionAtLilmit:0,				// Hide all The Captions if Width of Browser is less then this value
		hideSliderAtLimit:0,					// Hide the whole slider, and stop also functions if Width of Browser is less than this value
		fullWidth:"on",							// Same time only Enable FullScreen of FullWidth !!
		fullScreen:"off",						// Same time only Enable FullScreen of FullWidth !!
		shadow:0								//0 = no Shadow, 1,2,3 = 3 Different Art of Shadows -  (No Shadow in Fullwidth Version !)
	});
});



function initialize(){
	var input = document.getElementById('pick_from');
	var autocomplete = new google.maps.places.Autocomplete(input);
	var input2 = document.getElementById('drop_off');
	var autocomplete = new google.maps.places.Autocomplete(input2);
}
google.maps.event.addDomListener(window, 'load', initialize);

function show_date(rd){
	if(rd.value == "later"){
		document.getElementById('date_div').style.display = "block";
	}else{
		document.getElementById('date_div').style.display = "none";
	}
}

function submit_search(){
	var pick_place = document.getElementById('pick_from').value;
	var drop_place = document.getElementById('drop_off').value;
	var pick_now = document.getElementById('cab_now');
	var pick_later = document.getElementById('cab_later');	
	if(pick_place == ""){
		alert("Please enter pickup place");
	}/*else if(drop_place == ""){
		alert("Please enter drop place");
	}*/else if(pick_now.checked == false && pick_later.checked == false){
		alert("When you want to Go");
	}else{
		if(pick_now.checked == true){
			var pickupType = "Now";
			var url = "web/cab_list_page.php?pick="+pick_place+"&drop="+drop_place+"&pickType="+pickupType;
			url = encodeURI(url);
			window.location.href = url;	
		}else if(pick_later.checked == true){
			var pick_date = document.getElementById('datepicker6').value;
			var pick_time = document.getElementById('pick_time').value;
			if(pick_date == ""){
				alert("Select date!");
			}else if(pick_time == "Select Time"){
				alert("Select time!");
			}else{
				pick_date = pick_date.split("/");
				pick_date = pick_date[2]+"-"+pick_date[0]+"-"+pick_date[1];
				var drop_date = pick_date+" "+convertTo24Hour(pick_time);
				pick_time = new Date();
				var hours = pick_time.getHours() > 12 ? pick_time.getHours() - 12 : pick_time.getHours();
				var am_pm = pick_time.getHours() >= 12 ? "PM" : "AM";
				hours = hours < 10 ? "0" + hours : hours;
				var minutes = pick_time.getMinutes() < 10 ? "0" + pick_time.getMinutes() : pick_time.getMinutes();
				var seconds = pick_time.getSeconds() < 10 ? "0" + pick_time.getSeconds() : pick_time.getSeconds();
				var time = hours + ":" + minutes+ " " + am_pm;
				if((pick_time.getMonth()+1).toString().length == 1){
					pick_time = pick_time.getFullYear()+"-0"+(pick_time.getMonth()+1)+"-"+pick_time.getDate();		
				}else{
					pick_time = pick_time.getFullYear()+"-"+(pick_time.getMonth()+1)+"-"+pick_time.getDate();			
				}
				pick_time = pick_time+" "+time;
				var dateOne = new Date(drop_date);
				dateOne = dateOne.getTime();
				var dateTwo = new Date(pick_time);
				dateTwo = dateTwo.getTime();
				//alert("Date one "+dateOne+"& Date two is "+dateTwo);
				if (dateOne < dateTwo) {
					alert("Please select Greater current date & time");
				}else {
					var pickType = "Later";
					drop_date = encodeURI(drop_date);
					var url = "web/cab_list_page.php?pick="+pick_place+"&drop="+drop_place+"&pickType="+pickType+"&pick_date="+drop_date;
					url = encodeURI(url);
					window.location.href = url;	
				}
			}			
		}
	}
}

function convertTo24Hour(time12h) {
  const [time, modifier] = time12h.split(' ');
  let [hours, minutes] = time.split(':');
  if (hours === '12') {
    hours = '00';
  }
  if (modifier === 'PM') {
    hours = parseInt(hours, 10) + 12;
  }
  return hours + ':' + minutes;
}
</script>

<!-- WRAP -->
<div class="wrap cstyle03">

<div class="container mt-200 z-index100">		
<div class="row">
<div class="col-md-4">
<div class="bs-example bs-example-tabs cstyle04">

<ul class="nav nav-tabs" id="myTab">
<li onclick="mySelectUpdate()" class="active"><a data-toggle="tab" href="#car"><span class="car"></span> Cab</a></li>
<!-- <li onclick="mySelectUpdate()" class=""><a data-toggle="tab" href="#hotel"><span class="hotel"></span>Hotel</a></li> -->
<li onclick="mySelectUpdate()" class=""><a data-toggle="tab" href="#air"><span class="bus"></span>Bus</a></li>
<li onclick="mySelectUpdate()" class=""><a data-toggle="tab" href="#vacations"><span class="suitcase"></span>Advt</a></li>
</ul>
<!--<form name="search_form" method="post" action="move_search.php" >-->
<div class="tab-content" id="myTabContent">
<div id="air" class="tab-pane fade">

<div class="w50percent">
<div class="wh90percent textleft">
<span class="opensans size13"><b>Flying from</b></span>
<input type="text" class="form-control" placeholder="City or airport" required>
</div>
</div>

<div class="w50percentlast">
<div class="wh90percent textleft right">
<span class="opensans size13"><b>To</b></span>
<input type="text" class="form-control" placeholder="City or airport" required>
</div>
</div>


<div class="clearfix"></div><br/>

<div class="w50percent">
<div class="wh90percent textleft">
<span class="opensans size13"><b>Departing</b></span>
<input type="text" class="form-control mySelectCalendar" id="datepicker3" placeholder="mm/dd/yyyy" required/>
</div>
</div>

<div class="w50percentlast">
<div class="wh90percent textleft right">
<span class="opensans size13"><b>Returning</b></span>
<input type="text" class="form-control mySelectCalendar" id="datepicker4" placeholder="mm/dd/yyyy" required/>
</div>
</div>

<div class="clearfix"></div>

<div class="room1 margtop15">
<div class="w50percent">
<div class="wh90percent textleft">
<span class="opensans size13"><b>Adult</b></span>
<select class="form-control mySelectBoxClass" required>
<option>1</option>
<option selected>2</option>
<option>3</option>
<option>4</option>
<option>5</option>
</select>
</div>
</div>

<div class="w50percentlast">	
<div class="wh90percent textleft right">
<span class="opensans size13"><b>Child</b></span>
<select class="form-control mySelectBoxClass" required>
<option>0</option>
<option selected>1</option>
<option>2</option>
<option>3</option>
<option>4</option>
<option>5</option>
</select>
</div>
</div>
</div>

</div>
<!--End of 1st tab -->

<div id="hotel" class="tab-pane fade">

<span class="opensans size18">Where do you want to go?</span>
<input type="text" class="form-control" placeholder="Greece" required>

<br/>

<div class="w50percent">
<div class="wh90percent textleft">
<span class="opensans size13"><b>Check in date</b></span>
<input type="text" class="form-control mySelectCalendar" id="datepicker" placeholder="mm/dd/yyyy" required/>
</div>
</div>

<div class="w50percentlast">
<div class="wh90percent textleft right">
<span class="opensans size13"><b>Check in date</b></span>
<input type="text" class="form-control mySelectCalendar" id="datepicker2" placeholder="mm/dd/yyyy" required/>
</div>
</div>

<div class="clearfix"></div>

<div class="room1 margtop15">
<div class="w50percent">
<div class="wh90percent textleft">
<span class="opensans size13"><b>ROOM 1</b></span><br/>

<div class="addroom1 block"><a href="#room2" onclick="addroom2()" class="grey">+ Add room</a></div>
</div>
</div>

<div class="w50percentlast">	
<div class="wh90percent textleft right">
<div class="w50percent">
<div class="wh90percent textleft left">
<span class="opensans size13"><b>Adult</b></span>
<select class="form-control mySelectBoxClass" required>
<option>1</option>
<option selected>2</option>
<option>3</option>
<option>4</option>
<option>5</option>
</select>
</div>
</div>							
<div class="w50percentlast">
<div class="wh90percent textleft right">
<span class="opensans size13"><b>Child</b></span>
<select class="form-control mySelectBoxClass" required>
<option>0</option>
<option selected>1</option>
<option>2</option>
<option>3</option>
<option>4</option>
<option>5</option>
</select>
</div>
</div>
</div>
</div>
</div>

<div class="room2 none">
<div class="clearfix"></div><div class="line1"></div>
<div class="w50percent">
<div class="wh90percent textleft">
<span class="opensans size13"><b>ROOM 2</b></span><br/>
<div class="addroom2 block grey"><a href="#" onclick="addroom3()" class="grey">+ Add room</a> | <a href="#" onclick="removeroom2()" class="orange"><img src="web/images/delete.png" alt="delete"/></a></div>
</div>
</div>

<div class="w50percentlast">	
<div class="wh90percent textleft right">
<div class="w50percent">
<div class="wh90percent textleft left">
<span class="opensans size13"><b>Adult</b></span>
<select class="form-control mySelectBoxClass" required>
<option>1</option>
<option>2</option>
<option selected>3</option>
<option>4</option>
<option>5</option>
</select>
</div>
</div>							
<div class="w50percentlast">
<div class="wh90percent textleft right">
<span class="opensans size13"><b>Child</b></span>
<select class="form-control mySelectBoxClass" required>
<option selected>0</option>
<option>1</option>
<option>2</option>
<option>3</option>
<option>4</option>
<option>5</option>
</select>
</div>
</div>
</div>
</div>
</div>		

<div class="room3 none">
<div class="clearfix"></div><div class="line1"></div>
<div class="w50percent">
<div class="wh90percent textleft">
<span class="opensans size13"><b>ROOM 3</b></span><br/>
<div class="addroom3 block grey"><a href="#" onclick="addroom3()" class="grey">+ Add room</a> | <a href="#" onclick="removeroom3()" class="orange"><img src="web/images/delete.png" alt="delete"/></a></div>
</div>
</div>

<div class="w50percentlast">	
<div class="wh90percent textleft right">
<div class="w50percent">
<div class="wh90percent textleft left">
<span class="opensans size13"><b>Adult</b></span>
<select class="form-control mySelectBoxClass" required>
<option selected>1</option>
<option>2</option>
<option>3</option>
<option>4</option>
<option>5</option>
</select>
</div>
</div>							
<div class="w50percentlast">
<div class="wh90percent textleft right">
<span class="opensans size13"><b>Child</b></span>
<select class="form-control mySelectBoxClass" required>
<option selected>0</option>
<option>1</option>
<option>2</option>
<option>3</option>
<option>4</option>
<option>5</option>
</select>
</div>
</div>
</div>
</div>
</div>	


</div>


<link rel="stylesheet" href="web/assets/css/jquery-ui2.css">
<!--<script src="assets/js/jquery-1.12.4.js"></script>-->
<script src="web/assets/js/jquery-ui2.js"></script>

<!--End of 2nd tab -->
<div id="car" class="tab-pane fade active in">

<div class="">
<div class="wh90percent textleft">
<span class="opensans size13"><b>Pick up place</b></span>
<input type="text" class="form-control" placeholder="Location,address" name="pick_from" id="pick_from" required>
</div>
</div>

<div class="">
<div class="wh90percent textleft">
<span class="opensans size13"><b>Drop place</b></span>
<input type="text" class="form-control" placeholder="Location,address" name="drop_off" id="drop_off" required>
</div>
</div>
<div class="clearfix"></div>
<div class="w50percent" style="padding:5px;">
<div class="wh90percent textleft">
<input type="radio" checked name="optionsRadios12" id="cab_now" onclick="show_date(this);" value="now">
Now 
</div>
</div>
<div class="w50percentlast" style="padding:5px;">
<div class="wh90percent textleft right">
<input type="radio" name="optionsRadios12" id="cab_later" onclick="show_date(this);" value="later">
Later
</div>
</div>
<div class="clearfix"></div>
<div class="room1" id="date_div" style="display:none;" >
<div class="w50percent" style="padding:5px;">
<div class="wh90percent textleft">
<span class="opensans size13">Pickup Date</span>
<input type="text" class="form-control mySelectCalendar" id="datepicker6" placeholder="mm/dd/yyyy" name="pick_date"/>
</div>
</div>

<div class="w50percentlast" style="padding:5px;">	
<div class="wh90percent textleft right">
<span class="opensans size13">Hour</span>
<select class="form-control mySelectBoxClass" name="pick_time" id="pick_time">
<option>Select Time</option>
<option>12:00 AM</option>
<option>12:30 AM</option>
<option>01:00 AM</option>
<option>01:30 AM</option>
<option>02:00 AM</option>
<option>02:30 AM</option>
<option>03:00 AM</option>
<option>03:30 AM</option>
<option>04:00 AM</option>
<option>04:30 AM</option>
<option>05:00 AM</option>
<option>05:30 AM</option>
<option>06:00 AM</option>
<option>06:30 AM</option>
<option>07:00 AM</option>
<option>07:30 AM</option>
<option>08:00 AM</option>
<option>08:30 AM</option>
<option>09:00 AM</option>
<option>09:30 AM</option>
<option>10:00 AM</option>
<option>10:30 AM</option>
<option>11:00 AM</option>
<option>11:30 AM</option>
<option>12:00 PM</option>
<option>12:30 PM</option>								  
<option>01:00 PM</option>
<option>01:30 PM</option>
<option>02:00 PM</option>
<option>02:30 PM</option>
<option>03:00 PM</option>
<option>03:30 PM</option>
<option>04:00 PM</option>
<option>04:30 PM</option>
<option>05:00 PM</option>
<option>05:30 PM</option>
<option>06:00 PM</option>
<option>06:30 PM</option>
<option>07:00 PM</option>
<option>07:30 PM</option>
<option>08:00 PM</option>
<option>08:30 PM</option>
<option>09:00 PM</option>
<option>09:30 PM</option>
<option>10:00 PM</option>
<option>10:30 PM</option>
<option>11:00 PM</option>
<option>11:30 PM</option>		
</select>
</div>
</div>
</div>

<div class="clearfix"></div>
</div>
<!--End of 3rd tab -->

<div id="vacations" class="tab-pane fade">

<div class="w50percent">
<div class="wh90percent textleft">
<span class="opensans size13"><b>Flying from</b></span>
<input type="text" class="form-control" placeholder="City or airport" required>
</div>
</div>

<div class="w50percentlast">
<div class="wh90percent textleft right">
<span class="opensans size13"><b>To</b></span>
<input type="text" class="form-control" placeholder="City or airport" required>
</div>
</div>

<div class="clearfix"></div><br/>

<div class="w50percent">
<div class="wh90percent textleft">
<span class="opensans size13"><b>Check in date</b></span>
<input type="text" class="form-control mySelectCalendar" id="datepicker7" placeholder="mm/dd/yyyy" required/>
</div>
</div>

<div class="w50percentlast">
<div class="wh90percent textleft right">
<span class="opensans size13"><b>Check in date</b></span>
<input type="text" class="form-control mySelectCalendar" id="datepicker8" placeholder="mm/dd/yyyy" required/>
</div>
</div>

<div class="clearfix"></div>

<div class="room1 margtop15">
<div class="w50percent">
<div class="wh90percent textleft">
<span class="opensans size13"><b>ROOM 1</b></span><br/>

<div class="addroom1 block"><a href="#room2" onclick="addroom2()" class="grey">+ Add room</a></div>
</div>
</div>

<div class="w50percentlast">	
<div class="wh90percent textleft right">
<div class="w50percent">
<div class="wh90percent textleft left">
<span class="opensans size13"><b>Adult</b></span>
<select class="form-control mySelectBoxClass" required>
<option>1</option>
<option selected>2</option>
<option>3</option>
<option>4</option>
<option>5</option>
</select>
</div>
</div>							
<div class="w50percentlast">
<div class="wh90percent textleft right">
<span class="opensans size13"><b>Child</b></span>
<select class="form-control mySelectBoxClass" required>
<option>0</option>
<option selected>1</option>
<option>2</option>
<option>3</option>
<option>4</option>
<option>5</option>
</select>
</div>
</div>
</div>
</div>
</div>

<div class="room2 none">
<div class="clearfix"></div><div class="line1"></div>
<div class="w50percent">
<div class="wh90percent textleft">
<span class="opensans size13"><b>ROOM 2</b></span><br/>
<div class="addroom2 block grey">
	<a href="#" onclick="addroom3()" class="grey">
		+ Add room
	</a> | <a href="#" onclick="removeroom2()" class="orange"><img src="web/images/delete.png" alt="delete"/></a></div>
</div>
</div>

<div class="w50percentlast">	
<div class="wh90percent textleft right">
<div class="w50percent">
<div class="wh90percent textleft left">
<span class="opensans size13"><b>Adult</b></span>
<select class="form-control mySelectBoxClass" required>
<option>1</option>
<option>2</option>
<option selected>3</option>
<option>4</option>
<option>5</option>
</select>
</div>
</div>							
<div class="w50percentlast">
<div class="wh90percent textleft right">
<span class="opensans size13"><b>Child</b></span>
<select class="form-control mySelectBoxClass" required>
<option selected>0</option>
<option>1</option>
<option>2</option>
<option>3</option>
<option>4</option>
<option>5</option>
</select>
</div>
</div>
</div>
</div>
</div>		

<div class="room3 none">
<div class="clearfix"></div><div class="line1"></div>
<div class="w50percent">
<div class="wh90percent textleft">
<span class="opensans size13"><b>ROOM 3</b></span><br/>
<div class="addroom3 block grey"><a href="#" onclick="addroom3()" class="grey">+ Add room</a> | <a href="#" onclick="removeroom3()" class="orange"><img src="web/images/delete.png" alt="delete"/></a></div>
</div>
</div>

<div class="w50percentlast">	
<div class="wh90percent textleft right">
<div class="w50percent">
<div class="wh90percent textleft left">
<span class="opensans size13"><b>Adult</b></span>
<select class="form-control mySelectBoxClass" required>
<option selected>1</option>
<option>2</option>
<option>3</option>
<option>4</option>
<option>5</option>
</select>
</div>
</div>							
<div class="w50percentlast">
<div class="wh90percent textleft right">
<span class="opensans size13"><b>Child</b></span>
<select class="form-control mySelectBoxClass" required>
<option selected>0</option>
<option>1</option>
<option>2</option>
<option>3</option>
<option>4</option>
<option>5</option>
</select>
</div>
</div>
</div>
</div>
</div>	

</div>
<!--End of 4th tab -->
</div>

<div class="searchbg">
<!--<form action="list4.html">-->
<button type="submit" name="btn_search" onclick="submit_search();" class="btn-search">
Search
</button>
<!--</form>-->
</div>
<!--</form>-->
</div>
</div>
<div class="col-md-4">
<div class="shadow cstyle05">
<div class="fwi one">
	<img src="web/images/rome.jpg" alt="" />
	<div class="mhover none">
		<span class="icon">
			<a href="list4.html">
				<img src="web/images/spacer.png" alt=""/>
			</a>
		</span>
	</div>
</div>
<div class="ctitle">Douala<a href="list4.html"><img src="web/images/spacer.png" alt=""/></a>
</div>
</div>
</div>
<div class="col-md-4">
<div class="shadow cstyle05">
<div class="fwi one">
	<img src="web/images/surfer.jpg" alt="" />
	<div class="mhover none">
		<span class="icon">
			<a href="list3.html">
				<img src="web/images/spacer.png" alt=""/>
			</a>
		</span>
	</div>
</div>
<div class="ctitle">
	Bamenda
	<a href="list3.html">
		<img src="web/images/spacer.png" alt=""/>
	</a>
</div>
</div>			
</div>
</div>
</div>
<!-- FOOTER -->

<div class="footerbg sfix">
<div class="container">		
<footer>
<div class="footer">
<a href="#" class="social1"><img src="web/images/icon-facebook.png" alt=""/></a>
<a href="#" class="social2"><img src="web/images/icon-twitter.png" alt=""/></a>
<a href="#" class="social3"><img src="web/images/icon-gplus.png" alt=""/></a>
<a href="#" class="social4"><img src="web/images/icon-youtube.png" alt=""/></a>
<br/><br/>
Copyright &copy; 2013 <a href="#">CamerounFacile</a> All rights reserved. <a href="http://crescom.in/">Powered by CRESCOM</a>
<br/><br/>
<a href="#top" id="gotop2" class="gotop"><img src="web/images/spacer.png" alt=""/></a>
</div>
</footer>
</div>	
</div>





</div>
<!-- END OF WRAP -->




<!-- Javascript -->

<!-- This page JS -->
<script src="web/assets/js/js-index.js"></script>	

<!-- Custom functions -->
<script src="web/assets/js/functions.js"></script>

<!-- Picker UI-->	
<script src="web/assets/js/jquery-ui.js"></script>		

<!-- Easing -->
<script src="web/assets/js/jquery.easing.js"></script>

<!-- jQuery KenBurn Slider  -->
<script type="text/javascript" src="web/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>

<!-- Nicescroll  -->	
<script src="web/assets/js/jquery.nicescroll.min.js"></script>

<!-- CarouFredSel -->
<script src="web/assets/js/jquery.carouFredSel-6.2.1-packed.js"></script>
<script src="web/assets/js/helper-plugins/jquery.touchSwipe.min.js"></script>
<script type="text/javascript" src="web/assets/js/helper-plugins/jquery.mousewheel.min.js"></script>
<script type="text/javascript" src="web/assets/js/helper-plugins/jquery.transit.min.js"></script>
<script type="text/javascript" src="web/assets/js/helper-plugins/jquery.ba-throttle-debounce.min.js"></script>

<!-- Custom Select -->
<script type='text/javascript' src='web/assets/js/jquery.customSelect.js'></script>	

<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="web/dist/js/bootstrap.min.js"></script>
</body>
</html>