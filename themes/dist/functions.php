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
    //Responsive Embeds (zb. Youtube Videos, IFrame)
    add_theme_support('responsive-embeds');
    //eigene Farbauswahl-Palette deaktivieren
    add_theme_support('disable-custom-colors');
    add_theme_support('editor-color-palette',array(
        array(
            'name' => __('Font-Color', 'edvgraz'),
            'slug' => 'color-1',
            'color' => '#2E2E2E'
        ),
        array(
            'name' => __('Font-Color2', 'edvgraz'),
            'slug' => 'color-2',
            'color' => '#F0F0F0'
        ),
        array(
            'name' => __('Office-Color', 'edvgraz'),
            'slug' => 'color-3',
            'color' => '#85C69F'
        ),
        array(
            'name' => __('Grafik-Color', 'edvgraz'),
            'slug' => 'color-4',
            'color' => '#FF818C'
        ),
        array(
            'name' => __('Coding-Color', 'edvgraz'),
            'slug' => 'color-5',
            'color' => '#DFCC64'
        ),
        array(
            'name' => __('smm-Color', 'edvgraz'),
            'slug' => 'color-6',
            'color' => '#3B6486'
        )
    ));
});

//CSS & JS in <head> bzw. vor dem </body> einfügen
add_action('wp_enqueue_scripts', function () {
    //add google-font
    //wp_enqueue_style('google-font', '<link href="https://fonts.googleapis.com/css2?family=Grandstander&display=swap" rel="stylesheet">');
    //css-file in den <head> einfügen
    wp_enqueue_style('dev-style', get_template_directory_uri() . '/style.css');
    wp_enqueue_script('dev-script', get_template_directory_uri() . '/scripts/scripts.js', array('jquery'), '1.0', true);
    wp_enqueue_script('dev-script', get_template_directory_uri() . '/scripts/megamenu.js', array('jquery'), '1.0', true);
    wp_register_script('owl-script', get_template_directory_uri() . '/scripts/owl.carousel.min.js', array('jquery'), '1.0', true);
});

//HEADER Bild und Text einfügen
function headerBgImage($imgDesktop, $imgMobile)
{
    if (!empty($imgDesktop) && (!empty($imgMobile))) {
        $srcSM = wp_get_attachment_image_src($imgMobile, 'medium_large');
        $srcLG = wp_get_attachment_image_src($imgDesktop, 'full');
    } else{
        $srcSM = wp_get_attachment_image_src(get_field('placeholder_img_mob', 'options'), 'medium_large');
        $srcLG = wp_get_attachment_image_src(get_field('placeholder_img_desk', 'options'), 'full');
    }
    return ' class="header-bg-image" data-src-sm="' . $srcSM[0] . '"data-src-lg="' . $srcLG[0] . '"';
}

//Add Color to Customizer - Ermöglicht ändern der Textfarben von Header <h1> und <span> Tags.
function mytheme_customize_register($wp_customize)
{
    //All our sections, settings, and controls will be added here
    $wp_customize->add_setting('header_textcolor', array(
        'default'     => "#2E2E2E",
        'transport'   => 'refresh',
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'header_textcolor', array(
        'label'        => __('Headertext Color', 'mytheme'),
        'section'    => 'colors',
    )));
}
add_action('customize_register', 'mytheme_customize_register');

