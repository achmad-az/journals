<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 */

if ( ! function_exists( 'ecofood_post_thumbnail' ) ) :
	/**
	 * Displays an optional post thumbnail.
	 *
	 * Wraps the post thumbnail in an anchor element on index views, or a div
	 * element when on single views.
	 */
	function ecofood_post_thumbnail() {
		if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
			return;
		}

		if ( is_singular() ) :
			?>

			<div class="post-thumbnail">
				<?php the_post_thumbnail( 'ecofood_thumbnail_background', [ 'itemprop' => 'image' ] ); ?>
			</div><!-- .post-thumbnail -->

		<?php else : ?>

		<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
			<?php the_post_thumbnail( 'ecofood_thumbnail_medium', [ 'alt' => the_title_attribute( [ 'echo' => false ] ), 'itemprop' => 'image' ] ); ?>
		</a>

		<?php
		endif; // End is_singular().
	}
endif;



if ( ! function_exists( 'ecofood_posted_by' ) ) :
	/**
	 * Prints HTML with meta information for the current author.
	 */
	function ecofood_posted_by() {
		$byline = sprintf(
			/* translators: %s: post author. */
			esc_html_x( 'Author %s', 'post author', 'ecofood' ),
			'<span class="author vcard" itemprop="author" itemscope itemtype="http://schema.org/Person"><span itemprop="name" class="author">' . esc_html( get_the_author() ) . '</span></span>'
		);

		echo '<span class="byline"> ' . $byline . '</span>'; // WPCS: XSS OK.

	}
endif;



if ( ! function_exists( 'ecofood_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function ecofood_posted_on() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s" itemprop="datePublished">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s" itemprop="datePublished">%2$s</time>';
		}

		$time_string = sprintf(
			$time_string,
			esc_attr( get_the_date( DATE_W3C ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( DATE_W3C ) ),
			esc_html( get_the_modified_date() )
		);

		$posted_on = sprintf(
			/* translators: %s: post date. */
			//esc_html_x( 'Posted on %s', 'post date', 'ecofood' ),
			$time_string
		);

		echo '<span class="posted-on">' . $posted_on . '</span>'; // WPCS: XSS OK.

	}
endif;
