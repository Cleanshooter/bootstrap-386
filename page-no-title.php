<?php 
/**
Template Name: No Title

 * A blog tempalte for pages that don't need titles (like the homepage).  
 * 
 * Allows users to create pages like WordPresses default frontpage elsewhere on the site
 *
 * @package    UWGB-Global
 * @author     Joe Motacek <motacekj@uwgb.edu>
 * @version    0.6
 */
get_header(); ?>
	
    <?php while ( have_posts() ) : the_post(); ?>

        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <div class="entry-content">
                <?php the_content(); ?>
                <?php wp_link_pages( array( 'before' => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'twentythirteen' ) . '</span>', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>' ) ); ?>
            </div>

            <footer class="entry-meta">
                <?php edit_post_link( __( 'Edit', 'uwgb-global' ), '<span class="glyphicon glyphicon glyphicon-edit"></span> <span class="edit-link">', '</span>' ); ?>
            </footer>
        </article>
        <?php //no comments on pages - comments_template(); ?>
    <?php endwhile; ?>
</div><!-- #content -->

<?php 
get_footer(); 
?>