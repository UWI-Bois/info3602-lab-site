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
<html <?php language_attributes(); ?>
<head>
    <?php wp_head(); ?>
    <meta charset="utf-8">
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11" />
    <link rel="stylesheet" href="style.css"/>
    <i class="site-header__menu-trigger fa fa-bars" aria-hidden="true">

    </i>
    <title>Bizarre University</title>
</head>
<body>
    <header class="site-header">
        <div class="container">
            <h1 class="school-logo-text float-left"><a href="<?php echo site_url(); ?>"><strong>Bizarre</strong> University</a></h1>
<!--            <span class="js-search-trigger site-header__search-trigger"><i class="fa fa-search" aria-hidden="true"></i></span>-->

            <div class="site-header__menu group">
                <nav class="main-navigation">
                    <?php
                    wp_nav_menu(array(
//                            'theme_location' => 'headerMenuLocation'
                    ));
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

<!--                    <span class="search-trigger js-search-trigger"><i class="fa fa-search" aria-hidden="true"></i></span>-->
                </div>
            </div>
        </div>
    </header>


