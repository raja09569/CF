<?php
$query = mysqli_query($conn, "select * from cab_types");
$num = mysqli_num_rows($query);

$body = "<table style='width:90%;margin:5%;'><thead>";
$body .= "<tr><th colspan='3' align='center'> List of Cab Types </th></tr>";
$body .= "<tr><th style='width:1%;text-align:center;'>S.No</th><th style='width:10%;text-align:center;'>CabTypeView</th><th></th></tr></thead>";
if($num === 0){
$body.="<tbody><tr><td colspan='2' align='center'>No Records Found!</td></tr></tbody>";
$body.="</table>";
}else{

$s_no = 1;
while($row = mysqli_fetch_assoc($query)){
$cabtype = $row['cab_type'];
$id = $row['s_no'];
$body.="<tbody><tr>";
$body.="<td>$s_no</td>";
$body.="<td>$cabtype</td>";
$body.="<td><i class='material-icons button edit' onclick='Edit2(&quot;$id&quot;,&quot;$cabtype&quot;);'>edit</i>";
$body.="&nbsp;&nbsp;<i class='material-icons button delete' onclick='Delete2($id);'>delete</i></td>";
$body.="</tr></tbody>";
$s_no=$s_no+1;
}
$body.="</table>";
}
echo $body; 

?>