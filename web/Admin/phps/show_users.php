<?php
include '../../Includes/db.php';

$query = mysqli_query($conn, "select * from tbl_customers where is_deleted='no'");
$num = mysqli_num_rows($query);
$outp = '[';
if($num != 0){
	while($row = mysqli_fetch_assoc($query)){
		$first_name = $row['first_name'];
		$last_name = $row['last_name'];
		$name = $first_name.$last_name;
		$id = $row['cust_id'];
		$phoneno = $row['mobile_number'];
		$emailid = $row['email_id'];
		$photo = $row['picture'];
		$address = $row['address'];
		$date = $row['registered_date'];
		if($outp != '['){$outp.=',';}
		$outp .= '{"name":"'.$name.'",';
		$outp .= '"id":"'.$id.'",';
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