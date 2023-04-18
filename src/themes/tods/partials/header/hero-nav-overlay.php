<header class="fixed-top">
    <section class="notice-bar bg-primary py-50">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 text-center text-white">
                    IMPORTANT INFORMATION
                </div><!-- col -->
            </div><!-- row -->
        </div><!-- container -->
    </section>
    <nav class="navbar navbar-expand-lg bg-body-tertiary py-0">
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

            <a href="<?php echo esc_url(home_url('/contact-us')); ?>" class="btn btn-primary d-none d-lg-block">Contact Us</a>

        </div>
    </nav>
</header>