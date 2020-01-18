<?php
/**
* import checksum generation utility
*/
require_once("../PaytmKit/lib/encdec_paytm.php");

$paytmChecksum = "";

/* Create a Dictionary from the parameters received in POST */
$paytmParams = array();
foreach($_POST as $key => $value){
	if($key == "CHECKSUMHASH"){
		echo "<script>alert($key -> $value)</script>";
		$paytmChecksum = $value;
	} else {
		$paytmParams[$key] = $value;
	}
}

/**
* Verify checksum
* Find your Merchant Key in your Paytm Dashboard at https://dashboard.paytm.com/next/apikeys 
*/
$isValidChecksum = verifychecksum_e($paytmParams, "OiE7EE3r_3NTz34A", $paytmChecksum);
if($isValidChecksum == "TRUE") {
	echo "Checksum Matched";
} else {
	echo "Checksum Mismatched";
}

?>