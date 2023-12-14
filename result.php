<?php 
	if($_POST['name']||$_POST['phone']||$_POST['email']||$_POST['txt-subject']||$_POST['txt-message'])
	{
		echo "<br>Your Name is : ".$_POST['name'];
		echo "<br>Your Email is : ". $_POST['email'];
		echo "<br>Your Phone number is : ". $_POST['phone'];
		echo "<br>Your subject is : ". $_POST['txt-subject'];
		echo "<br>Your message is : ". $_POST['txt-message'];
	}
	echo '<br><br>';
	//print_r($_POST);
        //includes and session  start here
        //validate that request parameters are set
        if ( isset($_POST)) 
        {
              //getters
            //$data = $_POST["data"];

              $email = $_POST['email'];
                $name = $_POST['name'];
                $phone = $_POST['phone'];
                $message = $_POST['message'];

                $subject = $_POST['subject'];
               
            $toEmail = 'yourtaku@gmail.com';

                            // Sender
                            $from = $email;
                            $fromName = 'Enquiry Form';
                            
                            // Subject
                            $emailSubject =  $subject;
                             $htmlContent = '<h2>Enquiry Request</h2>
                                <p><b>Name:</b> '.$name.'</p>
                                <p><b>Email:</b> '.$email.'</p>
                                <p><b>Mobile Number:</b> '.$phone.'</p>
                                <p><b>Message:</b><br/>'.$message.'</p>';
                            
                            // Header for sender info
                            $headers = "From: $fromName"." <".$from.">";
                              // Set content-type header for sending HTML email
                                $headers .= "\r\n". "MIME-Version: 1.0";
                                $headers .= "\r\n". "Content-type:text/html;charset=UTF-8";

                                  
            if (mail($toEmail, $emailSubject, $htmlContent, $headers)) 
            {
                echo json_encode(array('status' => 'success'));
            }
             else 
             {
              echo json_encode(array('status' => 'error'));
            }
                // database insert  here..
                //return a json object
           
        }	
?>