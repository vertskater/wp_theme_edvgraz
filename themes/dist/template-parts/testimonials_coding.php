<?php
// $categorys_test = get_the_terms(get_the_ID(),'testimonial_cat');
// $category = $categorys_test[0];
// $cat_name = $category->name; 
// query_posts(array(
//     'post_type' => 'Testimonials',
//     'posts_per_page' => 6,
//     'orderby' => 'rand',
// ));
$args = array(
    'post_type' => 'testimonials',
    'tax_query' => array(
        array(
            'taxonomy' => 'testimonial_cat',
            'field' => 'slug',
            'terms' => array( 'coding' )
             )
    )
);
query_posts( $args );


if (have_posts()) : ?>
        <section id="testimonials" class="animate fade-in-up">
            <div class="owl-carousel owl-theme">
                <?php while (have_posts()) : ?>
                    <?php the_post(); ?>
                    <div class="item testimonial-item">
                        <figure class="testimonial-image">
                            <?php echo wp_get_attachment_image(get_field('pic', get_the_ID())); ?>
                        </figure>
                        <blockquote class="testimonial-content">
                            <?php the_field('text', get_the_ID()); ?>
                            <?php the_title('<cite>', '</cite>'); ?>  
                        </blockquote>
                    </div>
                <?php endwhile; ?>
            </div>
        </section>
<?php
    wp_enqueue_script('owl-script');
endif;
wp_reset_query();
?>