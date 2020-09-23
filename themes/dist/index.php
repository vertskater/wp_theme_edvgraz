<?php get_header(); ?>
<main id="content">
    <section class="container animate fade-in-up">
        <?php
        if (have_posts()) {
            while (have_posts()) {
                the_post();
                the_content();
            }
        }
        ?>
    </section>
</main>
<?php get_footer(); ?>