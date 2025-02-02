<?php  

include "./model/db.php";

$input = filter_input_array(INPUT_POST);

$name = mysqli_real_escape_string($conn, $input["Event_Name"]);
$email = mysqli_real_escape_string($conn, $input["Event_Date"]);
$pass = mysqli_real_escape_string($conn, $input["Event_Desc"]);
$mc = mysqli_real_escape_string($conn, $input["Maximum_Capacity"]);

if($input["action"] === 'edit')
{
 $query = "
 UPDATE events 
 SET Event_Name = '$name', 
 Event_Date = '$email',
 Event_Desc = '$pass',
 Maximum_Capacity='$mc'
 WHERE Event_Id = '".$input["Event_Id"]."'
 ";

 mysqli_query($conn, $query);

}
if($input["action"] === 'delete')
{
 $query = "
 DELETE FROM events 
 WHERE Event_Id = '".$input["Event_Id"]."'
 ";
 mysqli_query($conn, $query);
}

echo json_encode($input);

?>
