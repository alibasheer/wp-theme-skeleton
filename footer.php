<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package toreplace
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer">
        <div class="footer-menu">
            <?php
            wp_nav_menu( array(
                'theme_location' => 'footer-menu',
                'menu_id'        => 'footer-menu',
            ) );
            ?>
        </div>
		<div class="site-info">
            <?php
            /* translators: 1: Theme name, 2: Theme author. */
            printf( esc_html__( 'Theme: %1$s by %2$s.', 'toreplace' ), 'toreplace', '<a href="http://strategiesdc.ae/">Strategies dC</a>' );
            ?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
