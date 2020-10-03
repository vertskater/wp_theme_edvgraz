<?php /* Template Name: Kursbuchen */

get_header();
?>
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
        <div id="tabs">
            <ul>
                <li><a href="#tab-1"><span>First Tab</span></a></li>
                <li><a href="#tab-2"><span>Second Tab</span></a></li>
                <li><a href="#tab-3"><span>Third Tab</span></a></li>
                <li><a href="#tab-4"><span>fourth Tab</span></a></li>
            </ul>
            <div id="tab-1">
                <p> your first tab content goes here
            </div>
            <div id="tab-2">
                <p> your second tab content goes here
            </div>
            <div id="tab-3">
                <p> your third tab content goes here
            </div>
            <div id="tab-4">
                <p> your fourth tab content goes here
            </div>
        </div>
    </section>
</main>
<?php get_footer(); ?>