<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
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



//php mailer variables
//$to = get_option('admin_email');
$to = 'faith@faithbot.com';
$subject = "Someone sent a message from ".get_bloginfo('name');
$headers = 'From: '. $email . "\r\n" .  'Reply-To: ' . $email . "\r\n";

// on form submit
if (isset($_POST['submit'])) 
{ 
	
	$body = "Date: $date \n Name: $name \n E-mail: $email \n Other Guests: $otherNames \n Attend: $attend \n\n"; 
	mail($to,$subject,$body); 
	
//	$sent = wp_mail($to, $subject, $body, $headers);
		wp_mail($to, $subject, $body, $headers);
//	if($sent) my_contact_form_generate_response("success", $message_sent); //message sent!
//	else my_contact_form_generate_response("error", $message_unsent); //message wasn't sent
}
else
{
    // Show Form
}



get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			
			
			
			
			
			<?php
			

			$name = $_POST['full-name'];
			$email = $_POST['email'];
			$otherNames = $_POST['other-names'];
			//$attend = $_POST['attend[]'];
			$date = gmdate("M d Y"); 

			print "<h1>Thank you for your message!</h1>"; 
			$to = "niahcx@yahoo.com"; 
			$subject = "Message from website"; 
			$body = "Date: $date \n Name: $name \n E-mail: $email \n Other Guests: $otherNames \n Attend: $attend \n\n";
			mail($to,$subject,$body); 

			?>
			
			
			

			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'page' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
// get_sidebar();
get_footer();
