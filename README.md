# bulk_sms_app
This is a Bulk SMS App with Twilio

This application sends sms from a web page using twilio SMS app
The application has two simple pages, the app where you enter numbers and the app where you read phone numbers from an excel sheet (This can be modified with an excel upload with time - this solves the issue of categories)
The issue of sms characters will be solved by the gateway service provider this will be enabled and characters more than the standards can be sent
Twilio console can be found here (you must have credentions) 
https://www.twilio.com/console

## The code to send SMS using twilio
```
<?php 
require __DIR__ . '/vendor/autoload.php';
use Twilio\Rest\Client;

// Your Account SID and Auth Token from twilio.com/console
$account_sid = 'ACXXXXXXXXXXXXXXXXXXXXXXXXXXXXX';
$auth_token = '80000000000000000000000000000000';
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
                
                    $twilio_number = "+1 00 00 0000";
					
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
```
## The Code to read from an Excel DOcument that has phone numbers
The excel has to be named data and in the same location as the server files, this can be changed to an upload with time
```
<?php
require_once "Classes/PHPExcel.php";


		$tmpfname = "data.xlsx";
		$excelReader = PHPExcel_IOFactory::createReaderForFile($tmpfname);
		$excelObj = $excelReader->load($tmpfname);
		$worksheet = $excelObj->getSheet(0);
        $lastRow = $worksheet->getHighestRow();
        
		
		for ($row = 2; $row <= $lastRow; $row++) {
			 //echo "<tr><td>";
             $worksheet->getCell('A'.$row)->getValue();
             
             $phone = $worksheet->getCell('A'.$row)->getValue();
             //echo "</td><td>";

            $phone ='+'.$phone;

            echo $phone;
             
		}	
?>
```
Lastly we use PHPExcel/Classes to import the data and we use Composer classes to import twilio api
More details on PHPExcel can be found here
https://github.com/PHPOffice/PHPExcel

More details on Composer for twilio can be found here
https://github.com/twilio/twilio-php
