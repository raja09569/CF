<?php
    include '../Includes/db.php';
    include 'Includes/header.php';
    if(!isset($_SESSION['customer_user_uname'])){
        ?>
        <script>window.location.href = "Login.php"</script>
        <?php
    }else{
        $custID = $_SESSION['customer_user_ID'];
    }
?>
<style>
    #write_review{
        opacity:0.92;
        position: absolute;
        top: 15%;
        left: 0%;
        padding: 5%;
        width: 90%; 
        background: #000;
        display: none;
    }
</style>
<script src="../assets/js/jquery.v2.0.3.js"></script>
<script src="js/user_dashboard.js"></script>
<div class="container breadcrub">
    <div>
        <a class="homebtn left" href="index.php"></a>
        <div class="left">
            <ul class="bcrumbs">
                <li>/</li>
                <li><a href="user_dashboard.php" class="active">User Admin</a></li>					
</ul>				
</div>
<a class="backbtn right" href="../index.php"></a>
</div>
<div class="clearfix"></div>
<div class="brlines"></div>
</div>	

<!-- CONTENT -->
<div class="container">


<div class="container mt25 offset-0">


<!-- CONTENT -->
<div class="col-md-12 pagecontainer2 offset-0">

<!-- LEFT MENU -->
<div class="col-md-1 offset-0">
<!-- Nav tabs -->
<ul class="nav profile-tabs">
<li>
<a href="#" data-toggle="tab" onclick="mySelectUpdate()">
<span class="dashboard-icon"></span>						  
Dashboard
</a>
</li>
<li class="active">
<a href="#profile" data-toggle="tab">
<span class="profile-icon"></span>
Profile
</a>
</li>
<li>
<a href="#bookings" data-toggle="tab" onclick="mySelectUpdate()">
<span class="bookings-icon"></span>						  
Cab Rides
</a>
</li>
<li>
<a href="#reviews" data-toggle="tab" onclick="mySelectUpdate()">
<span class="wishlist-icon"></span>							  
Reviews
</a>
</li>
<li>
<a href="#password" data-toggle="tab" onclick="mySelectUpdate()">
<span class="password-icon"></span>							  
Change password
</a>
</li>
</ul>
<div class="clearfix"></div>
</div>
<!-- LEFT MENU -->

<!-- RIGHT CPNTENT -->
<div class="col-md-11 offset-0">
<!-- Tab panes from left menu -->
<div class="tab-content5">

<!-- TAB 1 -->
<div class="tab-pane padding40 active" id="profile">

<?php
$query = mysqli_query($conn, "select * from tbl_customers where cust_id='".$custID."'");
$row = mysqli_fetch_assoc($query);
$id = $row['cust_id'];
$fname = $row['first_name'];
$lname = $row['last_name'];
$name = $fname.$lname;
$photo = $row['picture'];
$number = $row['mobile_number'];
$emailid = $row['email_id'];
$address = $row['address'];

$query2 = mysqli_query($conn, "select count(s_no) as count from tbl_customer_trips where cust_id='".$id."'");
$row2 = mysqli_fetch_assoc($query2);
$count = $row2['count'];

?>

<!-- Admin top -->
<div class="col-md-4 offset-0">
<?php 
if($photo != ""){
?>
<img src="<?php echo "../".$photo; ?>" alt="<?php echo $name; ?>" width="40" class="left margright20"/>
<?php
}else{
?>
<img src="../images/dash/no-avatar.jpg" alt="<?php echo $name; ?>" class="left margright20"/>
<?php
}
?>
<p class="size12 grey margtop10">
Welcome <span class="lred"><?php echo $name; ?></span><br/>
<a href="#" class="lblue">Change picture</a>
</p>
<div class="clearfix"></div>
</div>
<div class="col-md-4">
</div>
<div class="col-md-4 offset-0">
<table class="table table-bordered  mt-10">
<tr class="grey opensans">
<td class="center"><span class="size30 slim lh4"><?php echo $count; ?></span><br/><span class="size12">Trips</span></td>
<td class="center"><span class="size30 slim lh4">5</span><br/><span class="size12">Places</span></td>
<td class="center"><span class="size30 slim lh4">14</span><br/><span class="size12">Days away</span></td>
<td class="center"><span class="size30 slim lh4">3</span><br/><span class="size12">Countries</span></td>
</tr>
</table>
</div>
<!-- End of Admin top -->
<span class="size16 bold">Personal details</span>
<div class="line2"></div>


