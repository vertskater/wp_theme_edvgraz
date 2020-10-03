<?php get_header();
$classSidebar = 'no-sidebar'; //Klasse austauschen um 
if (is_active_sidebar('sidebar_posts')) {
    $classSidebar = 'has-sidebar';
}
?>

<div id="content" class="container">
    <main class="main-content <?php echo $classSidebar ?> animate fade-in-up">
        <div class="post-meta">
            <time class="meta" datetime="<?php the_time('Y-m-d'); ?>">
                <span class="icon-stopwatch" aria-hidden="true"></span>
                <?php the_time('d.m.Y'); ?>
            </time>
            <span class="meta categories">
                <span class="icon-newspaper"></span>
                <?php the_category(', '); ?>
            </span>
        </div>
        <?php
        if (have_posts()) {
            while (have_posts()) {
                the_post();
                the_content();
            }
        }
        ?>
        
        <nav class="post-pagination">
            <?php the_post_navigation(array(
                'prev_text' => __('vorheriger Beitrag', 'edvgraz'),
                'next_text' => __('nächster Beitrag', 'edvgraz')
            )); ?>
        </nav>
    </main>

    <?php
    if (is_active_sidebar('sidebar_posts')) : ?>
        <aside class="sidebar">
            <?php dynamic_sidebar('sidebar_posts'); ?>
        </aside> 
    <?php endif; ?>

</div>
<?php get_footer(); ?>