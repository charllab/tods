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
                    <div class="row g-2 text-white">
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
<?php foreach ($layouts

as $layout) : ?>
<?php if ($layout['acf_fc_layout'] == 'full_width_content'): ?>
    <!--is full_width_content-->
    <section class="pt-2 pb-1">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <?php echo $layout['content']; ?>
                </div><!-- col -->
            </div><!-- row -->
        </div><!-- container -->
    </section>

<?php elseif ($layout['acf_fc_layout'] == 'column'): ?>
    <!--is column-->
    <?php
    $bgc = $layout['background_color'];
    $colico = $layout['icon_code'];
    ?>
    <section
        class="pingpong pingpong--standard <?php echo $colico ? 'pingping--icon' : ''; ?> <?php echo $bgc; ?>">
        <div class="container position-relative">
            <div class="row g-3">
                <?php if ($colico): ?>
                    <div
                        class="position-absolute pingping__icon d-flex justify-content-center align-items-center">
                        <i class="<?php echo $colico; ?> rotate-icon"></i>
                    </div>
                <?php endif; ?>
                <?php
                $order = $layout['layout_choose'];
                ?>
                <div class="col-lg-6 order-lg-2">
                    <?php echo $layout['content_area']; ?>
                    <?php
                    $buttons = $layout['buttons'];
                    if ($buttons): ?>
                        <div class="row py-1">
                            <div class="col-12">
                                <?php foreach ($buttons as $button) :
                                    $btn = $button['button'];
                                    $target = $btn['target'];
                                    $btnclass = $button['button_style'];

                                    ?>
                                    <a href="<?php echo $btn['url']; ?>" <?php echo $target ? 'target="' . $target . '"' : ''; ?>
                                       class="btn <?php echo $btnclass; ?>"><?php echo $btn['title']; ?></a>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    <?php endif; ?>
                </div><!-- col -->
                <div class="col-lg-6 <?php echo $order == 'left' ? 'order-lg-0' : 'order-lg-3'; ?>">
                    <?php
                    $columnimg = $layout['image'];
                    ?>
                    <img src="<?php echo esc_attr($columnimg['url']); ?>"
                         alt="<?php echo esc_attr($columnimg['alt']); ?>" class="img-fluid">
                </div><!-- col -->
            </div><!-- row -->
        </div><!-- row -->
    </section>

<?php elseif ($layout['acf_fc_layout'] == 'buttons'): ?>
    <!--is buttons-->
    <section>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <?php
                    $buttonsset = $layout['buttons'];
                    $btnalign = $layout['layout'];
                    if ($buttonsset): ?>
                        <div class="row py-1">
                            <div class="col-12 <?php echo $btnalign; ?>">
                                <?php foreach ($buttonsset as $button) :
                                    $btn = $button['button'];
                                    $target = $btn['target'];
                                    $btnclass = $button['button_style'];

                                    ?>
                                    <a href="<?php echo $btn['url']; ?>" <?php echo $target ? 'target="' . $target . '"' : ''; ?>
                                       class="btn <?php echo $btnclass; ?>"><?php echo $btn['title']; ?></a>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    <?php endif; ?>
                </div><!-- col -->
            </div><!-- row -->
        </div><!-- container -->
    </section>
<?php elseif ($layout['acf_fc_layout'] == 'signup_form'): ?>
    <!--is signup_form-->
    <section class="email-signup bg-secondary py-2">
        <div class="container">
            <div class="row justify-content-between align-items-center">
                <div class="col-lg-3 text-white h2_styling">
                    <?php echo $layout['text_area']; ?>
                </div><!-- col -->
                <div class="col-lg-7">
                    <form>
                        <div class="input-group rounded-0">
                            <input type="text" class="form-control border-0 rounded-0"
                                   placeholder="Recipient's username" aria-label="Recipient's username"
                                   aria-describedby="subscribe">
                            <button class="btn btn-primary border-0 rounded-0" type="button" id="subscribe">
                                Subscribe
                            </button>
                        </div><!-- input-group -->
                    </form>
                </div><!-- col -->
            </div><!-- row -->
        </div><!-- container -->
    </section>
