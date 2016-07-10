<?php
/**
 * The template for displaying single collection post.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package paulahutchings
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<div class="content-wrapper">
			<?php
				while ( have_posts() ) : the_post();
				$img_url = get_field('hero_image');
				?>
				
				<!-- collection hero -->
				<div class="hero" style="background-image: url(<?php echo $img_url ?>)">
					<div class="overlay"></div>
					<header class="entry-header">
						<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
					</header><!-- .entry-header -->
				</div>
				
				<!-- entry content -->
				<?php get_template_part( 'template-parts/content', get_post_format() ); ?>
				
				<!-- french translation -->
				<?php if(get_field('french_translation')): ?>
				<article>
					<a class="js-expand-content link--translate">See French Translation</a>
					<div class="entry-content translated">
						<?php
							echo get_field('french_translation')
						?>
					</div>
				</article>
				<?php endif; ?>
				<?php 
					$gallery = get_field('collection_gallery');
					if($gallery):
					?>
				<div class="row collection__gallery">
					<?php foreach($gallery as $image): ?>
						<div class="col four">
							<a href="#" data-featherlight="<?php echo $image['url']?>" class="gallery">
								<div class="image--thumbnail" style="background-image:url(<?php echo $image['url']?>)"></div>
							</a>
						</div>
					<?php endforeach; ?>
				</div>
			<?php 
				endif;
			endwhile; 
			?>
			</div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
