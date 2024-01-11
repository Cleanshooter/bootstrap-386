</div>
<!-- .row -->
</div>
<!-- .container -->
</div>
<!-- #main -->

<footer id="footer">
  <div class="container">
  </div>
</footer>
<script>
	_386 = {
<?php 
	$options = get_option('bs386_theme_options');
	if ( isset($options['fast-load']) ): if( $options['fast-load'] == 'true' ):
?>
		fastLoad: true,
<?php endif; endif;?>
<?php if ( isset($options['one-pass']) ): if( $options['one-pass'] == 'true' ): ?>
		onePass: true,
<?php endif; endif;?>
<?php if ( isset($options['speed-factor']) ): ?>
		speedFactor: <?php echo $options['speed-factor'];?>
<?php endif;?>
	}
</script>
<?php wp_footer();?>
</body></html>