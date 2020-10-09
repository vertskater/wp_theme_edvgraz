<?php
$id = 'block!-' . $block['id'];
$className = 'tabs animate zoom-in';

if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

if (!empty($block['className'])) {
    $className .= ' ' . $block['className'];
}
$tabs = get_field('tabs');
$i = 1;
//if (!empty($tabs)) : 
?>
<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <ul>
        <?php foreach ($tabs as $tab) :
            if ($i > 4) {
                $i = 1;
            }
            $link_text = '#tab-' . $i;
        ?>
            <li><a href="<?php echo $link_text; ?>"><span><?php echo $tab['tab_heading']; ?></span></a></li>
        <?php $i = $i + 1;
        endforeach; ?>
    </ul>
    <?php foreach ($tabs as $tab) :
        if ($i > 4) {
            $i = 1;
        }
        $id_text = 'tab-' . $i;
    ?>
        <div id="<?php echo $id_text; ?>">
            <div class="columns">
                <div class="col-2">
                    <h2><?php echo $tab['tab_content_heading']; ?></h2>
                    <p><?php echo $tab['tab_text_content']; ?></p>
                </div>
                <div class="col-2">
                    <span class="<?php echo $tab['tab_icon'];?>"></span>
                </div>
            </div>
        </div>

    <?php
        $i = $i + 1;
    endforeach; ?>
</div>
<?php //endif; 
?>