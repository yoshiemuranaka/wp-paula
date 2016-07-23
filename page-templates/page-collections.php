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
						<div class="row">
								<div class="col four">
									<div class="collection__img">
									<?php $img_url = get_field('hero_image'); ?>
										<div class="image--thumbnail" style="background-image: url(<?php echo $img_url ?>)">
										</div>
									</div>
								</div>
								<div class="col eight collection__content">	
										<h2 class="collection__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
										<div class="collection__excerpt">
										<?php $content = strip_shortcodes(get_the_content());
										 echo '<p>' .  wp_trim_words( $content, 60, '...' ) . '</p>'; 
										?>
										</div>
										<a href="<?php the_permalink() ?>">See more</a>
								</div>
							</div>
					<?php endwhile;?>		
			</div> 


			</div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
