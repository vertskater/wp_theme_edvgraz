<?php
$id = 'block!-' . $block['id'];
$className = 'columns animate fade-in-up';

if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

if (!empty($block['className'])) {
    $className .= ' ' . $block['className'];
}
$last_icon = get_field('last_icon');
$last_heading = get_field('last_heading');
$last_text = get_field('last_description');
$coaching_group = get_field('coaching_list');
$color = get_field('colors_cd_single');
$color_class = '';

if ($color == 'Office-grün') {
    $color_class = 'office';
} elseif ($color == 'Grafik-rot') {
    $color_class = 'grafik';
} elseif ($color == 'Coding-gold') {
    $color_class = 'coding';
} elseif ($color == 'SocialMedia-blau') {
    $color_class = 'smm';
}
$className .= ' ' . $color_class;


if (!empty($coaching_group)) : ?>
    <div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <?php foreach ($coaching_group as $item) : ?>
        <div class="col-3">
            <dl class="contact-info">
                <dt>
                    <span class="<?php echo $item['icon_single_1'];?>" aria-hidden="true"></span>
                    <span class="screen-reader-text">Telefon</span>
                </dt>
                <dd>
                    <h3><?php echo $item['heading_single_1'];?></h3>
                    <span><?php echo $item['discription_single_1'] ;?></span>
                </dd>
                <dt>
                    <span class="<?php echo $item['icon_single_2'];?>" aria-hidden="true"></span>
                    <span class="screen-reader-text">Adresse</span>
                </dt>
                <dd>
                    <h3><?php echo $item['heading_single_2'];?></h3>
                    <span><?php echo $item['discription_single_2'] ;?></span>
                </dd>
                <dt>
                    <span class="<?php echo $item['icon_single_3'];?>" aria-hidden="true"></span>
                    <span class="screen-reader-text">E-Mail</span>
                </dt>
                <dd>
                    <h3><?php echo $item['heading_single_3'];?></h3>
                    <span><?php echo $item['discription_single_3'] ;?></span>
                </dd>
            </dl>
        </div>
    <?php endforeach;?>
        <div class="col-3">
            <dl class="contact-info">
                <dt>
                    <span class="<?php echo $last_icon;?>" aria-hidden="true"></span>
                    <span class="screen-reader-text"><?php _e('Newspaper', 'edvgraz');?></span>
                </dt>
                <dd>
                    <h3><?php echo $last_heading;?></h3>
                    <span><?php echo $last_text;?></span>
                </dd>
            </dl>
        </div>
        <div class="btn-wrapper">
            <a href="#kontakt" class="btn">
                <span class="btn-header-icon icon-books"></span>
                <span class="btn-header-text">Coaching Buchen</span>
            </a>
        </div>
    </div>

<?php endif; ?>