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
                <div class="container position-relative z-index-10 mb-2 mb-lg-0">
                    <div class="row text-white">
                        <div class="col-12 text-center mb-2 mt-8 mt-lg-4">
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
                <div class="container position-relative z-index-10 mt-4 py-3 py-md-25 py-lg-0">
                    <div class="row g-lg-2 text-white">
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
                <div class="container position-relative z-index-10 text-white pb-1 pt-4 pb-lg-0 pt-lg-0">
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
                    <div class="row g-2 g-lg-3">
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
                            <?php echo do_shortcode('[gravityform id="2" title="false" description="false" ajax="true" tabindex="2" ]'); ?>
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
            $icons = $layout['icon_set'];
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
            <section class="map-container mt-1">
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
                                        <div class="accordion-item border border-0">
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
                                                 class="accordion-collapse collapse <?php echo $count == 0 ? 'show' : ''; ?>"
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
                                            <div class="accordion-item border border-0">
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
                <section class="accordion-descriptions pb-2">
                    <div class="container">
                        <div class="row g-3">
                            <div class="col-lg-6">
                                <div class="accordion rounded-0" id="descriptions">
                                    <?php $plcount = 0;
                                    foreach ($processleft as $process) : ?>
                                        <div class="accordion-item rounded-0">
                                            <h2 class="accordion-header">
                                                <button
                                                    class="accordion-button custom-accordion-button text-white rounded-0"
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
                                                        <span
                                                            class="pe-1"><?php echo $processr['process_title']; ?></span>
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
            $table = $layout['table_acf'];
            $tablestyle = $layout['table_style'];
            if ($table):
                if($tablestyle == 'basic-table'):?>
                <section class="basic-table py-3">
                    <div class="container">
                        <div class="table-responsive">
                            <table class="table table-bordered border-secondary table-hover">
                                <thead class="bg-secondary text-white">
                                <tr>
                                <?php $trs = $table['header']; foreach ($trs as $tr): ?>
                                    <th scope="col"><?php echo $tr['c'];?></th>
                                <?php endforeach;?>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($table['body'] as $tr): ?>
                                <tr>
                                    <?php foreach ($tr as $td): ?>
                                        <td><?php echo $td['c'];?></td>
                                    <?php endforeach;?>
                                </tr>
                                <?php endforeach;?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </section>
                    <?php else: ?>
                    <section class="fancy-table py-3">
                        <div class="container">
                            <div class="row no-gutters">
                                <div class="col-12">
                                    <div class="wrapper rounded">
                                        <div class="table-responsive rounded">
                                            <table class="table mb-0 bordered table-hover table-striped">
                                                <thead class="bg-secondary text-white">
                                                <tr>
                                                    <?php $trs = $table['header']; foreach ($trs as $tr): ?>
                                                        <th scope="col"><?php echo $tr['c'];?></th>
                                                    <?php endforeach;?>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php foreach ($table['body'] as $tr): ?>
                                                    <tr>
                                                        <?php foreach ($tr as $td): ?>
                                                            <td><?php echo $td['c'];?></td>
                                                        <?php endforeach;?>
                                                    </tr>
                                                <?php endforeach;?>
                                                </tbody>
                                            </table>
                                        </div><!-- responsive-table -->
                                    </div><!-- wrapper -->
                                </div><!-- col -->
                            </div><!-- row -->
                        </div><!-- container -->
                    </section>
                    <?php endif;?>
            <?php endif; ?>
        <?php elseif ($layout['acf_fc_layout'] == 'tabbed_events_schedule'): ?>
            <!--is tabbed_events_schedule-->
            <?php $tabs = $layout['event'];
            if ($tabs):?>
                <section class="data-tabs">
                    <div class="container">
                        <ul class="nav nav-pills" id="pills-tab" role="tablist">
                            <?php $tcounter = 0;
                            foreach ($tabs as $tab): ?>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link <?php echo $tcounter == 0 ? 'active' : ''; ?>"
                                            id="pills-<?php echo $tcounter; ?>-tab" data-bs-toggle="pill"
                                            data-bs-target="#pills-<?php echo $tcounter; ?>" type="button" role="tab"
                                            aria-controls="pills-<?php echo $tcounter; ?>"
                                            aria-selected="true">
                                        <?php echo $tab['slot_title']; ?>
                                    </button>
                                </li>
                                <?php $tcounter++;
                            endforeach; ?>
                        </ul>
                        <div class="tab-content" id="pills-tabContent">
                            <?php $tcounter = 0;
                            foreach ($tabs as $tab): $slots = $tab['slots']; ?>
                                <div class="tab-pane fade <?php echo $tcounter == 0 ? 'show active' : ''; ?>"
                                     id="pills-<?php echo $tcounter; ?>" role="tabpanel"
                                     aria-labelledby="pills-<?php echo $tcounter; ?>-tab"
                                     tabindex="0">
                                    <ul class="list-group list-group-flush">
                                        <?php foreach ($slots as $slot): ?>
                                            <li class="list-group-item">
                                                <?php echo $slot['description']; ?>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                                <?php $tcounter++; endforeach; ?>
                        </div>
                    </div>
                </section>
            <?php endif; ?>

        <?php elseif ($layout['acf_fc_layout'] == 'gallery'): ?>
            <!--is gallery-->
            <?php $galimgs = $layout['images'];
            if ($galimgs) : ?>
                <section class="gallery pb-2">
                    <div class="container">
                        <div class="row g-0">
                            <?php foreach ($galimgs as $gal) :
                                $gimg = $gal['image'];
                                ?>
                                <div
                                    class="col-12 col-sm-6 <?php echo $gal['dimension']; ?> js-gallery js-img-obj-fit__container">
                                    <a href=<?php echo $gimg['url']; ?>" class=" gallery-item">
                                    <img src="<?php echo $gimg['url']; ?>"
                                         alt="<?php echo $gimg['alt']; ?>"
                                         class="border border-white img-fluid gallery-img">
                                    </a>
                                </div><!-- col -->
                            <?php endforeach; ?>
                        </div><!-- row -->
                    </div><!-- container -->
                </section>
            <?php endif; ?>
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
            <!--is sponsors-->
            <?php
            $sponsors = $layout['sponsors'];
            if ($sponsors):
                ?>
                <section class="sponsors pb-2">
                    <div class="container">
                        <div class="owl-carousel" id="supporters-slider">
                            <?php foreach ($sponsors as $sponsor):
                                $sponsorlogo = $sponsor['sponsor_logo'];
                                $sponsorlink = $sponsor['website_link'];
                                ?>
                                <div class="item">
                                    <?php if ($sponsorlink): ?>
                                    <a href="<?php echo $sponsorlink['url'] ?>" class="text-white mb-1"
                                       title="Visit supporter">
                                        <?php endif;
                                        ?>
                                        <img src="<?php echo $sponsorlogo['url']; ?>"
                                             alt="<?php echo $sponsorlogo['alt']; ?>"
                                             class="img-fluid d-block sponsor-logo"
                                        >
                                        <?php if ($sponsorlink): ?>
                                    </a>
                                <?php endif;
                                ?>
                                </div><!-- item-->
                            <?php endforeach; ?>
                        </div><!-- owl-carousel -->
                    </div><!-- container -->
                </section>
            <?php endif; ?>
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
        <?php elseif ($layout['acf_fc_layout'] == 'our_speakers'): ?>
            <?php
            $speakers = $layout['speakers'];
            if($speakers):?>
                <section class="profile-cards py-2">
                    <div class="container">
                        <div class="row">
                            <?php $id=0; foreach ($speakers as $speaker):?>
                            <div class="col-12 col-md-6 col-lg-4">
                                <div class="card border border-0 rounded-0" data-bs-toggle="modal" data-bs-target="#speaker--<?php echo $id; ?>">
                                    <?php
                                    $speakerphoto = $speaker['speaker_image'];
                                    ?>
                                    <img src="<?php echo $speakerphoto['url'];?>" class="card-p card-img-top rounded-0" alt="<?php echo $speakerphoto['alt'];?>">
                                    <div class="card-body py-50 bg-secondary text-white text-center">
                                        <p class="card-text lead mb-0"><?php echo $speaker['speaker_name'];?></p>
                                    </div><!-- card-body-->
                                </div><!-- card -->
                                <section class="profile-modals">
                                    <!-- Modal -->
                                    <div class="modal fade" id="speaker--<?php echo $id; ?>" tabindex="-1" aria-labelledby="speaker--<?php echo $id; ?>" aria-hidden="true">
                                        <div class="modal-dialog modal-fullscreen">
                                            <div class="modal-content" style="background-color: transparent;">
                                                <div class="container bg-secondary py-2 position-relative">
                                                    <div class="row align-content-end">
                                                        <div class="col">
                                                            <button type="button" class="btn-close ms-auto d-block" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div><!-- col -->
                                                    </div><!-- row -->
                                                    <div class="row justify-content-center">
                                                        <div class="col-lg-8 text-center text-white">
                                                            <h2 class="text-uppercase">About this Speaker</h2>
                                                            <?php
                                                            $speakerphoto = $speaker['speaker_image'];
                                                            ?>
                                                            <img src="<?php echo $speakerphoto['url'];?>" class="modal-photo d-block mx-auto mb-1" alt="<?php echo $speakerphoto['alt'];?>">
                                                            <h2><?php echo $speaker['speaker_name'];?></h2>
                                                            <?php echo $speaker['speaker_bio'];?>
                                                            <h3 class="mt-2">Schedule</h3>
                                                        </div><!-- col -->
                                                    </div><!-- row -->
                                                    <div class="row justify-content-center">
                                                        <div class="col-lg-8">
                                                            <?php
                                                            $featured_posts = $speaker['schedule'];
                                                            if( $featured_posts ): ?>
                                                                <section class="info-cards">
                                                                    <?php foreach( $featured_posts as $post ):
                                                                        // Setup this post for WP functions (variable must be named $post).
                                                                        setup_postdata($post); ?>
                                                                        <div class="card border border-1 rounded-0">
                                                                            <div class="row g-0">
                                                                                <div class="col-md-3">
                                                                                    <div class="card-body">
                                                                                        <div class="info-icon d-flex justify-content-center align-items-center mx-auto">
                                                                                            <i class="bi bi-calendar4-event"></i>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-9">
                                                                                    <div class="card-body text-secondary position-relative">
                                                                                        <p class="small mb-0"> <?php the_field( 'time' ); ?></p>
                                                                                        <h3 class="card-title text-dark fw-normal mb-0"><?php the_title(); ?></h3>
                                                                                        <p class="card-text lead text-uppercase"><?php the_field( 'speaker' ); ?></p>
                                                                                        <a href="https://sproing.ca" target="_blank" class="btn btn-outline-secondary z-index-100">Register Now</a>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    <?php endforeach; ?>
                                                                </section>
                                                                <?php wp_reset_postdata(); ?>
                                                            <?php endif; ?>
                                                        </div><!-- col -->
                                                    </div><!-- row -->
                                                </div><!-- container -->
                                            </div><!-- modal-content -->
                                        </div><!-- modal-dialog -->
                                    </div><!-- modal -->
                                </section>
                            </div><!-- col -->
                        <?php $id++; endforeach;?>
                        </div><!-- row -->
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
                                    <div class="card border-0 text-center p-75 mx-auto mb-1">
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
