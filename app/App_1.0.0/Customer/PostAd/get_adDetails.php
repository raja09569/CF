<?php
header('Access-Control-Allow-Origin: *');
include '../db.php';

$adID = $_POST['adID'];
//$adID = "CFAD0006";

$query = mysqli_query($conn, "select * from tbl_ads where is_deleted!='yes' and ad_id='".$adID."'");
$num = mysqli_num_rows($query);
if($num != 0){
	$row = mysqli_fetch_assoc($query);
	$heading = $row['heading'];
	$ad_id = $row['ad_id'];
	$category_id = $row['category_id'];
	$subcategory_id = $row['subcategory_id'];
	$photos = $row['photos'];
	$location = $row['location'];
	$product_dtls = $row['product_dtls'];
	$created_at = $row['created_at'];
	$name = $row['name'];
	$company_name = $row['company_name'];
	$address1 = $row['address1'];
	$address2 = $row['address2'];
	$territory = $row['territory'];
	$country = $row['country'];
	$email_id = $row['email_id'];
	$mobile_number = $row['mobile_number'];
	$comp_profile = $row['comp_profile'];
	
	date_default_timezone_set('Asia/Kolkata'); 
	$todayDate = date('Y-m-d H:i:s');
	$createdDate = $row['created_at'];
	$createdDate = strtotime($createdDate);
	$todayDate = strtotime($todayDate);
	$timeDiff = abs($todayDate - $createdDate);
	$numberDays = $timeDiff/86400;
	$timeDiff = $todayDate - $createdDate;
	$d = floor($timeDiff/86400);
	$_d = ($d < 10 ? '0' : '').$d;

	$h = floor(($timeDiff-$d*86400)/3600);
	$_h = ($h < 10 ? '0' : '').$h;

	$m = floor(($timeDiff-($d*86400+$h*3600))/60);
	$_m = ($m < 10 ? '0' : '').$m;

	$s = $timeDiff-($d*86400+$h*3600+$m*60);
	$_s = ($s < 10 ? '0' : '').$s;

	if($_d == "00"){
		if($_h == "00"){
			if($_m == "00"){
				$time_str = 'Few sec';
			}else{
				$time_str = $_m.'m';
			}
		}else{
			if($_h == "01"){
				if($_m == "00"){
					$time_str = $_h.'h';
				}else{
					if($_m == "01"){
						$time_str = $_h.'h '.$_m.'m';
					}else{
						$time_str = $_h.'h '.$_m.'m';
					}
				}
			}else{
				if($_m == "00"){
					$time_str = $_h.'h';
				}else{
					$time_str = $_h.'h '.$_m.'m';
				}
			}
		}
	}else{
		if($_d == "01"){
			if($_h == "00"){
				$time_str = $_d.'d '.$_m.'m';
			}else{
				if($_h == "01"){
					if($_m == "00"){
						$time_str = $_d.'d '.$_h.'h';
					}else{
						if($_m == "01"){
							$time_str = $_d.'d '.$_h.'h '.$_m.'m';
						}else{
							$time_str = $_d.'d '.$_h.'h '.$_m.'m';
						}
					}
				}else{
					if($_m == "00"){
						$time_str = $_d.'d '.$_h.'h';
					}else{
						$time_str = $_d.'d '.$_h.'h '.$_m.'m';
					}
				}
			}
		}else{
			if($_h == "00"){
				$time_str = $_d.'d '.$_m.'m';
			}else{
				if($_h == "01"){
					if($_m == "00"){
						$time_str = $_d.'d '.$_h.'h';
					}else{
						if($_m == "01"){
							$time_str = $_d.'d '.$_h.'h '.$_m.'m';
						}else{
							$time_str = $_d.'d '.$_h.'h '.$_m.'m';
						}
					}
				}else{
					if($_m == "00"){
						$time_str = $_d.'d '.$_h.'h';
					}else{
						$time_str = $_d.'d '.$_h.'h '.$_m.'m';
					}
				}
			}
		}
	}
	
	$outp = '{"ad_id":"'.$ad_id.'",';
	$outp .= '"heading":"'.$heading.'",';
	$outp .= '"category":"'.$category_id.'",';
	$outp .= '"subcategory":"'.$subcategory_id.'",';
	
	$query1 = mysqli_query($conn, "select * from tbl_ad_images where ad_id='".$ad_id."'");
	$num1 = mysqli_num_rows($query1);
	$outp .= '"photos":['; 
	$outp .= '{"noofimages":"'.$num1.'"}';
	if($num1 != 0){
		while($row1 = mysqli_fetch_assoc($query1)){
			if($outp != "["){
				$outp .= ",";
			}
			$outp .= '{"img":"'.$row1['img'].'"}';
		}
	}
	$outp .= '],'; 
	$outp .= '"createdTime":"'.$time_str.' ago",';
	$outp .= '"product_dtls":"'.$product_dtls.'",';
	$outp .= '"name":"'.$name.'",';
	$outp .= '"email_id":"'.$email_id.'",';
	$outp .= '"mobile_number":"'.$mobile_number.'",';
	$outp .= '"address1":"'.$address1.'",';
	$outp .= '"address2":"'.$address2.'",';
	$outp .= '"location":"'.$location.'",';
	$outp .= '"territory":"'.$territory.'",';
	$outp .= '"country":"'.$country.'",';
	$outp .= '"address":"'.$address1." ,".$address2.", ".$location.", ".$territory.", ".$country.'",';
	$outp .= '"company_name":"'.$company_name.'",';
	$outp .= '"comp_profile":"'.$comp_profile.'",';
	$outp .= '"adId":"Ad Id: '.$ad_id.'",';
	$outp .= '"price":"",';
	$outp .= '"created_at":"'.$created_at.'"}';$heading = $row['heading'];
	
}
echo $outp;
?>