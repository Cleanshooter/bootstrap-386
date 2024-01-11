<?php 
get_header() ?>

	<div id="post-0" class="post error404 row-fluid">
		<div class="offset2 span8">
			<p class="text-center"><code >404 - FILE NOT FOUND!</code></p>
            <p>The system the could not find the resource you requested.  You can retry your request later or return to a working resource on the server.</p>
            <p>*  Press <a href="<?php echo home_url();?>">here</a> to return to <?php bloginfo('name');?>.<br>
            *  Press CTRL+ALT+DELETE two times to restart your computer.  You will lose any unsaved information in all applications.</p>
            <p class="text-center">Press any key to continue _</p>
		</div>
	</div><!-- .post -->

<?php get_footer() ?>
<script language="javascript" type="application/javascript">
jQuery(document).keypress(function(){
     window.location = "<?php echo home_url();?>";
});
</script>