<!-- COL 1 -->
<div class="col-md-12 offset-0">
<br/>
Name*:
<input type="text" class="form-control" rel="popover" id="name" value="<?php echo $name; ?>" data-content="This field is mandatory" data-original-title="Here you can edit your name">
<br/>
E-mail*:
<input type="text" class="form-control" placeholder="office@email.com" value="<?php echo $emailid; ?>" id="email" data-content="This field is mandatory" data-original-title="Edit your email address">
<br/>
Phone number:
<input type="text" class="form-control" id="phoneno" value="<?php echo $number; ?>" placeholder="">	
<br/>
<br/>						
<span class="size16 bold">Your address</span>
<div class="line2"></div>

<br/>
Address*:
<input type="text" class="form-control" id="adrs" value="<?php echo $address; ?>" placeholder="">							
<br/>

<button type="submit" class="bluebtn margtop20" onclick="UpdateUserDtls('<?php echo $custID; ?>');" >Update</button>	
</div>
<!-- END OF COL 1 -->

<div class="clearfix"></div><br/><br/><br/>
</div>
<!-- END OF TAB 1 -->		



<!-- TAB 2 -->					  
<div class="tab-pane" id="bookings">
<div class="padding40">
<br/>

<table class="table table-bordered  mt-10">
<tr class="grey opensans">
<td class="center"><span class="size30 slim lh4 dark"><?php echo $count; ?></span><br/><span class="size12">Trips</span></td>
<td class="center"><span class="size30 slim lh4 dark">20</span><br/><span class="size12">Places</span></td>
<td class="center"><span class="size30 slim lh4 dark">14</span><br/><span class="size12">Days away</span></td>
<td class="center"><span class="size30 slim lh4 dark">5</span><br/><span class="size12">Countries</span></td>
</tr>
</table>

<br/>
<br/>

<!--<span class="dark size18">Your latest bookings</span>-->
<span class="dark size18">Your latest Cab Rides</span>
<script>
    function showReview(args) {
        //code
        //alert(args);
        $("#ride_id").attr("value", args);
        $("#write_review").css("display", "block");
    }
    function Close() {
        //code
        $('#write_review').css("display", "none");
    }
</script>

<?php
if(isset($_POST['write_comment'])){
$rideid = $_POST['rideid'];
$comment = $_POST['review'];
$custID = $_SESSION['customer_user_ID'];
//echo $rideid;
$query = mysqli_query($conn, "insert into tbl_driver_comments (driver_id, cust_id, comment, comment_date) value ('".$rideid."','".$custID."','".$comment."',now())");
if($query){
//echo "submitted";
}else{
//echo "something wen wrong! try again.";
}
}
?>

<?php
$query3 = mysqli_query($conn, "select * from tbl_customer_trips where cust_id='".$id."'");
while($row3 = mysqli_fetch_assoc($query3)){
$driverid = $row3['driver_id'];
$id = $row3['s_no'];
$query4 = mysqli_query($conn, "select * from tbl_drivers where driver_id='".$driverid."'");
$num4 = mysqli_num_rows($query4);
if($num4 != 0){
$row4 = mysqli_fetch_assoc($query4);
$name = $row4['name'];
$cabtype = $row4['vehicle_category'];
$vehicle_photo = $row4['vehicle_photo'];
$vehicle_photo = "../".$vehicle_photo;
$query5 = mysqli_query($conn, "select * from tbl_cab_categories where category_id='".$cabtype."'");
$num5 = mysqli_num_rows($query5);
$row5 = mysqli_fetch_assoc($query5);
$cabname = $row5['name'];
$cabno = $row4['vehicle_no'];
$rateperhour = $row5['per_km_without_ac'];
}
$startplace = $row3['start_place'];
$startdt = $row3['start_date'];
$starttm = $row3['start_time'];
$endplace = $row3['end_place'];
$endtm = $row3['end_time'];
$enddt = $row3['end_date'];
$totaldistance= $row3['total_distance'];
$totalfee = $row3['total_fee'];
$status = $row3['status'];

?>
<div class="line4"></div>
<br/>
<span class="grey" style="float:left;"><?php echo $status; ?></span><br>
<div style="clear:both;"></div>
<span class="grey" style="float:right;"><?php echo $startdt." ".$starttm; ?></span><br>
<div class="col-md-4 offset-0">
<a href="#"><img alt="<?php echo $cabname; ?>" class="left mr20" width="60" src="<?php echo $vehicle_photo; ?>"></a>
<a class="dark" href="#"><b><?php echo $name; ?></b></a> (<?php echo $cabno; ?>)<br/>
<!--<span class="dark size12"><?php echo $startplace; ?> - <?php echo $endplace; ?></span><br>-->
<span class="opensans green bold size14">From: <?php echo $startplace; ?></span> <span class="grey">To: <?php echo $endplace; ?></span><br>
<span class="opensans size14">Total Distance: <?php echo $totaldistance; ?></span> | <span class="grey"><?php echo $rateperhour." /KM"; ?></span><br>
<!--<img alt="" src="images/filter-rating-5.png"><br/>-->
<?php echo $cabname; ?>
</div>
<!--<div class="col-md-7">
<span class="grey">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam faucibus, quam vel interdum lacinia, lacus justo rutrum lorem, in fermentum ligula est a diam. Nam aliquet arcu est, a malesuada odio laoreet non.</span>
</div>-->
<div class="col-md-1 offset-0" style="float:right;width:15%;text-align:right;">
<br/>
<span class="opensans green bold size18">Fcfa <?php echo $totalfee; ?></span>
<br/><br/>
<span onclick="showReview(<?php echo $driverid; ?>)" class="opensans size14">Write review</span>
</div>
<div style="clear:both;"></div>
<div class="clearfix"></div>


<?php
}
?>

