<?php

$post_6 = get_post(6);

?>

<div class="hero-wrapper" style="background-image: url('<?php echo get_the_post_thumbnail_url() ;?>'); background-size: cover; background-repeat: no-repeat; background-position: center;">
	<div class="" id="overlay">
		<div class="container">
			<div class="hero-inner">
				<div class="hero-title">
					<?php echo the_title() ; ?>
				</div>
				<div class="hero-description">
				<?php echo wp_trim_words( get_the_content(), 20, '...' ); ?>
				</div>
				<div class="hero-button">
					<a href="<?php echo the_permalink() ?>">Read More</a>
				</div>
			</div>
		</div>
	</div>
</div>
