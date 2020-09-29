<?php
$id = 'block!-' . $block['id'];
$className = 'columns animate zoom-in';

if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

if (!empty($block['className'])) {
    $className .= ' ' . $block['className'];
}
$coachings = get_field('coachings');
$color = get_field('cd_colors');
$color_class = '';
$icon = '';
if($color == 'Office-grün'){
    $color_class = 'office-courses';
    $icon = 'icon-office_edvgraz';
}elseif($color == 'Grafik-rot'){
    $color_class = 'grafik-courses';
    $icon = 'icon-grafik_edvgraz';
}elseif($color == 'Coding-gold'){
    $color_class = 'coding-courses';
    $icon = 'icon-coding_edvgraz';
}elseif($color == 'SocialMedia-blau'){
    $color_class = 'smm-courses';
    $icon = 'icon-smm_edvgraz';
}
$className .= ' ' . $color_class;

if (!empty($coachings)) : ?>
    <div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
        <?php foreach ($coachings as $item) : ?>
            <div class="col-3">
                <div class="service-category">
                    <span class="<?php echo $item['logo_icon'];?>" aria-hidden="true"></span>
                    <h3 class="service-title"><?php echo $item['heading_coachings'];?></h3>
                    <p class="service-description"><?php echo $item['description_coachings'];?></p>
                    <div class="btn-wrapper">
                        <a href="<?php echo $item['link_coachings'];?>" class="btn">
                            <span class="btn-header-icon <?php echo $icon;?>"></span>
                            <span class="btn-header-text">Kursinfo</span>
                        </a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>


<?php endif; ?>