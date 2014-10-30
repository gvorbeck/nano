<?php ?>
<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) & !(IE 8)]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php wp_title( '|', true, 'right' ); ?></title>
  <link rel="profile" href="http://gmpg.org/xfn/11">
  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
  <header role="banner">
    <?php echo conduit_svg_hamburger(); ?>
    <h1>
      <a id="site--title" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home" class="logo">
        <?php bloginfo( 'name' ); ?>
      </a>
    </h1>
    <?php get_search_form(); ?>
    <a id="site--admin" href="<?php echo esc_attr( admin_url() ); ?>"><?php echo conduit_svg_gear(); ?></a>
  </header>
  <?php wp_nav_menu( array( 'theme_location' => 'header-menu', 'container_class' => 'menu-hamburger-container' ) ); ?>
  <?php if ( is_user_logged_in() && current_user_can( 'edit_posts' ) ) { ?>
    <a href="<?php echo esc_attr( admin_url() ) . 'post-new.php'; ?>" class="button--add-post button">
      <span>+</span>
    </a>
  <?php } ?>
  <main>
    <?php if ( is_page() ) {
      echo '<h1>' . get_the_title() . '</h1>';
    } else if ( is_category() ) {
      echo '<h1>';
      single_cat_title();
      echo '</h1>';
    }
