<?php
include '../../Includes/db.php';

$query1 = mysqli_query($conn, "select count(cust_id) as count from tbl_customers where is_deleted!='yes'");
$row1 = mysqli_fetch_assoc($query1);
$totalRec = $row1['count'];
$limit = 10;
$pageCount = ceil($totalRec/$limit);

$offset = $_POST['offset'];

$query = mysqli_query($conn, "select s_no, first_name, last_name, cust_id, mobile_number, email_id, picture, address, registered_date from tbl_customers where is_deleted!='yes' limit ".$offset.", ".$limit);
$num = mysqli_num_rows($query);
$outp = '[';
if($num > 0){
	$outp .= '{"pages": "'.$pageCount.'"}';
	while($row = mysqli_fetch_assoc($query)){
		$sNo = $row['s_no'];
		$first_name = $row['first_name'];
		$last_name = $row['last_name'];
		$name = $first_name." ".$last_name;
		$id = $row['cust_id'];
		$phoneno = $row['mobile_number'];
		$emailid = $row['email_id'];
		$photo = $row['picture'];
		$address = $row['address'];
		$date = $row['registered_date'];
		$date = date("D d M y, h:i A", strtotime($date));

		if($outp != '['){
			$outp.=',';
		}

		$outp .= '{"name":"'.$name.'",';
		$outp .= '"id":"'.$id.'",';
		$outp .= '"sNo":"'.$sNo.'",';
		$outp .= '"phoneno":"'.$phoneno.'",';
		$outp .= '"emailid":"'.$emailid.'",';
		$outp .= '"photo":"'.$photo.'",';
		$outp .= '"adrs":"'.$address.'",';
		$outp .= '"reg_date":"'.$date.'"}';
	}
}
$outp .= ']';
echo $outp;
?>