<div id="write_review" style="margin:5%;">
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" >
        <label style="color: #fff;">You can write your comment below *</label>
        <input type="hidden" name="rideid" id="ride_id"/>
        <textarea name="review" class="form-control" style="width:100%;height:100px;border:1px solid #eee;" placeholder="How you felt?" required></textarea>
        <br/>
        <button class="form-control" name="cancel_comment" style="width: 20%;float: right;" onclick="Close();">Cancel</button>
        <button class="form-control" name="write_comment" style="width: 20%;margin-right:10%;float: right;">Submit</button>
    </form>
</div>					

<div class="line4"></div>
<ul class="pagination right paddingbtm20">
<li class="disabled"><a href="#">«</a></li>
<li><a href="#">1</a></li>
<li><a href="#">2</a></li>
<li><a href="#">3</a></li>
<li><a href="#">»</a></li>
</ul>

</div>
</div>
<!-- END OF TAB 2 -->	

<!-- TAB 3 -->					  
<div class="tab-pane" id="reviews">
<div class="padding40" id="loadReview">
<script>
var custID = "<?php echo $_SESSION['customer_user_ID']; ?>";
LoadReviews(custID);
</script>
</div>
</div>
<!-- END OF TAB 3 -->	

<!-- TAB 4 -->					  
<div class="tab-pane" id="settings">
<div class="padding40 dark">


<span class="dark size18">Settings</span>
<div class="line4"></div>

<span class="dark size14 bold">Notifications</span><br/>
Change the way you recieve notifications.

<div class="checkbox dark">
<label>
<input type="checkbox" checked> Make my profile private
</label>
</div>
<div class="checkbox dark">
<label>
<input type="checkbox"> Send an email when someone replyes to one of your comments.
</label>
</div>

<br/>
<br/>

<span class="dark size14 bold">Who can contact me?</span><br/>
<select class="form-control mySelectBoxClass hasCustomSelect cpwidth">
<option value="">Everyone</option>
<option value="">No one</option>
<option value="">Friends</option>
</select>

<br/>
<br/>
<br/>

<span class="dark size14 bold">Payments</span><br/>
<div class="checkbox dark">
<label>
<input type="checkbox" checked> Auto Payment
</label>
</div>

<br/>
<br/>
				
<span class="dark size14 bold">Credit Card Details</span>
<div class="line4"></div>							
<br/>
Card Type<br/>
<select class="form-control mySelectBoxClass hasCustomSelect cpwidth">
<option value="">Visa</option>
<option value="">MasterCard</option>
<option value="">Discover</option>
<option value="">American Express</option>
</select>
<br/>
<br/>
Card Number<br/>
<input type="text" class="form-control" placeholder="XXXX-XXXX-XXXX-XXX">
<br/>
Expiry date<br/>
<select class="form-control mySelectBoxClass hasCustomSelect cpwidth2">
<option value="">01</option>
<option value="">02</option>
<option value="">03</option>
<option value="">04</option>
<option value="">05</option>
<option value="">06</option>
<option value="">07</option>
<option value="">08</option>
<option value="">09</option>
<option value="">10</option>
<option value="">11</option>
<option value="">12</option>
</select>
/
<select class="form-control mySelectBoxClass hasCustomSelect cpwidth2">
<option value="">2013</option>
<option value="">2014</option>
<option value="">2015</option>
<option value="">2016</option>
<option value="">2017</option>
<option value="">2018</option>

</select>

<br/>
CVV<br/>
<input type="text" class="form-control cpwidth2" placeholder="">
<br/>
<br/>

<button type="submit" class="btn-search5">Save changes</button>




</div>
</div>
<!-- END OF TAB 4 -->	

<!-- TAB 5 -->					  
<div class="tab-pane" id="history">
<div class="padding40">