<?php elseif ($layout['acf_fc_layout'] == 'two_column_list'): ?>
    <!--is two_column_list-->
    <?php $lists = $layout['list_items'];
    if ($lists) : ?>
        <section class="pb-1 checkbox-list-group">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="multicolumn-list">
                            <ul class="list-group list-group-flush">
                                <?php foreach ($lists as $list) :
                                    ?>
                                    <li class="list-group-item border-bottom-0 position-relative"><?php echo $list['list_item']; ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>
<?php elseif ($layout['acf_fc_layout'] == 'icons'):
    $icons = $layout['icon_set']
    ?>
    <!--is icons-->
    <?php if ($icons): ?>
    <section class="icon-columns bg-primary py-150">
        <div class="container">
            <div class="row justify-content-center align-items-center">

                <?php foreach ($icons as $icon) : ?>
                    <div class="icon-column col text-white">
                        <div
                            class="d-flex justify-content-center justify-content-lg-start align-items-center px-2">
                            <div class="icon">
                                <i class="<?php echo esc_attr($icon['icon_code']); ?>"></i>
                            </div>
                            <div class="detail">
                                <?php echo $icon['text_area']; ?>
                            </div>
                        </div><!-- flex -->
                    </div><!-- col -->
                <?php endforeach; ?>
            </div><!-- row -->
        </div><!-- container -->
    </section>
<?php endif; ?>
<?php elseif ($layout['acf_fc_layout'] == 'google_map'): ?>
    <!--is google_map-->
    <section class="map-container">
        <iframe
            src="<?php echo $layout['iframe_src_code']; ?>"
            style="border:0;" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"></iframe>
    </section>

<?php elseif ($layout['acf_fc_layout'] == 'questions_and_answers_accordion'): ?>
    <!--is questions_and_answers_accordion-->
    <?php $questionsleft = $layout['questions_and_answers_set'];
    $questionsright = $layout['questions_and_answers_set_right'];
    if ($questionsleft) :?>
        <section class="accordion-questions pb-1">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="accordion" id="questions">
                            <?php $count = 0;
                            foreach ($questionsleft as $question) : ?>
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button custom-accordion-button" type="button"
                                                data-bs-toggle="collapse"
                                                data-bs-target="#collapseQuestion--<?php echo $count; ?>"
                                                aria-expanded="true"
                                                aria-controls="collapseQuestion--<?php echo $count; ?>">
                                            <span class="pe-1"><?php echo $question['question']; ?></span>
                                        </button>
                                    </h2>
                                    <div id="collapseQuestion--<?php echo $count; ?>"
                                         class="accordion-collapse collapse"
                                         data-bs-parent="#questions">
                                        <div class="accordion-body">
                                            <?php echo $question['answer']; ?>
                                        </div><!-- accordion-body -->
                                    </div><!-- accordion-collapse -->
                                </div><!-- accordion-item -->
                                <?php
                                $count++;
                            endforeach; ?>
                        </div><!-- accordion -->
                    </div><!-- col -->
                    <?php if ($questionsright) : $countr = 100; ?>
                        <div class="col-lg-6">
                            <div class="accordion" id="questions--<?php echo $countr; ?>">
                                <?php foreach ($questionsright as $questionr) :
                                    ?>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button custom-accordion-button"
                                                    type="button"
                                                    data-bs-toggle="collapse"
                                                    data-bs-target="#collapseQuestion--<?php echo $countr; ?>"
                                                    aria-expanded="true"
                                                    aria-controls="collapseQuestion--<?php echo $countr; ?>">
                                                <span class="pe-1"><?php echo $questionr['question']; ?></span>
                                            </button>
                                        </h2>
                                        <div id="collapseQuestion--<?php echo $countr; ?>"
                                             class="accordion-collapse collapse"
                                             data-bs-parent="#questions--<?php echo $countr; ?>">
                                            <div class="accordion-body">
                                                <?php echo $questionr['answer']; ?>
                                            </div><!-- accordion-body -->
                                        </div><!-- accordion-collapse -->
                                    </div><!-- accordion-item -->
                                    <?php
                                    $countr++;
                                endforeach; ?>
                            </div><!-- accordion -->
                        </div><!-- col -->
                    <?php endif; ?>
                </div><!-- row -->
            </div><!-- container -->
        </section>
    <?php endif; ?>

