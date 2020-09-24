<?php
//TODO: Weshalb die Klassen und ID Variablen
$heading = get_field('section_heading');
$subHeading = get_field('section_subheading');
if (!empty($heading)) : ?>
    <div class="heading-content small">
        <h2 class="section-title"> <?php _e($heading, 'edvgraz');?></h2>
        <span class="sub-title"><?php _e($subHeading, 'edvgraz');?></span>
    </div>
<?php endif; ?>