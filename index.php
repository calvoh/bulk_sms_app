<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>FAO BULK SMS APP</title>
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">

  
      <link rel="stylesheet" href="css/style.css">

  
</head>
<?php 
require __DIR__ . '/vendor/autoload.php';
use Twilio\Rest\Client;

// Your Account SID and Auth Token from twilio.com/console
$account_sid = 'ACXXXXXXXXXXXXXXXXXXXXXXXXXXXXX';
$auth_token = '89000000000000000000000000000000';
// In production, these should be environment variables. E.g.:
// $auth_token = $_ENV["TWILIO_AUTH_TOKEN"]
   if(isset($_POST['submit']))
	{
		// use of explode 
			$string = $_POST['phone'];
             $message = $_POST['message'];
			 
			$str_arr = explode ("+", $string);
			$count = 0;
				foreach($str_arr as $no)
				{	$count++;
				if($count > 1)
				{
					// A number provided by the Twilio
                
                    $twilio_number = "+1 938 222 9202";
					
				    $phone_no =  '+'.$no;
					$client = new Client($account_sid, $auth_token);
					$client->messages->create(
						// Where to send a text message (your cell phone?)
						$phone_no,
						array(
							'from' => $twilio_number,
							'body' => $message
						)
					);
				}
				}
		
		
		




	}





?>

<body>

  <div class="wrapper">
    <div class="container">
        <article class="part card-details">
            <h1>
                Messaging Details
            </h1>
            <br/>
            <br/>
            <form action="" if="cc-form" autocomplete="off" method="POST">
                
                <div class="group phone-name">
                    <label for="name">Phone Numbers</label>
                    <input type="text" id="phone" name ="phone" class="" type="text" maxlength="" placeholder="+254715428288+393479558144" required>
                </div>

                <div class="group message-name">
                    <label for="name">Message</label>
                    <input type="textarea" id="message" name="message" class="" type="text" maxlength="300" placeholder="SMS Message" required>
                </div>


                <br/>
                <div class="grup submit-group">
                    <span class="arrow"></span>
                    <input type="submit" class="submit" name="submit" value="Send Messages">
                </div>
            </form>
        </article>
        <div class="part bg"></div>
    </div>
</div>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script src="js/index.js"></script>

</body>
</html>
