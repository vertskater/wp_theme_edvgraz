<?php get_header(); ?>
<main id="content">
    <section class="container">
        <!-- <h1><?php
                    // if (is_category()) {
                    //     single_cat_title();

                    // } else {
                    //      the_archive_title();
                    //  }
                    ?></h1> -->
        <?php the_archive_description('<p>', '</p>') ?>

        <?php include(locate_template('template-parts/nav-category.php'));


        // query_posts(array(
        //     'post_type' => 'post',
        //     'posts_per_page' => 2,
        //     'paged' => $paged
        // ))
        ?>

        <?php
        if (have_posts()) : ?>
            <div class="columns">
                <?php while (have_posts()) : ?>
                    <?php the_post(); ?>
                    <div class="col-2">
                        <article class="blog-item animate fade-in-right">
                            <a href="<?php the_permalink(); ?>">
                                <?php
                                if (has_post_thumbnail()) {
                                    the_post_thumbnail('post-image');
                                } else {
                                    echo wp_get_attachment_image(get_field('placeholder_posts', 'options'), 'post-image');
                                }
                                ?>
                            </a>
                            <div class="blog-description">
                                <time class="meta" datetime="<?php the_time('Y-m-d'); ?>">
                                    <span class="icon-stopwatch" aria-hidden="true"></span>
                                    <?php the_time('d.m.Y'); ?>
                                </time>
                                <span class="meta categories">
                                    <span class="icon-newspaper"></span>
                                    <?php the_category(', '); ?>
                                </span>
                                <h2 class="blog-title">
                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                </h2>
                            </div>
                        </article>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php else : ?>
            <h2><?php _e('Es wurden keine Beiträge gefunden', 'edvgraz') ?></h2>
        <?php endif ?>
        <nav class="pagination">
            <?php 
            global $wp_query;
 
            $big = 999999999; // need an unlikely integer
             
            echo paginate_links( array(
                'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
                'format' => '?paged=%#%',
                'current' => max( 1, get_query_var('paged') ),
                'total' => $wp_query->max_num_pages
            ) );
            ?>
        </nav>
    </section>
</main>
<?php //wp_reset_query();?>
<?php get_footer(); ?>