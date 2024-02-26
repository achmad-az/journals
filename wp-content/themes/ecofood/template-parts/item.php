<?php
/**
 * The template for displaying content for index/archive/search.
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> role="article" itemid="<?php echo esc_url( get_permalink() ); ?>" itemscope itemtype="http://schema.org/BlogPosting">

	<?php ecofood_post_thumbnail(); ?>

	<header>

		<?php
		the_title(
			sprintf(
				'<h2 itemprop="headline"><a href="%s" rel="bookmark" itemprop="url">',
				esc_url( get_permalink() )
			),
			'</a></h2>'
		);


		if ( 'post' === get_post_type() ) :
			?>
			<div>
				<?php
				ecofood_posted_on();
				ecofood_posted_by();
				?>
			</div>
		<?php endif; ?>

	</header>

	<div class="description">
		<?php the_excerpt(); ?>
	</div>

</article>
