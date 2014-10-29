<?php ?>
<!DOCTYPE html>
<!--[if IE 9 ]><html lang="en" class="ie ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html <?php language_attributes(); ?>> <!--<![endif]-->
<head>
<title><?php
	global $page, $paged;
	wp_title( '|', true, 'right' );
		bloginfo( 'name' );
		$site_description = get_bloginfo( 'description', 'display' );
		if ( $site_description && ( is_home() || is_front_page() ) )
			echo " | $site_description";
		if ( $paged >= 2 || $page >= 2 )
			echo ' | ' . sprintf( __( 'Page %s' ), max( $paged, $page ) );
	?>
</title>
<meta name="description" content="<?php if ( is_single() ) {
	single_post_title('', true);
	} else {
	bloginfo('name'); echo " - "; bloginfo('description');
	}
?>" />
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- The little things -->
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
  <link rel="shortcut icon" href="<?php echo bloginfo('template_directory'); ?>/favicon.png">
<!-- The little things -->

	<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>
    <header role="banner">
        <?php echo conduit_svg_hamburger(); ?>
        <h1><a id="site--title" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home" class="logo"><?php bloginfo( 'name' ); ?></a></h1>
    </header>
    <?php wp_nav_menu( array( 'theme_location' => 'header-menu', 'container_class' => 'menu-hamburger-container' ) ); ?>
    <a href="<?php echo admin_url() . 'post-new.php'; ?>" class="button--add-post button">
      <span>+</span>
    </a>
    <main>
      <?php if ( is_page() ) {
        echo '<h1>' . get_the_title() . '</h1>';
      } else if ( is_category() ) {
        echo '<h1>';
        single_cat_title();
        echo '</h1>';
      }
