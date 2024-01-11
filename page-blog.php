<?php

get_header(); ?>
	
	<?php 
	$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

	query_posts( array( 'posts_per_page' => 5, 'paged' => $paged ) );
	
	if ( have_posts() ) : ?>

			<?php /* The loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'content', get_post_format() ); ?>
			<?php endwhile; ?>

			<?php bs386_paging_nav();  ?>

		<?php else : ?>
			<?php get_template_part( 'content', 'none' ); ?>
		<?php endif; ?>

</div><!-- #main -->

<?php 
get_sidebar(); 
get_footer();
?>