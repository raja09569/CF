<?php
include '../../Includes/db.php';
$query = mysqli_query($conn, "select category_id, name, icon, no_of_seats, per_km_with_ac, per_km_without_ac, min_km_to_charge, min_charge_with_ac, min_charge_without_ac, owner_comm_per_trip, tax, isRideLaterAvailable from tbl_cab_categories where is_deleted != 'yes'");
$num = mysqli_num_rows($query);
$outp = '[';
if($num != 0){
	while($row = mysqli_fetch_assoc($query)){
		$id = $row['category_id'];
		$name = $row['name'];
		$icon = $row['icon'];
		$no_of_seats = $row['no_of_seats'];
		$per_km_with_ac = $row['per_km_with_ac'];
		$per_km_without_ac = $row['per_km_without_ac'];
		$min_km_to_charge = $row['min_km_to_charge'];
		$min_charge_with_ac = $row['min_charge_with_ac'];
		$min_charge_without_ac = $row['min_charge_without_ac'];
		$owner_comm_per_trip = $row['owner_comm_per_trip'];
		$tax = $row['tax'];
		$isRideLaterAvailable = $row['isRideLaterAvailable'];
		if($outp != '['){
			$outp .= ',';
		}
		$outp .= '{"id":"'.$id.'",';
		$outp .= '"name":"'.$name.'",';
		$outp .= '"icon":"'.$icon.'",';
		$outp .= '"no_of_seats":"'.$no_of_seats.'",';
		$outp .= '"per_km_with_ac":"'.$per_km_with_ac.'",';
		$outp .= '"per_km_without_ac":"'.$per_km_without_ac.'",';
		$outp .= '"min_km_to_charge":"'.$min_km_to_charge.'",';
		$outp .= '"min_charge_with_ac":"'.$min_charge_with_ac.'",';
		$outp .= '"min_charge_without_ac":"'.$min_charge_without_ac.'",';
		$outp .= '"owner_comm_per_trip":"'.$owner_comm_per_trip.'",';
		$outp .= '"isRideLaterAvailable":"'.$isRideLaterAvailable.'",';
		$outp .= '"tax":"'.$tax.'"}';
	}
}
$outp .= ']';
echo $outp; 
?>                           