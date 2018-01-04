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
if (isset($_POST['full-name'])) {
	$name = $_POST['full-name'];
}
if (isset($_POST['email'])) {
	$email = $_POST['email'];
}
if (isset($_POST['other-names'])) {
	$otherNames = $_POST['other-names'];
}
if (isset($_POST['attend'])) {
	$attend = $_POST['attend'];
}


//php mailer variables
//$to = get_option('admin_email');
$to = 'faith@faithbot.com';
$subject = "Someone sent a message from ".get_bloginfo('name');
$headers = 'From: '. $email . "\r\n" .
  'Reply-To: ' . $email . "\r\n";

// on form submit
if (isset($_POST['submit'])) 
{ 
    $sent = wp_mail($to, $subject, strip_tags($message), $headers);
		if($sent) my_contact_form_generate_response("success", $message_sent); //message sent!
		else my_contact_form_generate_response("error", $message_unsent); //message wasn't sent
}
else
{
    // Show Form
}



get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'page' );

			endwhile; // End of the loop.
			?>
			
			
			<?php echo $response; ?>
			
			
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

				<input type="hidden" name="submitted" value="1">
				<button type="submit" class="btn">Submit</button>
				
			</form>
			
			
			
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
// get_sidebar();
get_footer();
