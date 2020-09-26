<?php
$id = 'block!-' . $block['id'];
$className = 'button-edvgraz';

if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

if (!empty($block['className'])) {
    $className .= ' ' . $block['className'];
}
$btn_link = get_field('btn_link');
$btn_icon = get_field('btn_icon');
$btn_text = get_field('btn_text');

if (!empty($btn_text)) : ?>
    <div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
        <a href="<?php echo $btn_link['url']; ?>" class="btn">
            <span class="btn-header-icon btn-classic <?php echo $btn_icon; ?>"></span>
            <span class="btn-header-text btn-classic"><?php _e($btn_text, 'edvgraz'); ?></span>
        </a>
    </div>
<?php endif; ?>