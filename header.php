<!DOCTYPE html>

<!--[if IE 7]>

<html class="ie ie7" <?php language_attributes(); ?>>

<![endif]-->

<!--[if IE 8]>

<html class="ie ie8" <?php language_attributes(); ?>>

<![endif]-->

<!--[if !(IE 7) | !(IE 8)  ]><!-->

<html <?php language_attributes(); ?>>

<!--<![endif]-->

<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="x-ua-compatible" content="IE=edge">
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="<?php bloginfo( 'description' ); ?>">
<title>
<?php if(is_home() !== true && is_front_page() !== true){ echo get_the_title() . " | "; }

		echo bloginfo('name'); ?>
</title>
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/bootstrap.css" type="text/css" media="screen" />
<?php 
	$options = get_option('bs386_theme_options');
	if ( isset($options['high-contrast']) ): if( $options['high-contrast'] == 'use-high-contrast' ):
?>
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/high-contrast.css" type="text/css" media="screen" />
<?php endif; endif; ?>
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/bootstrap-responsive.css" type="text/css" media="screen" />
<link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>" type="text/css" media="screen" />

<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">


<!--[if lt IE 9]>

        <script src="<?php echo get_template_directory_uri(); ?>/assets/js/html5shiv.js"></script>

        <script src="<?php echo get_template_directory_uri(); ?>/assets/js/respond.min.js"></script>

    <![endif]-->

<?php 
	if ( is_singular() ) wp_enqueue_script( 'comment-reply' );
	wp_head(); 
	if ( isset($options['fast-load']) ): if( $options['fast-load'] == '' ): ?>
	<style>body { visibility: hidden }</style>
<?php endif; endif;?>
</head>

<body <?php body_class(); ?>>
<header>
  <div class="navbar navbar-inverse">
    <div class="navbar-inner">
      <div class="container-fluid">
        <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
        <a class="brand" href="<?php echo home_url(); ?>">
        <?php bloginfo('name'); ?>
        </a>
        <?php wp_nav_menu( array( 
            'theme_location'  => 'site-navbar-menu',
            'menu'            => 'site-navbar-menu',
            'container_class' => 'collapse nav-collapse',
            'container_id'    => 'site-nabar-menu-collapse-container',
            'menu_class'      => 'nav',
            'menu_id'         => '',
            'echo'            => true,
            'fallback_cb'     => '',
            'depth'           => 2,
            'fallback_cb'     => 'wp_bootstrap_navwalker::fallback',
             'walker'         => new wp_bootstrap_navwalker()
          ) );
		?>
        <!--/.nav-collapse --> 
      </div>
    </div>
  </div>
</header>
<div id="main">
<div class="container-fluid">
    <div class="row-fluid">
    <?php if ( is_active_sidebar( 'left-column' ) ) : ?>
        <div id="left-sidebar" class="span3">
          <div class="well sidebar-nav">
          	<div class="nav nav-list widget-list">
            <?php dynamic_sidebar( 'left-column' ); ?>
            </div>
          </div>
        </div>
    <?php endif;
	 if( is_page() || is_404() ){
		 $template = get_post_meta( get_the_ID(), '_wp_page_template', true );
		 //echo "Tempalte: " . $template;
		 if ($template == "page-blog.php"){
			 $column = "span9";
		 }else{
		 	 $column = "span12";
		 }
	 }
     else if ( is_active_sidebar( 'left-column' ) && is_active_sidebar( 'right-column' )){
         $column = "span6";
     }else if( is_active_sidebar( 'left-column' ) || is_active_sidebar( 'right-column' )){
         $column = "span9";
     }else{
         $column = "span12";
     }
    ?>
    <div id="content" class="<?php echo $column; ?>" role="main">
    

