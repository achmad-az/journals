<?php
/**
 * The footer template file
 *
 * This is the content displayed on bottom of your content.
 * It is included on all the template files.
 */

?>
<footer id="footer" role="contentinfo" itemscope itemtype="http://schema.org/WPFooter">
	<div class="footer-inner">
		<div class="footer-top">
			<div class="container">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img src="<?php echo get_template_directory_uri() . '/resources/assets/images/logo.webp';?>" alt=""></a>
			</div>
		</div>
		<div class="footer-bottom">
			<div class="container">
				<div class="footer-bottom-left">
					&copy; <span itemprop="copyrightYear"><?php echo date('Y');?></span>
					<span itemprop="copyrightHolder" itemscope itemtype="http://schema.org/Person">
						<span itemprop="name">ecofood All rights reserved.</span>
					</span>
				</div>

				<div class="footer-bottom-right">

				</div>

			</div>
		</div>
	</div>
</footer>
