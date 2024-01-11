<?php
get_header(); ?>
	
    <header class="page-header">
        <h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'shape' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
    </header><!-- .page-header -->
	<?php if ( have_posts() ) : ?>
        <?php /* Start the Loop */ ?>
        <?php while ( have_posts() ) : the_post(); ?>
            <?php get_template_part( 'content', 'search' ); ?>
        <?php endwhile; ?>
       <?php bs386_paging_nav();  ?>

    <?php else : ?>
       <p>No results</p>
    <?php endif; ?>

</div><!-- #main -->

<?php 
get_sidebar(); 
get_footer();
?>
