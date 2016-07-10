<?php
/*
Template Name: Work 
*/

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<div class="content-wrapper">
			<div class="posts__container">
			<header>
				<h2 class="section-title">Paintings</h2>
			</header>
			<?php 
					$paintings = get_field('paintings');
					if($paintings):
					?>
				<div class="row painting__gallery">
					<?php foreach($paintings as $painting): ?>
						<div class="col four">
							<a href="#" data-featherlight="<?php echo $painting['url']?>" class="gallery">
								<div class="image--thumbnail" style="background-image:url(<?php echo $painting['url']?>)"></div>
							</a>
						</div>
					<?php endforeach; ?>
				</div>
			<?php endif;?>
			</div>
			
		<div class="posts__container">
			<header>
				<h2 class="section-title">Photographs</h2>
			</header>
			<?php 
					$photographs = get_field('photographs');
					if($photographs):
					?>
				<div class="row painting__gallery">
					<?php foreach($photographs as $photograph): ?>
						<div class="col four">
							<a href="#" data-featherlight="<?php echo $photograph['url']?>" class="gallery">
								<div class="image--thumbnail" style="background-image:url(<?php echo $photograph['url']?>)"></div>
							</a>
						</div>
					<?php endforeach; ?>
				</div>
			<?php endif;?>
		</div>


			</div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
