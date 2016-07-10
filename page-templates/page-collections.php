<?php
/*
Template Name: Collections 
*/

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<div class="content-wrapper">

			<!-- GETTING CUSTOM POST TYPE -->
			<div class="posts__container">
				<?php 
					$args = array( 'post_type' => 'collections', 'posts_per_page' => -1 );
					$loop = new WP_Query( $args ); 
				?>
					<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
						<div class="row post">
							<h2 class="collection__title"><?php the_title(); ?></h2>
							<div class="col four">
								<div class="collection__img">
									<img src="<?php echo get_field('hero_image'); ?>">
								</div>
							</div>
							<div class="col eight">	
										<div class="collection__excerpt">
										<?php $content = get_the_content();
										 echo '<p>' .  wp_trim_words( $content, 100, '...' ) . '</p>'; 
										?>
										<a href="<?php the_permalink() ?>">See more</a>
										</div>
							</div>
						</div>
					<?php endwhile;?>		
			</div> 


			</div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
