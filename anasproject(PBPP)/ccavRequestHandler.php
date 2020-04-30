<html>
<head>
<title> OBLIGR </title>
</head>
<body>
<center>

<?php include('Crypto.php')?>
<?php 
    
	// _dx($_POST);
        
	error_reporting(0);
	
	$merchant_data='';
	$working_key='203DE0647936BB425893597B258828FA';//Shared by CCAVENUES
	$access_code='AVRL85GF74AF21LRFA';//Shared by CCAVENUES
	
	foreach ($_POST as $key => $value){
		$merchant_data.=$key.'='.urlencode($value).'&';
	}

	$encrypted_data=encrypt($merchant_data,$working_key); // Method for encrypting the data.
	// _dx($encrypted_data);
// 	$production_url='https://secure.ccavenue.com/transaction/transaction.do?command=initiateTransaction&encRequest='.$encrypted_data.'&access_code='.$access_code;

// 	echo json_encode(array('url'=>$production_url));
// 	die();
?>
<!-- <iframe src="<?php echo $production_url?>" id="paymentFrame" width="100%" height="100%" frameborder="0" scrolling="yes" ></iframe> -->

 <form method="post" name="redirect" action="https://secure.ccavenue.com/transaction/transaction.do?command=initiateTransaction"> 
<?php
	echo "<input type=hidden name=encRequest value=$encrypted_data>";
	echo "<input type=hidden name=access_code value=$access_code>";
?>
</form>
 <script language='javascript'>document.redirect.submit();</script> 
<!--<script type="text/javascript" src="jquery-1.7.2.js"></script>-->
<!--<script type="text/javascript">-->
<!--    	$(document).ready(function(){-->
<!--    		 window.addEventListener('message', function(e) {-->
<!--		    	 $("#paymentFrame").css("height",e.data['newHeight']+'px'); 	 -->
<!--		 	 }, false);-->
	 	 	
<!--		});-->
<!--</script>-->
</center>

</body>
</html>

