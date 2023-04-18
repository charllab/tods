<?php
$header = get_field('page_header');
$banner = $header['background_image'];
$header = $header['add_a_layout'];
$body = get_field('page_content');
$layouts = $body['add_a_layout_type'];
//echo '<pre>';
//var_dump($header);
//echo '</pre>';
//?>
<?php if ($header) : ?>
    <?php foreach ($header as $head) : ?>
        <?php if ($head['acf_fc_layout'] == 'hero'): ?>
            <!--is hero-->
            <section class="hero hero--tall position-relative d-flex justify-content-center align-items-center"
                     style="background: transparent url('<?php echo $banner['url']; ?>') no-repeat center; background-size: cover;">
                <div class="block__gradient-overlay position-absolute z-index-1"></div>
                <div class="container position-relative z-index-10">
                    <div class="row text-white">
                        <div class="col-12 text-center mb-2">
                            <?php echo $head['hero_content']; ?>
                        </div><!-- col -->
                    </div><!-- row -->
                    <?php
                    $optionalcontent = $head['optional_hero_sections'];
                    if ($optionalcontent) : ?>
                        <div class="row justify-content-center text-white text-uppercase">
                            <div class="col-lg-4">
                                <div
                                    class="d-flex justify-content-center justify-content-lg-end align-items-center">
                                    <i class="bi bi-calendar2-check me-1"></i>
                                    <div class="clear-out-p">
                                        <?php echo $optionalcontent['date_information']; ?>
                                    </div>
                                </div><!-- flex -->
                            </div><!-- col -->
                            <div class="col-lg-4">
                                <div
                                    class="d-flex justify-content-center justify-content-lg-start align-items-center">
                                    <i class="bi bi-geo-alt me-1"></i>
                                    <div class="clear-out-p">
                                        <?php echo $optionalcontent['location_address']; ?>
                                    </div>
                                </div><!-- flex -->
                            </div><!-- col -->
                        </div><!-- row -->
                    <?php endif; ?>
                    <?php
                    $buttons = $head['buttons'];
                    if ($buttons): ?>
                        <div class="row py-1">
                            <div class="col-12 text-center">
                                <?php foreach ($buttons as $button) :
                                    $btn = $button['button'];
                                    $target = $btn['target'];
                                    ?>
                                    <a href="<?php echo $btn['url']; ?>" <?php echo $target ? 'target="' . $target . '"' : ''; ?>
                                       class="btn btn-primary"><?php echo $btn['title']; ?></a>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    <?php endif; ?>
                </div><!-- container -->
            </section>
        <?php elseif ($head['acf_fc_layout'] == 'column'): ?>
            <!--is column-->
            <section class="hero hero--tall position-relative d-flex justify-content-center align-items-center"
                     style="background: transparent url('<?php echo $banner['url']; ?>') no-repeat center; background-size: cover;">
                <div class="block__gradient-overlay position-absolute z-index-1"></div>
                <div class="container position-relative z-index-10">
                    <div class="row text-white">
                        <div class="col-lg-6 py-1">
                            <?php echo $head['pingpong_content']; ?>
                        </div><!-- col -->
                        <div class="col-lg-6 text-center">
                            <?php
                            $colimg = $head['image']
                            ?>
                            <img src="<?php echo $colimg['url']; ?>" alt="<?php echo $colimg['alt']; ?>"
                                 class="img-fluid">
                        </div><!-- col -->
                    </div><!-- row -->
                </div><!-- container -->
            </section>
        <?php elseif ($head['acf_fc_layout'] == 'basic'): ?>
            <!--is basic-->
            <section class="hero hero--short position-relative d-flex justify-content-center align-items-center"
                     style="background: transparent url('<?php echo $banner['url']; ?>') no-repeat center; background-size: cover;">
                <div class="block__gradient-overlay position-absolute z-index-1"></div>
                <div class="container position-relative z-index-10 text-white">
                    <div class="row justify-content-center">
                        <div class="col-lg-8 text-center mt-4">
                            <?php echo $head['basic_content']; ?>
                        </div><!-- col -->
                    </div><!-- row -->
                </div><!-- container -->
            </section>
        <?php endif;
    endforeach;
endif;
?>
<?php if ($layouts) : ?>
    <?php foreach ($layouts as $layout) : ?>
        <?php if ($layout['acf_fc_layout'] == 'full_width_content'): ?>
            is full_width_content
        <?php elseif ($layout['acf_fc_layout'] == 'column'): ?>
            is column
        <?php elseif ($layout['acf_fc_layout'] == 'buttons'): ?>
            is buttons
        <?php elseif ($layout['acf_fc_layout'] == 'signup_form'): ?>
            is signup_form
        <?php elseif ($layout['acf_fc_layout'] == 'two_column_list'): ?>
            is two_column_list
        <?php elseif ($layout['acf_fc_layout'] == 'icons'): ?>
            is icons
        <?php elseif ($layout['acf_fc_layout'] == 'google_map'): ?>
            is google_map
        <?php elseif ($layout['acf_fc_layout'] == 'questions_and_answers_accordion'): ?>
            is questions_and_answers_accordion
        <?php elseif ($layout['acf_fc_layout'] == 'process_accordion'): ?>
            is process_accordion
        <?php elseif ($layout['acf_fc_layout'] == 'table'): ?>
            is table
        <?php elseif ($layout['acf_fc_layout'] == 'tabbed_events_schedule'): ?>
            is tabbed_events_schedule
        <?php elseif ($layout['acf_fc_layout'] == 'gallery'): ?>
            is gallery
        <?php elseif ($layout['acf_fc_layout'] == 'price_cards'): ?>
            is price_cards
        <?php elseif ($layout['acf_fc_layout'] == 'sponsors'): ?>
            is sponsors
        <?php elseif ($layout['acf_fc_layout'] == 'testimonials'): ?>
            is testimonials
        <?php elseif ($layout['acf_fc_layout'] == 'future_event_cards'): ?>
            is future_event_cards
        <?php endif;
    endforeach;
    wp_reset_postdata();
endif;
?>
