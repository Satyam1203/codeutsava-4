<?php
/**
* import checksum generation utility
* You can get this utility from https://developer.paytm.com/docs/checksum/
*/
if(!(isset($_REQUEST['amt'])) or !(isset($_REQUEST['cust_id']))){
	echo "<p>You don't have permission to access this page.</p>";
	echo "<a href='../index.php'>Go back</a>";
}

$amt=$_REQUEST['amt'];
$cust_id=$_REQUEST['cust_id'];
$order_id=$cust_id.rand(0,99999);

require_once("../PaytmKit/lib/encdec_paytm.php");

/* initialize an array with request parameters */
$paytmParams = array(
    
	/* Find your MID in your Paytm Dashboard at https://dashboard.paytm.com/next/apikeys */
	"MID" => "jCUKKp17695719705444",
    
	/* Find your WEBSITE in your Paytm Dashboard at https://dashboard.paytm.com/next/apikeys */
	"WEBSITE" => "WEBSTAGING",
    
	/* Find your INDUSTRY_TYPE_ID in your Paytm Dashboard at https://dashboard.paytm.com/next/apikeys */
	"INDUSTRY_TYPE_ID" => "Retail",
    
	/* WEB for website and WAP for Mobile-websites or App */
	"CHANNEL_ID" => "WEB",
    
	/* Enter your unique order id */
	"ORDER_ID" => $order_id,
    
	/* unique id that belongs to your customer */
	"CUST_ID" => $cust_id,
    
	/* customer's mobile number */
	"MOBILE_NO" => "",
    
	/* customer's email */
	"EMAIL" => "",
    
	/**
	* Amount in INR that is payble by customer
	* this should be numeric with optionally having two decimal points
	*/
	"TXN_AMOUNT" => (int)($amt),
    
	/* on completion of transaction, we will send you the response on this URL */
    "CALLBACK_URL" => "http://127.0.0.1/files/codeutsava4/payment/resp.php",
);

/**
* Generate checksum for parameters we have
* Find your Merchant Key in your Paytm Dashboard at https://dashboard.paytm.com/next/apikeys 
*/
$checksum = getChecksumFromArray($paytmParams, "OiE7EE3r_3NTz34A");

/* for Staging */
$url = "https://securegw-stage.paytm.in/order/process";

/* for Production */
// $url = "https://securegw.paytm.in/order/process";

/* Prepare HTML Form and Submit to Paytm */
?>
<html>
	<head>
		<title>Merchant Checkout Page</title>
	</head>
	<body>
		<center><h1>Please do not refresh this page...</h1></center>
		<form method='post' action='<?php echo $url; ?>' name='paytm_form'>
				<?php
					foreach($paytmParams as $name => $value) {
						echo '<input type="hidden" name="' . $name .'" value="' . $value . '">';
					}
				?>
				<input type="hidden" name="CHECKSUMHASH" value="<?php echo $checksum ?>">
		</form>
		<script type="text/javascript">
			document.paytm_form.submit();
		</script>
	</body>
</html>




