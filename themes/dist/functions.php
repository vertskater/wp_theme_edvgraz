<?php
/* ----  Theme Setups -----*/
add_action('after_setup_theme', function () {
    //Title Tag in HTML-Head: <title> ... </title>
    add_theme_support('title-tag'); //für meine Seite entfernen.
    //Pfad zur Sprachdatei
    load_textdomain('edvgraz', get_template_directory() . '/languages');
    // Aktivierung von Beitragsbildern
    add_theme_support('post-thumbnails');
    //Eigene Bildgröße im Theme definiert
    add_image_size('post-image', 700, 525, true); // letzer Parameter (true) bestimmt die Position: z.B. array('center', 'top')
    //WordPress HTML5-Markup
    add_theme_support('html5', array(
        'search-form',
        'gallery',
        'caption',
        'style',
        'script',
        'comment-list',
        'comment-form'
    ));
     //Navigation Registrieren und Positionen übergeben
     register_nav_menus(array(
        'primary' => __('Haupt Navigation', 'edvgraz'),
        'footer' => __('Footer Navigtaion', 'edvgraz')
    ));

    //Custom Logo über Customizer einfügen 
    add_theme_support('custom-logo', array(
        'height' => 60,
        'width' => 100,
        'flex-height' => false,
        'flex-width' => true
    ));
    /* -- Gutenberg Editor -- */
    //Theme für Gutenberg optimiert - Lade defauld Block styles für Theme
    add_theme_support('wp-block-styles');
    //aktiviere bei Bild Block fullwidth Layouts
    add_theme_support('align-wide');
    //style für Gutenberg-editor einbinden
    add_theme_support('editor-styles');
    add_editor_style('style-editor.css');

});

//CSS & JS in <head> bzw. vor dem </body> einfügen
add_action('wp_enqueue_scripts', function () {
    //add google-font
    //wp_enqueue_style('google-font', '<link href="https://fonts.googleapis.com/css2?family=Grandstander&display=swap" rel="stylesheet">');
    //css-file in den <head> einfügen
    wp_enqueue_style('dev-style', get_template_directory_uri() . '/style.css');
    wp_enqueue_script('dev-script', get_template_directory_uri() . '/scripts/scripts.js', array('jquery'), '1.0', true);
    wp_enqueue_script('dev-script', get_template_directory_uri() . '/scripts/megamenu.js', array('jquery'), '1.0', true);
});

//HEADER Bild und Text einfügen
function headerBgImage($img)
{
    if (empty($img)) {
        $srcSM = wp_get_attachment_image_src(get_field('headerimage_desktop', 'options'), 'medium_large');
        $srcLG = wp_get_attachment_image_src(get_field('headerimage_desktop', 'options'), 'full');
    } else
        $srcSM = wp_get_attachment_image_src($img, 'medium_large');
        $srcLG = wp_get_attachment_image_src($img, 'full');
    return ' class="header-bg-image" data-src-sm="' . $srcSM[0] . '"data-src-lg="' . $srcLG[0] . '"';
}

//Add Color to Customizer - Ermöglicht ändern der Textfarben von Header <h1> und <span> Tags.
function mytheme_customize_register( $wp_customize ) {
    //All our sections, settings, and controls will be added here
    $wp_customize->add_setting( 'header_textcolor' , array(
        'default'     => "#2E2E2E",
        'transport'   => 'refresh',
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_textcolor', array(
        'label'        => __( 'Headertext Color', 'mytheme' ),
        'section'    => 'colors',
    ) ) );
}
add_action( 'customize_register', 'mytheme_customize_register' );

function mytheme_customize_css()
{
    ?>
    <style type="text/css">
        h1 { color: #<?php echo get_theme_mod('header_textcolor', "#000000"); ?>; }
        .sub-title { color: #<?php echo get_theme_mod('header_textcolor', "#000000"); ?>; }
    </style>
    <?php
}
add_action( 'wp_head', 'mytheme_customize_css');