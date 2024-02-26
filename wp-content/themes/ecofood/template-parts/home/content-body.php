<div class="main-content-inner">
	<div class="container">
		<div class="main-content-title">
			<h2>CATEGORY</h2>
			<ul class="main-content-menu">
				<?php
					$categories = get_categories( array(
						'orderby' => 'name',
						'parent'  => 0
					) );

					foreach ( $categories as $category ) {
						printf( '<li><a href="%1$s">%2$s</a></li>',
							esc_url( get_category_link( $category->term_id ) ),
							esc_html( $category->name )
						);
					}
				?>
			</ul>
		</div>
		<h1>Journals____</h1>
		<div class="article-wrapper">
			<div class="article-list">
				<?php
				// Start the loop.
				while ( have_posts() ) :
					the_post();

					/*
					* Include the Post-Format-specific template for the content if it's a post, otherwise include the Post-Type-specific template.
					*/
					get_template_part(
						'template-parts/item',
						get_post_type() !== 'post' ? get_post_type() : get_post_format()
					);

					// End the loop.
				endwhile;

				// Previous/next page navigation.
				the_posts_pagination(
					array(
						//'prev_text'          => __( 'Previous page', 'ecofood' ),
						//'next_text'          => __( 'Load More', 'ecofood' ),
						//'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'ecofood' ) . ' </span>',
					)
				);
				?>

			</div>
			<?php echo get_template_part('template-parts/sidebar'); ?>
		</div>
	</div>
</div>
