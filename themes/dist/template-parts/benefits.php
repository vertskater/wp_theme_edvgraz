<?php
$id = 'block!-' . $block['id'];
$className = 'columns benefits';

if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

if (!empty($block['className'])) {
    $className .= ' ' . $block['className'];
}
$benefits = get_field('benefits');

if(!empty($benefits)) : ?>
<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
<?php foreach ($benefits as $item) : ?>
    <div class="col-4">
        <span class="<?php echo $item['icons_benefits'];?>" aria-hidden="true"></span>
        <h3 class="benefits-title"><?php echo $item['heading_benefits'];?></h3>
        <p class="benefits-description"><?php echo $item['text_benefits'];?></p>
    </div>
    <?php endforeach;?>
</div>

<?php endif;?>