<?php 
/**
Template Name: Right Column

 * A blog tempalte for pages that will show the right widget column.  
 *
 * @package    UWGB-Global
 * @author     Joe Motacek <motacekj@uwgb.edu>
 * @version    0.9
 */

get_header(); ?>
	
    <?php while ( have_posts() ) : the_post(); ?>

        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <header class="entry-header">
                <?php if ( has_post_thumbnail() && ! post_password_required() ) : ?>
                <div class="entry-thumbnail">
                    <?php the_post_thumbnail(); ?>
                </div>
                <?php endif; ?>

                <h1><?php the_title(); ?></h1>
                <?php edit_post_link( __( 'Edit', 'uwgb-global' ), '<span class="glyphicon glyphicon glyphicon-edit"></span> <span class="edit-link">', '</span>' ); ?>
            </header>

            <div class="entry-content">
                <?php the_content(); ?>
                <?php wp_link_pages( array( 'before' => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'twentythirteen' ) . '</span>', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>' ) ); ?>
            </div>
        </article>
        <?php //no comments on pages - comments_template(); ?>
    <?php endwhile; ?>
</div><!-- #content -->

<?php 
get_sidebar();
get_footer(); 
?>
