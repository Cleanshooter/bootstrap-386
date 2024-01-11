<?php 
/**
 * The default Category template
 *
 * @package    UWGB-Global
 * @author     Joe Motacek <motacekj@uwgb.edu>
 * @version    0.4
 * @since      0.1
 */
 
get_header(); ?>
	
	<?php if ( have_posts() ) : ?>
			<header class="archive-header">
				<h1 class="archive-title"><?php single_cat_title(); ?></h1>

				<?php if ( category_description() ) : // Show an optional category description ?>
				<div class="archive-meta"><?php echo category_description(); ?></div>
				<?php endif; ?>
			</header><!-- .archive-header -->

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