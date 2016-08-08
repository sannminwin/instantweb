<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>InstantWEB | Free Phone Messaging</title>

        <!-- CSS -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="assets/css/formValidation.min.css"/>
        <link rel="stylesheet" href="assets/css/form-elements.css">
        <link rel="stylesheet" href="assets/css/intlTelInput.css">
        <link rel="stylesheet" href="assets/css/style.css">

        <!-- Javascript -->
        <script src="assets/js/jquery-1.11.1.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/jquery.backstretch.min.js"></script>
        <script src="assets/js/retina-1.1.0.min.js"></script>
        <script src="assets/js/formValidation.min.js"></script>
        <script src="assets/js/formvalidation.bootstrap.min.js"></script>
        <script src="assets/js/intlTelInput.min.js"></script>
        <script src="assets/js/scripts.js"></script>
        <script>
        function Redirect(){
            window.location.href="index.php"
        }
        function myTimer(){
            
            var myCount =1;
            var currentCount = document.getElementById("display").innerHTML;
            
            if (currentCount==1){ Redirect();}
            
            document.getElementById("display").innerHTML =  currentCount - myCount
            
            setTimeout("myTimer()",1000);
        }
        
    </script>
         <!--[if lt IE 10]>
            <script src="assets/js/placeholder.js"></script>
        <![endif]-->
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- Favicon and touch icons -->
        <link rel="shortcut icon" href="assets/ico/favicon-16.png">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/favicon-144.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/favicon-114.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/favicon-72.png">
        <link rel="apple-touch-icon-precomposed" href="assets/ico/favicon-57.png">

    </head>

    <body onload="myTimer();">
    
    <?php
// define variables and set to empty values
$greeting = $status =$verify ="";
$name = $to = $body = "";
$from="646-374-2133";
$errorIds = array(); //user ids array which had broken phones


if ($_SERVER["REQUEST_METHOD"] == "POST") {
   $name = $_POST["name"];
   $to = $_POST["phone"];
   $body = $_POST["message"];
}

?>   
			                           
<?php

    require "assets/twilio/Services/Twilio.php";
    $AccountSid = "AC923f729b5ddbcf26669bb55538cd8292";
    $AuthToken = "7a9912561a788d71b929967160b7826d";
    $client = new Services_Twilio($AccountSid, $AuthToken);
    $people = array("$to" => "$name");
    
	foreach ($people as $to => $name) {
		try
        {
        $sms = $client->account->messages->sendMessage($from,$to,"Hey $name, $body");
        	$greeting = "Congratulation!";
		$status = "Your Message is already sent to ";  
        
		}
		catch (Exception $e)
        {  //on error push userId in to error array
       	
       		$greeting = "We are Sorry!";
		$status = "Your Message wasn't sent to ";  
		$verify = "Please verify<span class='num'> $to</span> at Twilio first. ";  
        }
	}

?>





    
    
    

        <!-- Top content -->
        <div class="top-content">
        	
            <div class="inner-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-offset-1 col-sm-10 form-box">
                            <div class="form-top">
                                <div class="form-top-left center">
                                    <h1>			
					
									<strong><?php print $greeting; ?></strong> <br/>
									<span><?php print $status; ?><br/><?php print $name; ?> </span><br/>
									<span><?php print $verify; ?></span>
									</h1>
                                   <p> This page will redirect to Home within <label id="display">6</label> sec. </p>
                                </div>
                                <div class="form-top-right center">
                        		<i class="fa fa-comments"></i>
                        	</div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
            
        </div>

    </body>

</html>