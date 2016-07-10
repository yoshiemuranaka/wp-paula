<?php
/*
Template Name: Writing 
*/

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<div class="content-wrapper">

			<!-- GETTING CUSTOM POST TYPE -->
			<div class="posts__container">
				<?php 
					$args = array( 'post_type' => 'post', 'posts_per_page' => -1 );
					$loop = new WP_Query( $args ); 
				?>
					<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
						<div class="writing__excerpt">
							<h2 class="writing__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
							<h5 class="writing__date"><?php the_date(); ?></h5>
							<?php $content = get_the_content();
							 echo '<p>' .  wp_trim_words( $content, 50, '...' ) . '</p>'; 
							?>
							<a href="<?php the_permalink() ?>">Read more</a>
						</div>
					<?php endwhile;?>		
			</div> 


			</div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
