<?php
/**
 * The template for the RSVP contact form
 *
 * based on page.php
 *
 * @package Graith
 */

  $response = "";
//function to generate response
	function my_contact_form_generate_response($type, $message){

		global $response;

		if($type == "success") $response = "<div class='success'>{$message}</div>";
		else $response = "<div class='error'>{$message}</div>";

	}
  //response messages
  $message_unsent  = "Message was not sent. Try Again.";
  $message_sent    = "Thanks! Your message has been sent.";


//user posted variables
$name = $_POST['full-name'];
$email = $_POST['email'];
if (isset($_POST['other-names'])) {
	$otherNames = $_POST['other-names'];
}
if (isset($_POST['attend'])) {
	$attend = $_POST['attend'];
}
$date = gmdate("M d Y"); 


//php mailer variables
//$to = get_option('admin_email');
$to = 'faith@faithbot.com';
$subject = "Someone sent a message from ".get_bloginfo('name');
$headers = 'From: '. $email . "\r\n" .  'Reply-To: ' . $email . "\r\n";



//If the form is submitted
if(isset($_POST['submitted'])) {
	
	//Check to see if the honeypot captcha field was filled in
	if(trim($_POST['checking']) !== '') {
	 $captchaError = true;
	} else {
		
		if(!isset($hasError)) {

		 $emailTo = 'faith@faithbot.com';
		 $subject = 'Form Submission from '.$name;
		 //$sendCopy = trim($_POST['sendCopy']);
		 $body =  "Date: $date \n Name: $name \n E-mail: $email \n Other Guests: $otherNames \n Attend: $attend \n\n";
			mail($to,$subject,$body); 
		 $headers = 'From: My Site <'.$emailTo.'>' . "rn" . 'Reply-To: ' . $email;

		 mail($emailTo, $subject, $body, $headers);

//		 if($sendCopy == true) {
//			$subject = 'You emailed <strong>Your Name</strong>';
//			$headers = 'From: <strong>Your Name</strong> <<strong>noreply@somedomain.com</strong>>';
//			mail($email, $subject, $body, $headers);
//		 }

		 $emailSent = true;

		}
		
	}

}





get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'page' );

			endwhile; // End of the loop.
			?>
			
			
			
			<!-- success/error message -->
			<?php if(isset($emailSent) && $emailSent == true) { ?>

				<div class="success-notice">Thank you for your RSVP!</div>

			<?php } else { ?>

			
		 	<?php } ?>
			
			
			<!-- RSVP form -->
			<form action="<?php the_permalink(); ?>" method="post">
				
				<div class="form-group">
					<label for="full-name">Full Name <span class="required">*</span></label>
					<input type="text" name="full-name" class="form-control" required="required">
				</div>
			
				<div class="form-group">
					<label for="email">Email <span class="required">*</span></label>
					<input type="email" name="email" class="form-control" required="required">
				</div>
				
				<div class="form-group">
					<label for="other-names">Additional Guest Names</label>
					<textarea name="other-names" name="other-names" class="form-control" rows="4"></textarea>
				</div>
				
				<div class="form-group">
				
					<div class="form-check">
						<input class="form-check-input" type="radio" name="attend" id="can-attend" value="can-attend" checked>
						<label class="form-check-label" for="can-attend">
							Will Attend
						</label>
					</div>
					<div class="form-check">
						<input class="form-check-input" type="radio" name="attend" id="cant-attend" value="cant-attend">
						<label class="form-check-label" for="cant-attend">
							Regretfully Decline
						</label>
					</div>
					
				</div>

				<input type="hidden" name="submitted" id="submitted" value="true" />
				<button type="submit" class="btn">Submit</button>
				
			</form>
			
			
			
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
// get_sidebar();
get_footer();
