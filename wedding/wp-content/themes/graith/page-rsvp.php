<?php
/**
 * The template for the RSVP contact form
 *
 * based on page.php
 *
 * @package Graith
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'page' );

			endwhile; // End of the loop.
			?>

			
			<!-- RSVP form -->
			<form>
				
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
					<textarea name="email" class="form-control" rows="4">
					</textarea>
				</div>
				
				<div class="form-group">
				
					<div class="form-check">
						<input class="form-check-input" type="radio" name="can-attend" id="can-attend" value="option1" checked>
						<label class="form-check-label" for="can-attend">
							Will Attend
						</label>
					</div>
					<div class="form-check">
						<input class="form-check-input" type="radio" name="cant-attend" value="cant-attend">
						<label class="form-check-label" for="cant-attend">
							Regretfully Decline
						</label>
					</div>
					
				</div>

				
				<button type="submit" class="btn">Submit</button>
				
			</form>
			
			
			
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
// get_sidebar();
get_footer();
