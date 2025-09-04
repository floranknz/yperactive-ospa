<footer>
        <div class="container flex flex-col gap-32 md:flex-row md:gap-24">
            <div class="md:w-2/12">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/ospa.svg" alt="O'Spa" class="w-[80px] mb-16" />
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/spabysothys.png" alt="Spa by Sothys" class="w-[100px]" />
                <div class="info text-[14px] mt-24 pt-16 border-t border-soft-white-400">
                    <p>28 Avenue de Pythagore, 33700 Mérignac</p>
                    <a href="tel:000000000">05 19 08 10 10</a>
                </div>
            </div>
            <div class="md:w-3/12">
                <span class="pretitle-2">À propos</span>
                <?php
                wp_nav_menu( array(
                    'theme_location' => 'footer_first',
                    'container' => '',
                    'items_wrap' => '<ul>%3$s</ul>',
                ) );
                ?>
            </div>
            <div class="md:w-3/12 list">
                <span class="pretitle-2">Services</span>
                <?php
                wp_nav_menu( array(
                    'theme_location' => 'footer_second',
                    'container' => '',
                    'items_wrap' => '<ul>%3$s</ul>',
                ) );
                ?>
            </div>
            <div class="md:w-4/12">
                <span class="pretitle-2"><?php echo get_theme_mod('newsletter_footer_title', 'Suivez-nous'); ?></span>
                <div class="newsletter-content">
                    <?php 
                    $content = get_theme_mod('newsletter_footer_content', 'Recevez nos dernières actualités en vous inscrivant à la newsletter O\'Spa.');
                    // Process do_shortcode() calls in the content
                    $content = preg_replace_callback('/do_shortcode\([\'"]([^\'"]+)[\'"]\)/', function($matches) {
                        return do_shortcode($matches[1]);
                    }, $content);
                    // Allow HTML markup and shortcodes
                    echo do_shortcode($content);
                    ?>
                </div>
                <div class="rs flex gap-8">
                <a href="https://www.facebook.com/profile.php?id=61559599148033" target="_blank"><i class="bx bx-sm bxl-facebook-square"></i></a>
                <a href="https://www.instagram.com/ospacarewellness/" target="_blank"><i class="bx bx-sm bxl-instagram"></i></a>
                <a href="https://www.linkedin.com/company/o-spa-care-wellness-spa-by-sothys" target="_blank"><i class="bx bx-sm bxl-linkedin"></i></a>
                </div>
            </div>
        </div>
        <div class="legal-footer">
            <span><a href="/legal">Mentions légales</a></span>
            <span class="dash"></span>
            <span><a href="/press">Presse</a></span>
            <span class="dash"></span>
            <span>Site internet réalisé par <a href="https://yperactive.com" target="_blank">Yperactive</a></span>
        </div>
    </footer>
    <?php wp_footer(); ?>
</body>
</html>
