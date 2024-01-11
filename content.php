<?php
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php if ( has_post_thumbnail() && ! post_password_required() ) : ?>
		<div class="entry-thumbnail">
			<?php the_post_thumbnail(); ?>
		</div>
		<?php endif; ?>

		<?php if ( is_single() ) : ?>
		<h1 class="entry-title"><?php the_title(); ?></h1>
		<?php else : ?>
		<h1 class="entry-title">
			<a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
		</h1>
		<?php endif;?>

		<div class="entry-meta">
			<?php //twentythirteen_entry_meta(); ?>
			<?php edit_post_link( __( 'Edit', 'bootstrap-386' ), '<span class="glyphicon glyphicon glyphicon-edit"></span> <span class="edit-link">', '</span>' ); ?>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->

	<?php if ( is_search() ) : // Only display Excerpts for Search ?>
	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->
	<?php else : ?>
	<div class="entry-content">
		<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'bootstrap-386' ) ); ?>
		<?php wp_link_pages( array( 'before' => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'bootstrap-386' ) . '</span>', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>' ) ); ?>
	</div><!-- .entry-content -->
	<?php endif; ?>

	<footer class="entry-meta lead">
		<?php 
		if ( comments_open() && ! is_single() )
			comments_popup_link( '<span class="leave-reply">' . __( 'Leave a comment', 'bootstrap-386' ) . '</span>', __( 'View Comment', 'bootstrap-386' ), __( 'View all % comments', 'bootstrap-386' ) ); 
		echo " ";
		the_tags(); 
		?>
	</footer><!-- .entry-meta -->
</article><!-- #post -->