<?php elseif ($layout['acf_fc_layout'] == 'process_accordion'): ?>
    <!--is process_accordion-->
    <?php
    $processleft = $layout['process_set'];
    $processright = $layout['process_set_right'];
    if ($processleft) : ?>
        <section class="accordion-descriptions py-2">
            <div class="container">
                <div class="row g-3">
                    <div class="col-lg-6">
                        <div class="accordion rounded-0" id="descriptions">
                            <?php $plcount = 0;
                            foreach ($processleft as $process) : ?>
                                <div class="accordion-item rounded-0">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button custom-accordion-button text-white rounded-0"
                                                type="button" data-bs-toggle="collapse"
                                                data-bs-target="#collapseDescriptions--<?php echo $plcount; ?>"
                                                aria-expanded="true"
                                                aria-controls="collapseDescriptions--<?php echo $plcount; ?>">
                                            <span class="pe-1"><?php echo $process['process_title']; ?></span>
                                        </button>
                                    </h2>
                                    <div id="collapseDescriptions--<?php echo $plcount; ?>"
                                         class="accordion-collapse collapse <?php echo $plcount == 0 ? 'show' : ''; ?>"
                                         data-bs-parent="#descriptions">
                                        <div class="accordion-body">
                                            <?php echo $process['process_explained']; ?>
                                        </div>
                                    </div>
                                </div><!-- accordion-item -->
                                <?php
                                $plcount++;
                            endforeach; ?>
                        </div><!-- accordion -->
                    </div><!-- col -->
                    <?php if ($processright) : $prcount = 100; ?>
                        <div class="col-lg-6">
                            <div class="accordion rounded-0" id="descriptions--<?php echo $prcount; ?>">
                                <?php foreach ($processright as $processr) : ?>
                                    <div class="accordion-item rounded-0">
                                        <h2 class="accordion-header">
                                            <button
                                                class="accordion-button custom-accordion-button text-white rounded-0"
                                                type="button" data-bs-toggle="collapse"
                                                data-bs-target="#collapseDescriptions--<?php echo $prcount; ?>"
                                                aria-expanded="true"
                                                aria-controls="collapseDescriptions--<?php echo $prcount; ?>">
                                                <span class="pe-1"><?php echo $processr['process_title']; ?></span>
                                            </button>
                                        </h2>
                                        <div id="collapseDescriptions--<?php echo $prcount; ?>"
                                             class="accordion-collapse collapse"
                                             data-bs-parent="#descriptions--<?php echo $prcount; ?>">
                                            <div class="accordion-body">
                                                <?php echo $processr['process_explained']; ?>
                                            </div>
                                        </div>
                                    </div><!-- accordion-item -->
                                    <?php
                                    $prcount++;
                                endforeach; ?>
                            </div><!-- accordion -->
                        </div><!-- col -->
                    <?php endif; ?>
                </div><!-- row -->
            </div><!-- container -->
        </section>
    <?php endif; ?>
    <?php elseif ($layout['acf_fc_layout'] == 'table'): ?>
        <!--is table-->
            <?php
            $table = $layout['table'];
            if($table) :
            ?>
            <section class="basic-table py-3">
                <div class="container">
                    <div class="table-responsive">
                        <table class="table table-bordered border-secondary table-hover">
                            <thead class="bg-secondary text-white">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">First</th>
                                <th scope="col">Last</th>
                                <th scope="col">Handle</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>Jacob</td>
                                <td>Thornton</td>
                                <td>@fat</td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td colspan="2">Larry the Bird</td>
                                <td>@twitter</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
                <?php endif;?>
    <?php elseif ($layout['acf_fc_layout'] == 'tabbed_events_schedule'): ?>
        is tabbed_events_schedule
    <?php elseif ($layout['acf_fc_layout'] == 'gallery'): ?>
        is gallery
    <?php elseif ($layout['acf_fc_layout'] == 'price_cards'): ?>
        <!--is price_cards-->
        <?php
        $cards = $layout['cards'];
        if ($cards):?>
            <section class="price-cards">
                <div class="container">
                    <div class="row justify-content-center">
                        <?php foreach ($cards as $card) : ?>
                            <div class="col-lg-3">
                                <div class="card">
                                    <div class="card-header border-bottom-0">
                                        <?php echo $card['card_title']; ?>
                                    </div><!-- card-header -->
                                    <div class="card-body p-75">
                                        <?php echo $card['card_content']; ?>
                                    </div><!-- card-body -->
                                </div><!-- card -->
                            </div><!-- col -->
                        <?php endforeach; ?>
                    </div><!-- row -->
                </div><!-- container -->
            </section>
        <?php endif; ?>
    <?php elseif ($layout['acf_fc_layout'] == 'sponsors'): ?>
        is sponsors
    <?php elseif ($layout['acf_fc_layout'] == 'testimonials'): ?>
        <?php
        $ratings = $layout['testimonial'];
        if ($ratings) :?>
            <section class="info-cards">
                <div class="container">
                    <div class="owl-carousel" id="rating-slider">
                        <?php foreach ($ratings as $rating) : ?>
                            <div class="item">
                                <div class="card">
                                    <div class="card-header pt-2 border-bottom-0 bg-white rating-stars">
                                        <?php $stars = $rating['star_rating'];
                                        if ($stars == 1) : ?>
                                            <i class="bi bi-star-fill" style="color: #f58634;"></i>
                                        <?php elseif (($stars == 2)) : ?>
                                            <i class="bi bi-star-fill" style="color: #f58634;"></i>
                                            <i class="bi bi-star-fill" style="color: #f58634;"></i>
                                        <?php elseif (($stars == 3)) : ?>
                                            <i class="bi bi-star-fill" style="color: #f58634;"></i>
                                            <i class="bi bi-star-fill" style="color: #f58634;"></i>
                                            <i class="bi bi-star-fill" style="color: #f58634;"></i>
                                        <?php elseif (($stars == 4)) : ?>
                                            <i class="bi bi-star-fill" style="color: #f58634;"></i>
                                            <i class="bi bi-star-fill" style="color: #f58634;"></i>
                                            <i class="bi bi-star-fill" style="color: #f58634;"></i>
                                            <i class="bi bi-star-fill" style="color: #f58634;"></i>
                                        <?php elseif (($stars == 5)) : ?>
                                            <i class="bi bi-star-fill" style="color: #f58634;"></i>
                                            <i class="bi bi-star-fill" style="color: #f58634;"></i>
                                            <i class="bi bi-star-fill" style="color: #f58634;"></i>
                                            <i class="bi bi-star-fill" style="color: #f58634;"></i>
                                            <i class="bi bi-star-fill" style="color: #f58634;"></i>
                                        <?php endif; ?>

                                    </div><!-- card-header -->
                                    <div class="card-body">
                                        <?php echo $rating['testimony']; ?>
                                    </div><!-- card-body -->
                                    <div class="card-footer bg-white border-top-0">
                                        <div class="d-flex pb-1">
                                            <?php $photo = $rating['photo'] ?>
                                            <div class="card-profile rounded-circle bg-soft me-1">
                                                <?php if ($photo) : ?>
                                                    <img src="<?php echo $photo['url'] ?>"
                                                         class="rounded-circle me-50" alt="...">
                                                <?php endif; ?>
                                            </div>
                                            <div>
                                                <p class="mb-0"><?php echo $rating['author']; ?></p>
                                                <?php
                                                $more = $rating['about_the_author_optional'];
                                                if ($more) : ?>
                                                    <p class="person-post"><?php echo $more; ?></p>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div><!-- card-footer -->
                                </div><!-- card -->
                            </div><!-- item-->
                        <?php endforeach; ?>
                    </div><!-- owl-carousel -->
                </div><!-- container -->
            </section>
        <?php endif; ?>
    <?php elseif ($layout['acf_fc_layout'] == 'future_event_cards'): ?>
        <!--is future_event_cards-->
        <?php $upcomingevents = $layout['event_card'];
        if ($upcomingevents) : ?>
            <section class="year-cards py-1">
                <div class="container">
                    <?php foreach ($upcomingevents as $upcomingevent): ?>
                        <div class="row">
                            <div class="col">
                                <div class="card border-0 text-center p-75 mx-auto mb-2">
                                    <div class="card-body text-white">
                                        <?php echo $upcomingevent['card_content']; ?>
                                    </div><!-- card-body -->
                                </div><!-- card -->
                            </div><!-- col -->
                        </div><!-- row -->
                    <?php endforeach; ?>
                </div><!-- container -->
            </section>
        <?php endif; ?>
    <?php endif;
endforeach;
    wp_reset_postdata();
endif;
?>
