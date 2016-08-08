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

    <body>

        <!-- Top content -->
        <div class="top-content">
        	
            <div class="inner-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-7 text">
                            <h1><strong>InstantWEB</strong> Free Phone Messaging</h1>
                            <div class="description">
                            	<p>
	                            	With <strong> InstanWeb </strong>you can sent quick phone messages from our website to any phone number from around the world! <br/>
                                    <strong>Verify Your Phone Number first at <a href="https://www.twilio.com/user/account/phone-numbers/verified">Twilio</a></strong>
	               
                            	</p>
                            </div>
                            <div class="top-big-link">
                            	<a class="btn btn-link-1" href="https://www.twilio.com/user/account/phone-numbers/verified">Verify Phone Number Now</a>
                            </div>
                        </div>
                        <div class="col-sm-5 form-box">
                        	<div class="form-top">
                        		<div class="form-top-left">
                        			<h3>Send Message Now</h3>
                            		<p>Fill in the form below to start sending phone message:</p>
                        		</div>
                        		<div class="form-top-right">
                        			<i class="fa fa-comments"></i>
                        		</div>
                            </div>
                            <div class="form-bottom">


 
			                    <form role="form"  method="post" id="sendForm"  action="message_send.php" >
			                    	<div class="form-group">
			                    		<label class="sr-only" >Full Name</label>
			                        	<input type="text" name="name" placeholder="Name..." class="form-first-name form-control" >
			                        </div>
			                        <div class="form-group">
			                        	<label class="sr-only" for="phone">Phone Number</label>
			                        	<input type="tel" name="phone"  class="form-last-name form-control" >
			                        </div>
			                        <div class="form-group">
			                        	<label class="sr-only" for="message">Message</label>
			                        	<textarea name="message" placeholder="Message..." 
			                        				class="form-about-yourself form-control" ></textarea>
			                        </div>
			                        <button type="submit" class="btn summited">Send Now</button>
			                    </form>
		                    </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>


        
<script>
$(document).ready(function() {
    $('#sendForm').formValidation({
        framework: 'bootstrap',
        icon: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },

        fields: {
            name: {
                validators: {
                    notEmpty: {
                        message: 'Name is required'
                    },
                    stringLength: {
                        min: 5,
                        max: 16,
                        message: 'Name must be more than 5 and less than 16 characters long'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z ]+$/,
                        message: 'Name can only consist of alphabetical and space'
                    }
                }
            },
        phone: {
                
            validators: {
                notEmpty: {
                        message: 'Phone Number is required'
                    },
                callback: {
                    message: 'The phone number is not valid',
                    callback: function(value, validator, $field) {
                        return value === '' || $field.intlTelInput('isValidNumber');
                    }
                }

            }
        },
        message: {
                validators: {
                    notEmpty: {
                        message: 'Message is required'
                    },
                    stringLength: {
                        min: 10,
                        max: 60,
                        message: 'Message must be more than 10 and less than 60 characters long'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z0-9_ .;:'"?,!]+$/, 
                        message: 'Message can only consist of alphabetical, space and dot'
                    }
                }
            },
        }
    });
});
</script>
        
    </body>

</html>