<footer>
    <section class="contact-form pt-3 pb-2" id="contact">
        <div class="container">
            <div class="row g-lg-2">
                <div class="col-lg-7">
                    <?php the_field('contact_form_text', 'option');?>
                </div>
                <div class="col-lg-5">
                    <?php echo do_shortcode('[gravityform id="1" title="false" description="false" ajax="true" tabindex="2" ]'); ?>
                </div>
            </div>
        </div>
    </section>
    <section class="bg-secondary">
        <div class="container">
            <div class="row text-white">
                <div class="col border-bottom border-white text-center">
                    <a href="<?php echo esc_url(home_url('/')); ?>">
                        <img src="<?php bloginfo('template_url'); ?>/images/logo-white.svg"
                             alt="<?php bloginfo('name'); ?> - Logo"
                             class="img-fluid mx-auto mt-1">
                        <span class="sr-only"><?php bloginfo('name'); ?></span>
                    </a>
                </div><!-- col -->
            </div><!-- row -->
            <nav class="navbar navbar-expand-lg justify-content-center pt-2 pb-1 py-lg-2">

                <?php wp_nav_menu([
                    'theme_location' => 'primary',
                    'container_class' => '',
                    'container_id' => 'navbarFooter',
                    'menu_class' => 'navbar-nav mx-auto',
                    'fallback_cb' => '',
                    'menu_id' => 'main-footer',
                    'walker' => new understrap_WP_Bootstrap_Navwalker(),
                ]); ?>
            </nav>
        </div><!-- container -->
    </section>
    <section class="bg-primary small py-1">
        <div class="container">
            <div class="row text-white">
                <div class="col-lg-6 text-center text-lg-start">
                    <p class="mb-0">&copy; <?php echo Date('Y') . ' ' . get_bloginfo('name'); ?></p>
                </div>
                <div class="col-lg-6 text-center text-lg-end">
                    <p class="mb-0">Designed, Developed and Hosted by <a href="https://sproing.ca" target="_blank" class="text-secondary">Sproing&nbsp;Creative</a>
                    </p>
                </div>
            </div>
        </div>
    </section>
</footer>

<?php wp_footer(); ?>

</body>

</html>