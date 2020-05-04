<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */
?>
<!doctype html>
<html <?php language_attributes(); ?> >
<head>
    <meta charset="utf-8">
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11" />
<!--    fix this at production-->
    <link rel="shortcut icon" href="#" />
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?> >
    <header class="site-header">
        <div class="container">
            <h1 class="school-logo-text float-left"><a href="<?php echo site_url(); ?>"><strong>Bizarre</strong> University</a></h1>

            <i class="site-header__menu-trigger fa fa-bars" aria-hidden="false"></i>
            <div class="site-header__menu group">
                <nav class="main-navigation">
                    <?php
                    wp_nav_menu(array(
//	                    'menu'              => "", // (int|string|WP_Term) Desired menu. Accepts a menu ID, slug, name, or object.
	                    'menu_class'        => "", // (string) CSS class to use for the ul element which forms the menu. Default 'menu'.
//	                    'menu_id'           => "", // (string) The ID that is applied to the ul element which forms the menu. Default is the menu slug, incremented.
	                    'container'         => "", // (string) Whether to wrap the ul, and what to wrap it with. Default 'div'.
	                    'container_class'   => "", // (string) Class that is applied to the container. Default 'menu-{menu slug}-container'.
	                    'container_id'      => "", // (string) The ID that is applied to the container.
//	                    'fallback_cb'       => "", // (callable|bool) If the menu doesn't exists, a callback function will fire. Default is 'wp_page_menu'. Set to false for no fallback.
//	                    'before'            => "", // (string) Text before the link markup.
//	                    'after'             => "", // (string) Text after the link markup.
//	                    'link_before'       => "", // (string) Text before the link text.
//	                    'link_after'        => "", // (string) Text after the link text.
//	                    'echo'              => "", // (bool) Whether to echo the menu or return it. Default true.
//	                    'depth'             => "", // (int) How many levels of the hierarchy are to be included. 0 means all. Default 0.
//	                    'walker'            => "", // (object) Instance of a custom walker class.
//	                    'theme_location'    => "", // (string) Theme location to be used. Must be registered with register_nav_menu() in order to be selectable by the user.
//	                    'items_wrap'        => "", // (string) How the list items should be wrapped. Default is a ul with an id and class. Uses printf() format with numbered placeholders.
//	                    'item_spacing'      => "", // (string) Whether to preserve whitespace within the menu's HTML. Accepts 'preserve' or 'discard'. Default 'preserve'.
                    ) );
                    ?>
<!--                    <ul>-->
<!--                        <li><a href="--><?php //echo site_url('/about-us') ?><!--">About Us</a></li>-->
<!--                        <li><a href="#">Programs</a></li>-->
<!--                        <li><a href="#">Events</a></li>-->
<!--                        <li><a href="#">Campuses</a></li>-->
<!--                        <li><a href="#">Blog</a></li>-->
<!--                    </ul>-->
                </nav>
                <div class="site-header__util">
                    <?php
                    if(is_user_logged_in()){ ?>
<!--                        my notes button-->
                        <a href="<?php echo esc_url(site_url('my-notes')); ?>" class="btn btn--small btn--orange float-left push-right">
                            My Notes
                        </a>
<!--                        logout button-->
                        <a href="<?php echo wp_logout_url(); ?>" class="btn btn--small btn--dark-orange float-left btn--with-photo">
                            <span class="site-header__avatar">
                                <?php get_avatar(get_current_user_id(), 60); ?>
                            </span>
                            <span class="btn__text">
                                Logout
                            </span>
                        </a>
                        <?php
                    }
                    else{?>
                        <a href="<?php echo wp_login_url(); ?>" class="btn btn--small btn--orange float-left push-right">Login</a>
                        <a href="<?php echo wp_registration_url(); ?>" class="btn btn--small  btn--dark-orange float-left">Sign Up</a>
                    <?php
                    }
                    ?>
                    <span class="search-trigger js-search-trigger"><i class="fa fa-search" aria-hidden="true"></i></span>
                </div>
            </div>
        </div>
    </header>


