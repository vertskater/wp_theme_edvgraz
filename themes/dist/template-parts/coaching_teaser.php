<?php
$id = 'block!-' . $block['id'];
$className = 'columns animate zoom-in';

if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

if (!empty($block['className'])) {
    $className .= ' ' . $block['className'];
}
$teaser1 = get_field('coaching_teaser1');
$teaser2 = get_field('coaching_teaser2');
$color_class = '';


if (!empty($teaser1) && !empty($teaser2)) : ?>
<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <?php foreach ($teaser1 as $item) : 
        if($item['teaser_color'] == 'Office-grün'){
            $color_class = 'office';
        } elseif ($item['teaser_color'] == 'Grafik-rot') {
            $color_class = 'grafik';
        } elseif ($item['teaser_color'] == 'Coding-gold') {
            $color_class = 'coding';
        } elseif ($item['teaser_color'] == 'SocialMedia-blau') {
            $color_class = 'smm';
        }

        ?>
    <div class="col-2">
        <div class="service-category <?php echo $color_class;?>">
            <span class="<?php echo $item['teaser_icon'];?>" aria-hidden="true"></span>
            <h3 class="service-title"><?php echo $item['teaser_heading'];?></h3>
            <p class="service-description"><?php echo $item['teaser_description'];?></p>
            <a href="<?php echo $item['teaser_link'];?>" class="category-link <?php echo $color_class;?>"></a>
        </div>
    </div>
    <?php endforeach;?>
</div>
<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <?php foreach ($teaser2 as $item) : 
        if($item['teaser_color'] == 'Office-grün'){
            $color_class = 'office';
        } elseif ($item['teaser_color'] == 'Grafik-rot') {
            $color_class = 'grafik';
        } elseif ($item['teaser_color'] == 'Coding-gold') {
            $color_class = 'coding';
        } elseif ($item['teaser_color'] == 'SocialMedia-blau') {
            $color_class = 'smm';
        }
        ?>
        <div class="col-2">
        <div class="service-category <?php echo $color_class;?>">
            <span class="<?php echo $item['teaser_icon'];?>" aria-hidden="true"></span>
            <h3 class="service-title"><?php echo $item['teaser_heading'];?></h3>
            <p class="service-description"><?php echo $item['teaser_description'];?></p>
            <a href="<?php echo $item['teaser_link'];?>" class="category-link <?php echo $color_class;?>"></a>
        </div>
    </div>
    <?php endforeach;?>
</div>

<?php endif;?>