function mytheme_customize_css()
{
?>
    <style type="text/css">
        h1 {
            color: #<?php echo get_theme_mod('header_textcolor', "#000000"); ?>;
        }

        .sub-title {
            color: #<?php echo get_theme_mod('header_textcolor', "#000000"); ?>;
        }
    </style>
    <?php
}
add_action('wp_head', 'mytheme_customize_css');
/*---- Custon Post Type ------- */
// Register Custom Post Type
function custom_post_testimonials() {

	$labels = array(
		'name'                  => _x( 'Testimonials', 'Post Type General Name', 'edvgraz' ),
		'singular_name'         => _x( 'Testimonial', 'Post Type Singular Name', 'edvgraz' ),
		'menu_name'             => __( 'Testimonials', 'edvgraz' ),
		'name_admin_bar'        => __( 'Testimonials', 'edvgraz' ),
		'archives'              => __( 'Testimonials Archives', 'edvgraz' ),
		'attributes'            => __( 'Testimonials Attributes', 'edvgraz' ),
		'parent_item_colon'     => __( 'Parent Item:', 'edvgraz' ),
		'all_items'             => __( 'Alle Testimonials', 'edvgraz' ),
		'add_new_item'          => __( 'Testimonial hinzufügen', 'edvgraz' ),
		'add_new'               => __( 'Neues Testimonial', 'edvgraz' ),
		'new_item'              => __( 'New Item', 'edvgraz' ),
		'edit_item'             => __( 'Edit Item', 'edvgraz' ),
		'update_item'           => __( 'Update Item', 'edvgraz' ),
		'view_item'             => __( 'View Item', 'edvgraz' ),
		'view_items'            => __( 'View Items', 'edvgraz' ),
		'search_items'          => __( 'Search Item', 'edvgraz' ),
		'not_found'             => __( 'Not found', 'edvgraz' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'edvgraz' ),
		'featured_image'        => __( 'Featured Image', 'edvgraz' ),
		'set_featured_image'    => __( 'Set featured image', 'edvgraz' ),
		'remove_featured_image' => __( 'Remove featured image', 'edvgraz' ),
		'use_featured_image'    => __( 'Use as featured image', 'edvgraz' ),
		'insert_into_item'      => __( 'Insert into item', 'edvgraz' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'edvgraz' ),
		'items_list'            => __( 'Items list', 'edvgraz' ),
		'items_list_navigation' => __( 'Items list navigation', 'edvgraz' ),
		'filter_items_list'     => __( 'Filter items list', 'edvgraz' ),
	);
	$args = array(
		'label'                 => __( 'Testimonial', 'edvgraz' ),
        'labels'                => $labels,
        'taxonomies'            => array('testimonial_cat'),
		'supports'              => array( 'title'),
		'hierarchical'          => false,
		'public'                => false,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 10,
		'menu_icon'             => 'dashicons-id',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => false,
		'can_export'            => true,
		'has_archive'           => false,
		'exclude_from_search'   => true,
		'publicly_queryable'    => false,
		'capability_type'       => 'post',
		'show_in_rest'          => false,
	);
	register_post_type( 'testimonials', $args );

}
add_action( 'init', 'custom_post_testimonials', 0 );

