<?php
/**
 * The header template file
 *
 * This is the content displayed on top of your content.
 * It is included on all the template files.
 *
 */

?>
<header id="header" role="banner" itemscope itemtype="http://schema.org/WPHeader">

	<hgroup>
		<div class="header-wrapper">
			<div class="container">
				<div class="header-inner">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img src="<?php echo get_template_directory_uri() . '/resources/assets/images/logo.webp';?>" alt=""></a> <span><?php bloginfo( 'name' ); ?></span>
				</div>
			</div>
		</div>
	</hgroup>
</header>
