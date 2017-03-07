<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package TallestPoppy
 */

?>

	</div><!-- #content -->

	<section id="contact" class="contact padtop cute-12-phone">
			<div class="wrapper">
				
			<div class="social-icons">
				<a href="www.facebook.com"><i class="fa fa-facebook fa-2x"></i></a>
				<a href="www.facebook.com"><i class="fa fa-twitter fa-2x"></i></a>
				<a href="www.facebook.com"><i class="fa fa-instagram fa-2x"></i></a>
			</div>
				
	        <?php
				$args=array('name' => 'contact','post_type' => 'page');
				$my_query = new WP_Query($args);
				while ($my_query->have_posts()) : $my_query->the_post();
					echo the_content();
		  			

	
			 if( !empty($location) ):
			?>
			</div>
		
	
		<?php endif; ?>
		<?php endwhile;
		wp_reset_query();  // Restore global post data stomped by the_post().
		?>
	</section>
	
</div>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
