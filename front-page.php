<?php
/**
 * The template for displaying all pages.
 *
 *
 @package TallestPoppy
 */

get_header(); ?>
	
	<div class="hero">
		<IMG class="displayed" img src="<?php echo get_template_directory_uri()."/images/hero.jpg"?>" class="hero" alt="<?php bloginfo(" name "); ?>">
	</div>

	<div id="primary" class="content-area front">
		<main id="main" class="site-main" role="main">
							
			<section id="Blog2" class="blog2 cute-12-phone">

			<?php 
								
			$latest_blog2 = new WP_Query( "posts_per_page=2" ); 
			$n=1 
			?>
			<?php if ( $latest_blog2->have_posts() ) : ?>
			
				<!-- the loop -->
				<?php while ( $latest_blog2->have_posts() ) : $latest_blog2->the_post(); ?>
				<?php if ($n==1){?>
					<div class="latest1">
						<article class="main-text cute-6-tablet center">
							<h2><a href="<?php the_permalink();?>">
							<?php the_title();?></a></h2>
							<?php the_content();?>
							<p><a href="<?php echo home_url('blog');?>">Visit our Blog</a></p>
						</article>
						<article class="main-image cute-6-tablet center">
							<?php the_post_thumbnail( array(400, 400) );?>
						</article>
					</div>
	
				<?php } else {?>
					<div class="latest2">
						<article class="main-image cute-6-tablet center <?= $n; ?>">
							<?php the_post_thumbnail ( array(400, 400) )?>
						</article>
						<article class="main-text cute-6-tablet center">
							<div class="main-text-box">
								<h2><a href="<?php the_permalink();?>">
								<?php the_title();?></a></h2>
								<?php the_content();?>
								<p><a href="<?php echo home_url('blog');?>">Visit our Blog</a></p>
							</div>
						</article>
					</div>
					 
					<?php } ?> 
				
			<?php $n++; ?>
			<?php endwhile; ?>
			<!-- end of the loop -->
		
			<!-- pagination here -->
		
			<?php wp_reset_postdata(); ?>
		
			<?php else : ?>
				<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
			<?php endif; ?>
			</section>
		
		    <section class="testimonials">
			    <div class="center wrapper">
			    <h2>Testimonials</h2>
				    <div class="flexslider">
					    <ul class="slides">
						<?php $breakfast_query = new WP_Query('post_type=testimonial&posts_per_page=-1');// show all breakfast posts
							while($breakfast_query->have_posts()) : $breakfast_query->the_post(); ?>
								<li><?php the_content () ?></li>
							
				
						<?php endwhile; ?>
						<?php wp_reset_postdata(); // reset the query ?>
						</ul>
					</div>
		    	</div>
		    </section>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
