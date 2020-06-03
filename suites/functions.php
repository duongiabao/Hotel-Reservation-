<?php

$GLOBALS['api'] = "http://localhost:8080/iBanking/rest/services/";
/*
function getCustomers(){
	$ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, "http://localhost:8080/iBanking/rest/services/customers/");
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
  // In Java: @Consumes(MediaType.APPLICATION_FORM_URLENCODED)


  $data = curl_exec($ch);
  curl_close($ch);
  $customers = json_decode($data, true);

  return $customers;
}
*/
function getRooms(){
	$ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $GLOBALS['api'] . "roomtype/");
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
  // In Java: @Consumes(MediaType.APPLICATION_FORM_URLENCODED)


  $data = curl_exec($ch);
  curl_close($ch);
  $rooms = json_decode($data, true);

  return $rooms;
}
/*
function countRoom($id){
 	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $GLOBALS['api'] . "roomAvailable/" . $id);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
	// In Java: @Consumes(MediaType.APPLICATION_FORM_URLENCODED)


	$data = curl_exec($ch);
	curl_close($ch);
	$num = json_decode($data, true);

	return $num;
}

function getFloors($type_id){
 	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $GLOBALS['api'] . "floors/" . $type_id);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
	// In Java: @Consumes(MediaType.APPLICATION_FORM_URLENCODED)


	$data = curl_exec($ch);
	curl_close($ch);
	$floors = json_decode($data, true);

	return $floors;
}

function booking($info_booking){
	
	$out_booking = sendPostToAPI($info_booking, $GLOBALS['api'] . "book-room/");

	return $out_booking;             
}

function sendPostToAPI($data, $url)
{
	$ch = curl_init();

	curl_setopt($ch, CURLOPT_URL , $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, array('Content-Type: application/x-www-form-urlencoded'));
	
	curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
	$output = curl_exec($ch);
    $info = curl_getinfo($ch);

	curl_close($ch);

	return $output; 
}

function getReservation(){
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $GLOBALS['api'] . "reservations/");
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
	$data = curl_exec($ch);
	curl_close($ch);
	$reservations = json_decode($data, true);

	return $reservations;
} 

function getInfoCustomer($id) {
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $GLOBALS['api'] . "info-customer/" . $id);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
	$data = curl_exec($ch);
	curl_close($ch);
	$info = json_decode($data, true);

	return $info;
}

function getName($username){
 	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $GLOBALS['api'] . "get-name/" . $username);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
	// In Java: @Consumes(MediaType.APPLICATION_FORM_URLENCODED)


	$name = curl_exec($ch);
	curl_close($ch);
	echo $data;

	return $name;
}
*/
?>