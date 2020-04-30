<?php include('Crypto.php')?>
<?php
	error_reporting(0);
	
	$workingKey='203DE0647936BB425893597B258828FA';		//Working Key should be provided here.
	$encResponse=$_POST["encResp"];			//This is the response sent by the CCAvenue Server
	$rcvdString=decrypt($encResponse,$workingKey);		//Crypto Decryption used as per the specified working key.
	$order_status="";
	$decryptValues=explode('&', $rcvdString);
	$dataSize=sizeof($decryptValues);
	
	
   parse_str($rcvdString, $output);
    
// 	echo "<pre>",print_r($output);
//          die();
   // _dx($output);

   $head  =  '';
	// echo "<center>";

	for($i = 0; $i < $dataSize; $i++) 
	{
		$information=explode('=',$decryptValues[$i]);
		if($i==3)	$order_status=$information[1];
	}

	if($order_status==="Success")
	{
		$head = "<br>Thank you for shopping with us. Your credit card has been charged and your transaction is successful. We will be shipping your order to you soon.";
		
	}
	else if($order_status==="Aborted")
	{
		$head =  "<br>Thank you for shopping with us.We will keep you posted regarding the status of your order through e-mail";
	
	}
	else if($order_status==="Failure")
	{
		$head = "<br>Thank you for shopping with us.However,the transaction has been declined.";
	}
	else
	{
		$head = "<br>Security Error. Illegal access detected";
	
	}
	
	
	$api = CallAPI('POST','https://obligr.info/payment-response',$output);

	// _dx($api);
	$api = json_decode($api,true);
	$redirect = isset($api['redirect']) ? $api['redirect']: '';

	if($api['success']){
		$apires = $api['data'];
	}else{
		$apires = 'Something went wrong';
	}



		if(empty($output)){
			if ($_SERVER['HTTP_REFERER']) {
					header("Location: = ".$_SERVER['HTTP_REFERER']);
					exit();
			}else{
					header("Location: https://obligr.com/pricing");
					exit();
			}
		}


// _dx($redirect);
?>




<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

   <title>OBLIGR INDIA PVT LTD</title>
    
    <style type="text/css">
    	.form-group {
		    margin-bottom: -8px !important;
		}
    </style>
  </head>
  <body>
	<div class="container mt-2">
		<div class="card">
		  <div class="card-header center">
		  	 <h3><u>Payment Reciept</u></h3>
		   <h5><?= $head?></h5>
		  </div>
		  <div class="card-body">

		  	<div class="form-group row">
			    <label  class="col-sm-2 col-form-label"><b>Customer Name</b></label>
			    <div class="col-sm-10">
			    <label  class="col-form-label"><?= $output['billing_name']?></label>
			    </div>
			</div>
			<div class="form-group row">
			    <label  class="col-sm-2 col-form-label"><b>Order ID</b></label>
			    <div class="col-sm-10">
			    <label  class="col-form-label"><?= $output['order_id']?></label>
			    </div>
			</div>
			<div class="form-group row">
			    <label  class="col-sm-2 col-form-label"><b>Transaction ID</b></label>
			    <div class="col-sm-10">
			    <label  class="col-form-label"><?= $output['tracking_id']?></label>
			    </div>
			</div>
			<div class="form-group row">
			    <label  class="col-sm-2 col-form-label"><b>Transaction Reference No.</b></label>
			    <div class="col-sm-10">
			    <label  class="col-form-label"><?= $output['bank_ref_no']?></label>
			    </div>
			</div>
			<div class="form-group row">
			    <label  class="col-sm-2 col-form-label"><b>Transaction Status</b></label>
			    <div class="col-sm-10">
			    <label  class="col-form-label"><?= $output['order_status']?></label>
			    </div>
			</div>
			<div class="form-group row">
			    <label  class="col-sm-2 col-form-label"><b>Transaction Message</b></label>
			    <div class="col-sm-10">
			    <label  class="col-form-label"><?= $output['status_message']?></label>
			    </div>
			</div>
			<div class="form-group row">
			    <label  class="col-sm-2 col-form-label"><b>Failure Message</b></label>
			    <div class="col-sm-10">
			    <label  class="col-form-label"><?= $output['failure_message']?></label>
			    </div>
			</div>
			<div class="form-group row">
			    <label  class="col-sm-2 col-form-label"><b>Amount</b></label>
			    <div class="col-sm-10">
			    <label  class="col-form-label"><?= $output['amount']?></label>
			    </div>
			</div>
			<div class="form-group row">
			    <label  class="col-sm-2 col-form-label"><b>Transaction Date</b></label>
			    <div class="col-sm-10">
			    <label  class="col-form-label"><?= $output['trans_date']?></label>
			    </div>
			</div>
		    <h5 class="card-title">Your Account Information</h5>
		    <p class="card-text"><?= $apires?></p>
		    <a href="https://obligr.com" class="btn btn-primary">Go somewhere</a>
		  </div>
		</div>
	</div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


    <script type="text/javascript">
		var redirect = '<?= $redirect?>'
		if(redirect){
			window.location.href = redirect;
		}

		setTimeout(function(){ 
			window.location.href = 'https://obligr.com/pricing'
			 }, 30000);
	</script>
  </body>
</html>