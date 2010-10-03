<?php
?>
	</div><!-- #content-box -->

	<div id="footer" role="contentinfo">
		<?php get_sidebar( 'footer' ); ?>

		<div id="colophon">
			<?php printf( __( 'Theme: %1$s by %2$s' ), '<a target="_blank" href="http://github.com/mattrude/wp-theme-odin">Odin</a>', '<a target="_blank" href="http://mattrude.com/">Matt Rude</a>' ); ?> <a target="_blank" href="http://wordpress.org/" rel="generator" class="generator-link">Powered by WordPress</a>
			<?php if ( is_user_logged_in() ) { ?>
				<!-- Display Stite status to logged in users only -->
                        	<br/>This page took <?php timer_stop(1); ?> seconds of computer labor,<br/>
                        	and required <?php echo get_num_queries(); ?> questions to produce.
                        <?php } ?>
		</div><!-- #colophon -->
	</div><!-- #footer -->

</div><!-- #container -->

<?php wp_footer(); ?>
</body>
</html>