<span class="dark size18">History</span>
<div class="line4"></div>

<br/>

<div class="col-md-3 bold">Date</div>
<div class="col-md-3 bold">Destination</div>
<div class="col-md-3 bold">Service</div>
<div class="col-md-3 bold textright">Action</div>
<div class="clearfix"></div>
<div class="line4"></div>

<div class="col-md-3">01.05.09</div>
<div class="col-md-3">Grece - Zakynthos</div>
<div class="col-md-3">Hotel</div>
<div class="col-md-3 textright"><button type="submit" class="btn-search5"><span class="glyphicon glyphicon-plus"></span></button></div>
<div class="clearfix"></div>

<div class="line4"></div>
<div class="col-md-3">17.07.10</div>
<div class="col-md-3">Spain - Malaga</div>
<div class="col-md-3">Flight Tickets</div>
<div class="col-md-3 textright"><button type="submit" class="btn-search5"><span class="glyphicon glyphicon-plus"></span></button></div>
<div class="clearfix"></div>

<div class="line4"></div>
<div class="col-md-3">01.05.09</div>
<div class="col-md-3">Bulgary - Sunny Beach</div>
<div class="col-md-3">Flight Tickets</div>
<div class="col-md-3 textright"><button type="submit" class="btn-search5"><span class="glyphicon glyphicon-plus"></span></button></div>
<div class="clearfix"></div>

<div class="line4"></div>
<div class="col-md-3">01.05.09</div>
<div class="col-md-3">France - Paris</div>
<div class="col-md-3">Rent a car</div>
<div class="col-md-3 textright"><button type="submit" class="btn-search5"><span class="glyphicon glyphicon-plus"></span></button></div>
<div class="clearfix"></div>

<div class="line4"></div>
<div class="col-md-3">15.03.11</div>
<div class="col-md-3">U.A.E. - Dubai</div>
<div class="col-md-3">Car + Hotel + Flight</div>
<div class="col-md-3 textright"><button type="submit" class="btn-search5"><span class="glyphicon glyphicon-plus"></span></button></div>
<div class="clearfix"></div>

<div class="line4"></div>
<div class="col-md-3">15.06.12</div>
<div class="col-md-3">Grand Britain - London</div>
<div class="col-md-3">Car + Hotel + Flight</div>
<div class="col-md-3 textright"><button type="submit" class="btn-search5"><span class="glyphicon glyphicon-plus"></span></button></div>
<div class="clearfix"></div>

</div>
</div>
<!-- END OF TAB 5 -->	

<!-- TAB 6 -->					  
<div class="tab-pane" id="password">
<div class="padding40">

<span class="dark size18">Change password</span>
<div class="line4"></div>

Username<br/>
<input type="text" class="form-control" id="user_name" placeholder="">
(Email Id or Phone No)
<br/>
<br/>
Old Password<br/>
<input type="text" class="form-control" id="old_password" placeholder="">
<br/>
New Password<br/>
<input type="text" class="form-control" id="new_password" placeholder="">
<br/>
<button type="submit" class="btn-search5" onclick="changePassword();">Save changes</button>

<br/>
<br/>
<br/>
<!--<span class="dark size18">Security</span>
<div class="line4"></div>

What is your father's middle name?
<input type="password" class="form-control " placeholder="●●●●●●●●●">

<br/>
Please choose a security question<br/>
<select class="form-control mySelectBoxClass hasCustomSelect cpwidth3">
<option value="">What is your father's middle name?</option>
<option value="">What was the name of your first pet</option>
<option value="">What was your first telephone number</option>
</select>

<br/>
<br/>
Please enter an answer<br/>
<input type="text" class="form-control " placeholder="">

<br/>
Please confirm your answer<br/>
<input type="text" class="form-control " placeholder="">
<br/>
<button type="submit" class="btn-search5">Save changes</button>
-->
</div>
</div>
<!-- END OF TAB 6 -->	

<!-- TAB 7 -->					  
<div class="tab-pane" id="newsletter">
<div class="padding40">

<span class="dark size18">Newsletter</span>
<div class="line4"></div>

<div class="checkbox dark">
<label>
<input type="checkbox" checked> Check this box to receive a monthly newsletter
</label>
</div>

<br/>
<button type="submit" class="btn-search5">Save changes</button>							

</div>
</div>
<!-- END OF TAB 7 -->	




</div>
<!-- End of Tab panes from left menu -->	

</div>
<!-- END OF RIGHT CPNTENT -->

<div class="clearfix"></div><br/><br/>
</div>
<!-- END CONTENT -->			



</div>


</div>
<!-- END OF CONTENT -->
<?php include 'Includes/footer2.php'; ?>