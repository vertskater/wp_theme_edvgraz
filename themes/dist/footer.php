<aside id="kontakt" class="container animate fade-in-up">
    <div class="heading-content small">
        <h2 class="section-title"><?php _e('Kontakt', 'edvgraz'); ?></h2>
        <span class="sub-title"><?php _e('Wir sind persönlich für Sie da', 'edvgraz'); ?></span>
    </div>
    <?php
    $phone = get_field('phone', 'option');
    $adress = get_field('adress', 'option');
    $mail = get_field('mail', 'option');
    $open = get_field('open', 'option');
    if (!empty($phone)) : ?>
        <dl class="contact-info">
            <dt>
                <span class="icon-phone" aria-hidden="true"></span>
                <span class="screen-reader-text"><?php _e('Telefon', 'edvgraz'); ?></span>
            </dt>
            <dd>
                <a href="<?php echo 'tel: ' . preg_replace('/[^\+\d]+/', '', $phone); ?>"><?php echo $phone; ?></a>
            </dd>
        <?php endif;
    if (!empty($adress)) :
        ?>
            <dt>
                <span class="icon-map2" aria-hidden="true"></span>
                <span class="screen-reader-text"><?php _e('Adresse', 'edvgraz'); ?></span>
            </dt>
            <dd>
                <a href="https://www.google.com/maps/place/Kernstockgasse+22,+8020+Graz/@47.0699228,15.4262908,17z/data=!3m1!4b1!4m5!3m4!1s0x476e357702b82543:0x3d6e4ef85878ee70!8m2!3d47.0699228!4d15.4284795" target="_blank"><?php echo $adress; ?></a>
            </dd>
        <?php endif;
    if (!empty($mail)) :
        ?>
            <dt>
                <span class="icon-envelop" aria-hidden="true"></span>
                <span class="screen-reader-text"><?php _e('E-Mail', 'edvgraz'); ?></span>
            </dt>
            <dd>
                <a href="<?php echo antispambot('mailto:' . $mail); ?>"><?php echo antispambot($mail); ?></a>
            </dd>
        <?php endif;
    if (!empty($open)) :
        ?>
            <dt>
                <span class="icon-stopwatch" aria-hidden="true"></span>
                <span class="screen-reader-text"><?php _e('Öffnungszeiten', 'edvgraz'); ?></span>
            </dt>
            <dd>
                <?php echo $open; ?>
            </dd>
        </dl>
    <?php endif; ?>
    <?php if (!is_page_template('booking.php')) : ?>
        <?php if (get_field('form_footer', 'option')) : ?>
            <div class="form-wrapper animate fade-in">
                <?php echo do_shortcode(get_field('form_footer', 'option')); ?>
            </div>
        <?php endif; ?>
    <?php endif; ?>
</aside>
<footer id="page-footer" class="container">
    <div class="columns">
        <div class="col-3 animate fade-in-up">
            <ul class="social-links">
                <li>
                    <a href="https://www.facebook.com/" target="_blank" rel="nofollow">
                        <span class="icon-facebook2" aria-hidden="true"></span>
                        <span class="screen-reader-text">Folge uns auf Facebook</span>
                    </a>
                </li>
                <li>
                    <a href="https://www.instagram.com/" target="_blank" rel="nofollow">
                        <span class="icon-instagram" aria-hidden="true"></span>
                        <span class="screen-reader-text">Folge uns auf Instagram</span>
                    </a>
                </li>
                <li>
                    <a href="https://www.youtube.com/" target="_blank" rel="nofollow">
                        <span class="icon-youtube" aria-hidden="true"></span>
                        <span class="screen-reader-text">Folge uns auf YouTube</span>
                    </a>
                </li>
            </ul>
        </div>
        <div class="col-3 animate fade-in-up">
            <span class="copyright">&copy; |edvgraz|</span>
        </div>
        <div class="col-3 animate fade-in-up">
            <nav id="footer-nav">
                <?php wp_nav_menu(array(
                    'theme_location' => 'footer',
                    'container' => false,
                    'menu_class' => 'nav-menu',
                    'depth' => 1,
                    'fallback_cb' => false
                )); ?>
            </nav>
        </div>
    </div>
</footer>
<?php include(locate_template('template-parts/to-top.php')); ?>
<?php wp_footer(); ?>
</body>

</html>