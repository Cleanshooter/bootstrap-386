<?php 

if ( post_password_required() )
	return;
?>



	<?php if ( have_comments() ) : ?>
    <div id="comments" class="comments-area well">
		<h2 class="comments-title">
			<?php
				printf( _nx( 'Comments on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', get_comments_number(), 'comments title', 'bootstrap-386' ),
					number_format_i18n( get_comments_number() ), '<span>' . get_the_title() . '</span>' );
			?>
		</h2>

		<ol class="comment-list">
			<?php
				wp_list_comments( array(
					'style'       => 'ol',
					'short_ping'  => true,
					'avatar_size' => 32,
				) );
			?>
		</ol><!-- .comment-list -->

		<?php
			// Are there comments to navigate through?
			if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
		?>
		<nav class="navigation comment-navigation" role="navigation">
			<h1 class="screen-reader-text section-heading"><?php _e( 'Comment navigation', 'bootstrap-386' ); ?></h1>
			<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'bootstrap-386' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'bootstrap-386' ) ); ?></div>
		</nav><!-- .comment-navigation -->
		<?php endif; // Check for comment navigation ?>

		<?php if ( ! comments_open() && get_comments_number() ) : ?>
		<p class="no-comments"><?php _e( 'Comments are closed.' , 'bootstrap-386' ); ?></p>
		<?php endif; ?>
	</div>
	<?php endif; // have_comments() ?>

	<?php
	//Modifications to the comment form for bootstrap intergration
	$fields   =  array(
		'author' => '<div class="form-group">' .
						 '<label for="author" class="control-label">' . 
						 __( 'Name', 'bootstrap-386' ) . 
						 ' <span class="required">*</span>' . 
						 '</label> ' .
						 '<input id="author" name="author" type="text" class="form-control" value="' . 
						 esc_attr( $commenter['comment_author'] ) . 
						 '" size="30"' . 
					' /></div>',
		'email'  => '<div class="form-group"><label for="email" class="control-label">' .
						__( 'Email', 'bootstrap-386' ) . 
						' <span class="required">*</span>' . 
						'</label> ' .
						'<input id="email" name="email" class="form-control" type="email"' . 
						' value="' . 
						esc_attr(  $commenter['comment_author_email'] ) . 
						'" size="30"' . 
					' /></div>',
		'url'    => '<div class="form-group"><label for="url" class="control-label">' . 
						__( 'Website', 'bootstrap-386' ) . 
						'</label> ' .
						'<input id="url" name="url" class="form-control" type="url"' . 
						' value="' . 
						esc_attr( $commenter['comment_author_url'] ) . 
					'" size="30" /></div>',
	);
	$comment_args = array( 
		'title_reply'			=> 'Tell me what you REALLY think...',
		'fields' 				=> $fields,
		'comment_field' 		=> '<div class="form-group">' . 
									'<label for="comment">' . 
									__( 'Comment', 'bootstrap-386' ) . 
									'</label><textarea id="comment" class="form-control" ' . 
									'name="comment" cols="45" rows="8" aria-required="true"></textarea></div>',
		'comment_notes_after'	=> '<div class="form-allowed-tags">' . 
									sprintf( __( 'You may use these <abbr title="HyperText Markup Language">HTML</abbr> tags and attributes: %s' ), 
									' <pre>' . allowed_tags() . '</pre>' ) . '</div>'
	);
	comment_form($comment_args); ?>
