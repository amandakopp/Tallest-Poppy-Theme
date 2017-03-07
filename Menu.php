<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 *Template Name: Menu Page
 *
 * @package TallestPoppy
 */

get_header(); ?>

	<div id="menu-page" class="menu-page">
		<main id="main" class="site-main" role="main">
			
          <section id="menu-nav" class="menu-nav center">
		     <div class="wrapper">
			<h1>Menu</h1>
			<ul> 
			<a href="#breakfast">Breakfast</a>
			<a href="#lunch">Lunch</a>
			<a href="#dinner">Dinner</a>
			</ul>
		    </div>
          </section>
          
          <div class="slider">
	          <!-- Slider -->
        <?php
        $args = array(
            'post_type'         => 'dish',
            'posts_per_page'    => 4,
            'orderby'           => 'rand',    
            'post__in'     		=> array (32, 30, 26, 9)
        );
        $slider = new WP_Query($args);
            
        if ($slider->have_posts()):
                    ?>
            <div class="flexslider">
              <ul class="slides">
              <?php
            while($slider->have_posts()): 
                $slider->the_post();
        ?>
           
           <?php
        //var_dump(get_field('slideshow_picture'));
         $imageArray = get_field('slideshow_picture'); // Array returned by Advanced Custom Fields
         $imageAlt = $imageArray['alt']; // Grab, from the array, the 'alt'
         $imageThumbURL = $imageArray['url']; //grab from the array the image URL
         ?>
 
          <li><img src="<?php echo $imageThumbURL;?>" alt="<?php echo $imageAlt;?>"></li>
       
		<?php endwhile;?>
		<?php wp_reset_postdata(); // reset the query ?>
		
         </ul>
        </div>
         <?php
          endif;?>
          
          </div>
          
		<section id="menu" class="menu wrapper">
		<section id="breakfast" class="breakfast cute-12-phone">
		<h2> Breakfast </h2>
		<?php $breakfast_query = new WP_Query('post_type=dish&meal=breakfast&posts_per_page=-1');// show all breakfast posts
			while($breakfast_query->have_posts()) : $breakfast_query->the_post(); ?>
				<div class= "breakfast-item lineshow">
					<article class="menu-item cute-10-tablet">
						<h1><?php the_title ()?></h1> 
						<?php the_content () ?> 
					</article>
					<article class="menu-price cute-2-tablet">
						<?php the_field('price'); ?>
					</article>
				</div>
			<hr>
				<?php endwhile; ?>
				<?php wp_reset_postdata(); // reset the query ?>
					
		</section>
		
		<section id="lunch" class="lunch cute-12-phone">
		<h2> Lunch </h2>
		<?php $lunch_query = new WP_Query('post_type=dish&meal=lunch&posts_per_page=-1');// show all breakfast posts
			while($lunch_query->have_posts()) : $lunch_query->the_post(); ?>
				<div class= "lunch-item lineshow">
				<article class="menu-item cute-10-tablet">
				<h1><?php the_title ()?></h1> 
				<?php the_content () ?>
				</article>
				<article class="menu-price cute-2-tablet">
				<?php the_field('price'); ?>
				</article>
				</div>
				<hr>
					
			<?php endwhile; ?>
			<?php wp_reset_postdata(); // reset the query ?>
		</section>
			<section id="dinner" class="dinner cute-12-phone">
			<h2> Dinner </h2>
			<?php $dinner_query = new WP_Query('post_type=dish&meal=dinner&posts_per_page=-1');// show all breakfast posts
			while($dinner_query->have_posts()) : $dinner_query->the_post(); ?>
				<div class= "dinner-item lineshow">
				<article class="menu-item cute-10-tablet">
				<h1><?php the_title ()?></h1> 
				<?php the_content () ?>
				</article>				
				<article class="menu-price cute-2-tablet">
				<?php the_field('price'); ?> 
				</article>	
				</div>
				<hr>

			<?php endwhile; ?>
			<?php wp_reset_postdata(); // reset the query ?>
			</section>
		</main><!-- #main -->
		</section>
		<script>
			jQuery(document).ready(function($){
				$(function() {
				 $('html').smoothScroll(500);
				});

			});
	</script>		
		
		
	</div><!-- #primary -->

<?php

get_footer();
