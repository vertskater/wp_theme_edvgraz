<?php
$category = get_field('testimonial_cat');

query_posts(array(
    'post_type' => 'Testimonials',
    'posts_per_page' => 6,
    'orderby' => 'rand'
));
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