/*Add Taxonomies (Kategorien) to my Testimonials Custom Post Type */
// Register Custom Taxonomy
function testimonial_cat() {

	$labels = array(
		'name'                       => _x( 'Kategorie', 'Taxonomy General Name', 'edvgraz' ),
		'singular_name'              => _x( 'Kategorie', 'Taxonomy Singular Name', 'edvgraz' ),
		'menu_name'                  => __( 'Kategorie', 'edvgraz' ),
		'all_items'                  => __( 'All Items', 'edvgraz' ),
		'parent_item'                => __( 'Parent Item', 'edvgraz' ),
		'parent_item_colon'          => __( 'Parent Item:', 'edvgraz' ),
		'new_item_name'              => __( 'New Item Name', 'edvgraz' ),
		'add_new_item'               => __( 'Add New Item', 'edvgraz' ),
		'edit_item'                  => __( 'Edit Item', 'edvgraz' ),
		'update_item'                => __( 'Update Item', 'edvgraz' ),
		'view_item'                  => __( 'View Item', 'edvgraz' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'edvgraz' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'edvgraz' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'edvgraz' ),
		'popular_items'              => __( 'Popular Items', 'edvgraz' ),
		'search_items'               => __( 'Search Items', 'edvgraz' ),
		'not_found'                  => __( 'Not Found', 'edvgraz' ),
		'no_terms'                   => __( 'No items', 'edvgraz' ),
		'items_list'                 => __( 'Items list', 'edvgraz' ),
		'items_list_navigation'      => __( 'Items list navigation', 'edvgraz' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => false,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'testimonial_cat', array( 'testimonials' ), $args );

}
add_action( 'init', 'testimonial_cat', 0 );


if (function_exists('acf_add_options_page')) {
    //ACF Option Page erstellen
    acf_add_options_page(array(
        'page_title' => 'Theme Einstellungen',
        'menu_title' => 'Theme Einstellungen',
        'menu_slug' => 'theme einstellungen',
        'capability' => 'edit_pages',
        'position' => '100',
        'redirect' => true,
        'update_button' => __('Übernehmen', 'edvgraz'),
        'icon_url' => 'dashicons-admin-customizer',
        'updated_message' => __('Einstellungen wurden gespeichert', 'edvgraz'),
    ));
    //Gutenberg Block Elemente hinzufügen
    //Hinzufügen von Gutenberg-Block-Kategorie
    add_filter('block_categories', function ($categories, $post) {
        if ($post->post_type !== 'page') {
            return $categories;
        }
        return array_merge(
            array(
                array(
                    'slug' => 'edvgraz-category',
                    'title' => __('edvgraz', 'edvgraz')
                ),
            ),
            $categories
        );
    }, 10, 2);
    add_action('acf/init', 'my_acf_init');
    function my_acf_init()
    {
        // check function exists
        if (function_exists('acf_register_block')) {
            acf_register_block(array(
                'name'                => 'heading',
                'title'                => __('heading'),
                'description'        => __('Block für Ueberschrift und Unterueberschrift'),
                'render_template'    => 'template-parts/section-heading.php',
                'category'            => 'edvgraz-category',
                'icon'                => 'align-wide',
                'keywords'            => array('Heading', 'Ueberschrift'),
                'post_types'          => array('posts', 'page'),
                'align'             => false,
                'mode'              => false
            ));
            acf_register_block(array(
                'name'                => 'btn_edvgraz',
                'title'                => __('Button'),
                'description'        => __('Button bestehend aus Icon, Text und Link'),
                'render_template'    => 'template-parts/button.php',
                'category'            => 'edvgraz-category',
                'icon'                => 'button',
                'keywords'            => array('Button', 'Button'),
                'post_types'          => array('posts', 'page'),
                'align'             => false,
                'mode'              => false
            ));
            acf_register_block(array(
                'name'                => 'edvgraz_benefits',
                'title'                => __('Vorteile'),
                'description'        => __('Liste der Vorteile bei edvgraz'),
                'render_template'    => 'template-parts/benefits.php',
                'category'            => 'edvgraz-category',
                'icon'                => 'thumbs-up',
                'keywords'            => array('Benefits', 'Vorteile'),
                'post_types'          => array('posts', 'page'),
                'align'             => false,
                'mode'              => false
            ));
            acf_register_block(array(
                'name'                => 'testimonials_all_block',
                'title'                => __('Testimonials Alle'),
                'description'        => __('Zeigt in einem Slider mit allen Testimonials an'),
                'render_template'    => 'template-parts/testimonials.php',
                'category'            => 'edvgraz-category',
                'icon'                => 'admin-users',
                'keywords'            => array('Testimonials', 'Testimonials'),
                'post_types'          => array('posts', 'page'),
                'align'             => false,
                //'mode'              => false
            ));
            acf_register_block(array(
                'name'                => 'testimonials_grafik_block',
                'title'                => __('Testimonials Grafik'),
                'description'        => __('Zeigt in einem Slider Testimonials Grafik an'),
                'render_template'    => 'template-parts/testimonials_grafik.php',
                'category'            => 'edvgraz-category',
                'icon'                => 'admin-users',
                'keywords'            => array('Testimonials', 'Testimonials'),
                'post_types'          => array('posts', 'page'),
                'align'             => false,
                //'mode'              => false
            ));
            acf_register_block(array(
                'name'                => 'testimonials_office_block',
                'title'                => __('Testimonials Office'),
                'description'        => __('Zeigt in einem Slider Testimonials Office an'),
                'render_template'    => 'template-parts/testimonials_office.php',
                'category'            => 'edvgraz-category',
                'icon'                => 'admin-users',
                'keywords'            => array('Testimonials', 'Testimonials'),
                'post_types'          => array('posts', 'page'),
                'align'             => false,
                //'mode'              => false
            ));
            acf_register_block(array(
                'name'                => 'testimonials_coding_block',
                'title'                => __('Testimonials Coding'),
                'description'        => __('Zeigt in einem Slider Testimonials Coding an'),
                'render_template'    => 'template-parts/testimonials_coding.php',
                'category'            => 'edvgraz-category',
                'icon'                => 'admin-users',
                'keywords'            => array('Testimonials', 'Testimonials'),
                'post_types'          => array('posts', 'page'),
                'align'             => false,
                //'mode'              => false
            ));
            acf_register_block(array(
                'name'                => 'testimonials_socialmedia_block',
                'title'                => __('Testimonials SocialMedia'),
                'description'        => __('Zeigt in einem Slider Testimonials SocialMedia an'),
                'render_template'    => 'template-parts/testimonials_smm.php',
                'category'            => 'edvgraz-category',
                'icon'                => 'admin-users',
                'keywords'            => array('Testimonials', 'Testimonials'),
                'post_types'          => array('posts', 'page'),
                'align'             => false,
                //'mode'              => false
            ));
            acf_register_block(array(
                'name'                => 'coachings',
                'title'                => __('Coachings'),
                'description'        => __('Übersicht der angebonenen Coachings'),
                'render_template'    => 'template-parts/coachings.php',
                'category'            => 'edvgraz-category',
                'icon'                => 'table-col-after',
                'keywords'            => array('Coachings', 'Coachings'),
                'post_types'          => array('posts', 'page'),
                'align'             => false,
                //'mode'              => false
            ));
            acf_register_block(array(
                'name'                => 'coaching_detail',
                'title'                => __('Coaching Kurzbeschreibung'),
                'description'        => __('Detailbeschreibung der jeweiligen Coachings'),
                'render_template'    => 'template-parts/coaching_detail.php',
                'category'            => 'edvgraz-category',
                'icon'                => 'table-row-before',
                'keywords'            => array('Datail', 'Coachings-Detail'),
                'post_types'          => array('posts', 'page'),
                'align'             => false,
                //'mode'              => false
            ));
            acf_register_block(array(
                'name'                => 'teaser_coachings',
                'title'                => __('Coaching Kathegorien Teaser'),
                'description'        => __('Coachingkathegorien'),
                'render_template'    => 'template-parts/coaching_teaser.php',
                'category'            => 'edvgraz-category',
                'icon'                => 'table-row-before',
                'keywords'            => array('Teaser', 'Coachings-Teaser'),
                'post_types'          => array('posts', 'page'),
                'align'             => false,
                //'mode'              => false
            ));
            acf_register_block(array(
                'name'                => 'tabs_customers',
                'title'                => __('Für wen coachen wir'),
                'description'        => __('Coachingkathegorien'),
                'render_template'    => 'template-parts/tabs.php',
                'category'            => 'edvgraz-category',
                'icon'                => 'table-row-after',
                'keywords'            => array('tabs', 'Tabs-Customers'),
                'post_types'          => array('posts', 'page'),
                'align'             => false,
                //'mode'              => false
            ));
        }
    }
    require_once(get_template_directory() . '/acf/fields.php');
} else {
    //Backend-Fehlermeldung, wenn ACF-Pro nicht installiert ist.
    add_action('admin_notices', function () { ?>
        <div class="error notice">
            <p> <?php _e('Bitte ACF-Pro Version installieren um alle Theme Funktionen nutzen zu können', 'wifi'); ?></p>
        </div>
<?php
    });
}

add_action('widgets_init', function () { //Sidebar für Widgets registrieren und benennen.
    register_sidebar(array(
        'name' => __('Sidebar für Beitrags-Detailseiten', 'edvgraz'),
        'id' => 'sidebar_posts',
        'description' => __('Diese Widgets werden nur auf den Beitrags-Detailseiten angezeigt', 'edvgraz'),
        'before_widget' => '<div class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="widget-title"><span>',
        'after_title' => '</span></h4>'
    ));
    unregister_widget('WP_Widget_Media_Audio');
    unregister_widget('WP_Widget_Media_Image');
    unregister_widget('WP_Widget_Media_Video');
    unregister_widget('WP_Widget_Media_Gallery');
});

 
function load_custom_scripts() {
    wp_enqueue_script('jquery-ui-core');// enqueue jQuery UI Core
    wp_enqueue_script('jquery-ui-tabs');// enqueue jQuery UI Tabs
}
 
add_action( 'wp_enqueue_scripts', 'load_custom_scripts' );
 