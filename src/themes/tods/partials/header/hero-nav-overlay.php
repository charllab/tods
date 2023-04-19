<header class="position-absolute w-100 z-index-500">
    <?php
    $notice = get_field('notice_bar', 'option');
    if($notice):?>
    <section class="notice-bar bg-primary pt-50">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 text-center text-white">
                    <?php echo $notice; ?>
                </div><!-- col -->
            </div><!-- row -->
        </div><!-- container -->
    </section>
    <?php endif; ?>
    <nav class="navbar navbar-expand-lg py-0">
        <div class="container">
            <div class="nav-logo">
                <a href="<?php echo esc_url(home_url('/')); ?>">
                    <img src="<?php bloginfo('template_url'); ?>/images/logo.svg"
                         alt="<?php bloginfo('name'); ?> - Logo"
                         class="img-fluid">
                    <span class="sr-only"><?php bloginfo('name'); ?></span>
                </a>
            </div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

                <?php wp_nav_menu([
                    'theme_location' => 'primary',
                    'container_class' => 'collapse navbar-collapse',
                    'container_id' => 'navbarNav',
                    'menu_class' => 'navbar-nav mx-auto',
                    'fallback_cb' => '',
                    'menu_id' => 'main-menu',
                    'walker' => new understrap_WP_Bootstrap_Navwalker(),
                ]); ?>

            <a href="#contact" class="btn btn-primary d-none d-lg-block js-scrollable-anchor">Contact Us</a>

        </div>
    </nav>
</header>