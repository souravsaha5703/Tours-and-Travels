<?php
session_start();
$connect=mysqli_connect("localhost","root","","tour_and_travels");
$id=$_GET["id"];
echo $id;
$user=$_SESSION['userid'];
$sel="SELECT * FROM user_table WHERE id='$user'";
$res=$connect->query($sel);
$data=$res->fetch_assoc();
$userid=$data['id'];
echo $userid;
$selpack="SELECT * FROM package_info WHERE id='$id'";
$result=$connect->query($selpack);
$packdata=$result->fetch_assoc();
$package_name=$packdata['package_name'];
$package_price=$packdata['package_price'];
$tquantity=$_SESSION['temp_data']['quantity'];
$tdate=$_SESSION['temp_data']['date'];
$contact_no=$_SESSION['temp_data']['contact'];
$tname=$_SESSION['temp_data']['name'];
$tage=$_SESSION['temp_data']['age'];
// if(isset($_SESSION['temp_data']['name'])){
//     $tname=implode(",",$_SESSION['temp_data']['name']);
// }
// if(isset($_SESSION['temp_data']['age'])){
//     $tage=implode(",",$_SESSION['temp_data']['age']);
// }
$total_price=$package_price*$tquantity;
$insert="INSERT INTO bookings_info SET package_name='$package_name',package_price='$total_price',tourist_number='$tquantity',date='$tdate',contact_no='$contact_no',traveller_name='$tname',traveller_age='$tage',user_id='$userid'";
$connect->query($insert);
header("location:home.php");
?>