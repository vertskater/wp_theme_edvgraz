<aside id="kontakt" class="container animate fade-in-up">
    <div class="heading-content small">
        <h2 class="section-title">Kontakt</h2>
        <span class="sub-title">Wir sind persönlich für Sie da</span>
    </div>
    <dl class="contact-info">
        <dt>
            <span class="icon-phone" aria-hidden="true"></span>
            <span class="screen-reader-text">Telefon</span>
        </dt>
        <dd>
            <a href="tel:+43316215445">+43 316 215 445</a>
        </dd>
        <dt>
            <span class="icon-map2" aria-hidden="true"></span>
            <span class="screen-reader-text">Adresse</span>
        </dt>
        <dd>
            Kernstockgasse 22<br>
            8020 Graz
        </dd>
        <dt>
            <span class="icon-envelop" aria-hidden="true"></span>
            <span class="screen-reader-text">E-Mail</span>
        </dt>
        <dd>
            <a href="mailto:office@edvgraz.at">office@edvgraz.at</a>
        </dd>
        <dt>
            <span class="icon-stopwatch" aria-hidden="true"></span>
            <span class="screen-reader-text">E-Mail</span>
        </dt>
        <dd>
            Mo - Fr <br> 08:00 bis 13:00

        </dd>
    </dl>
    <div class="form-wrapper">
        <form action="#" method="get">
            <label for="name" class="screen-reader-text">Vorname*</label>
            <input type="text" id="vorname" name="name" placeholder="Vorname *" required>
            <label for="name" class="screen-reader-text">Nachname*</label>
            <input type="text" id="nachname" name="name" placeholder="Nachname *" required>
            <label for="email" class="screen-reader-text">E-Mail*</label>
            <input type="email" id="email" name="email" placeholder="E-Mail *" required>
            <label for="message" class="screen-reader-text">Nachricht*</label>
            <textarea id="message" name="message" placeholder="Nachricht *" required></textarea>
            <div class="forms-actions btn-wrapper">
                <button href="#" class="btn">
                    <span class="btn-header-icon icon-envelop"></span>
                    <span class="btn-header-text">Senden</span>
                </button>
            </div>
        </form>
    </div>
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
<?php wp_footer(); ?>
</body>

</html>