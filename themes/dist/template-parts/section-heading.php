<?php
$id = 'block!-' . $block['id'];
$className = 'heading-content small';

if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}
if (!empty($block['className'])) {
    $className .= ' ' . $block['className'];
}
$heading = get_field('section_heading');
$subHeading = get_field('section_subheading');
if (!empty($heading)) : ?>
</section>
<section class="container animate fade-in-up">
    <header id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className);?>">
        <h2 class="section-title"> <?php _e($heading, 'edvgraz');?></h2>
        <span class="sub-title"><?php _e($subHeading, 'edvgraz');?></span>
    </header>
<?php endif; ?>