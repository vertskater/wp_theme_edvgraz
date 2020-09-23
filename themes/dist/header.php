<!doctype html>
<html <?php language_attributes(); ?> class="no-js">

<head>
    <meta charset="<?php bloginfo('charset') ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <nav id="navbar" class="container">
        <div id="brand">
            <?php if (function_exists('the_custom_logo')) {
                the_custom_logo();
            } ?>
        </div>
        <input type="checkbox" id="nav-trigger">
        <label for="nav-trigger" id="burger-button">
            <em aria-hidden="true"></em>
            <span class="screen-reader-text">Navigation öffnen</span>
        </label>
        <div id="main-nav">
            <?php wp_nav_menu(array(
                'theme_location' => 'primary',
                'container' => false,
                'menu_class' => 'main-nav-menu',
                'depth' => 3,
                'fallback_cb' => false
            )); ?>
        </div>
    </nav>
    <?php 
    $imgBG = get_field('header_image'); 
    $subTitle = get_field('subtitle');
    $link = get_field('btn_link');
    ?>
    <header id="page-header" <?php echo headerBgImage($imgBG); ?>>
        <div class="heading-content">
            <h1 class="page-title"><?php echo the_title(); ?></h1>
            <span class="sub-title"><?php _e($subTitle, 'edvgraz'); ?></span>
        </div>
    <?php if(is_page_template('homepage.php')) : ?>
        <div class="btn-wrapper">
            <a href="<?php echo $link['url'];?>" class="btn">
                <span class="btn-header-icon <?php echo get_field('icon');?>"></span>
                <span class="btn-header-text"><?php echo get_field('button_text');?></span>
            </a>
        </div>
    <?php endif; ?>
    </header>