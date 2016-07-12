<?php
/*
Template Name: About 
*/

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<div class="content-wrapper">
			<?php
			// while ( have_posts() ) : the_post();
			// 	get_template_part( 'template-parts/content', 'page' );
			// endwhile; // End of the loop.
			?>

			<div class="entry-content">
				<header>
					<h2 class="section-title">Experience</h2>
				</header>
				<?php 
					if( have_rows('experience') ):
					  while ( have_rows('experience') ) : the_row(); 
							$title = get_sub_field('job_title');
							$company = get_sub_field('company');
							$start = get_sub_field('start_year');
							$end = get_sub_field('end_year');
							if($end == ''):$end = 'current';endif;
						?>
							<div class="experience-group">
						    <h3><?php echo $title ?> <span class="meta--date"><?php echo $start ?>-<?php echo $end ?></span></h3>
						    <p><?php echo $company ?></p>
					    </div>
				<?php	endwhile;
					endif;
				 ?>
			 </div>

			 	<div class="entry-content">
				<header>
					<h2 class="section-title">Exhibitions</h2>
				</header>
				<?php 
					if( have_rows('exhibitions') ):
					  while ( have_rows('exhibitions') ) : the_row(); 
						$venue = get_sub_field('venue_name');
						$location = get_sub_field('city_state');
						$year = get_sub_field('year');
						$name = get_sub_field('exhibit_name');
					?>
							<div class="exhibition-group">
						    <h3><?php echo $venue; ?> <span class="meta--location-year"><?php echo $location ?>, <?php echo $year ?></span></h3>
						    <p><?php echo $name; ?></p>
					    </div>
				<?php	endwhile;
					endif;
				 ?>
			 </div>

			</div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
