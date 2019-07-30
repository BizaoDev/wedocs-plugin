<?php if ($docs) : ?>

    <div class="wedocs-shortcode-wrap">
        <ul class="wedocs-docs-list row">
            <?php foreach ($docs as $main_doc) : ?>
                <?php if (!$main_doc['sections']) : ?>
                    <!--Display docs with no sections-->
                    <li class="no-section col-md-12">
                        <ul class="row">
                            <li class="wedocs-docs-single card col-md-12">
                                <h2>
                                    <a href="<?php echo get_permalink($main_doc['doc']->ID); ?>"><?php echo $main_doc['doc']->post_title; ?></a>
                                </h2>
                            </li>
                        </ul>
                    </li>
                <?php endif;?>
            <?php endforeach; ?>
            <!--Display docs with sections-->
            <li class="has-section col-md-12">
                <ul class="row">
                    <?php $index = 0; ?>
                    <?php foreach ($docs as $main_doc) : ?>
                        <?php if ($main_doc['sections']) :  ?>
                            <?php $index++; ?>
                            <ul class="col-sm-12 col-md-6">
                                <li class="wedocs-docs-single card col">
                                    <!--IMAGE-->
                                    <?php if (has_post_thumbnail($main_doc['doc']->ID)) : ?><?php $url = wp_get_attachment_url(get_post_thumbnail_id($main_doc['doc']->ID), 'thumbnail'); ?>
                                        <div class="row justify-content-center">
                                            <div class="card-img-top">
                                                <img src="<?php echo $url ?>"/>
                                            </div>
                                        </div>
                                    <?php endif; ?>

                                    <!--TITLE-->
                                    <h2>
                                        <a href="<?php echo get_permalink($main_doc['doc']->ID); ?>"><?php echo $main_doc['doc']->post_title; ?></a>
                                    </h2>

                                    <!--SECTIONS-->
                                    <div class="inside container-fluid">
                                        <!--Separate sections in chunks-->
                                        <?php
                                        $chunkSize = 3;
                                        $arrayChunks = array_chunk($main_doc['sections'], $chunkSize)
                                        ?>

                                        <!--Print new row for each chunk-->
                                        <?php //foreach ($arrayChunks as $i => $chunk) : ?>
                                        <ul class="wedocs-doc-sections col justify-content-around align-items-center">

                                            <!--Print new card for each section-->
                                            <?php foreach ($main_doc['sections'] as $section) : ?>
                                                <li>
                                                    <h3>
                                                        <a href="<?php echo get_permalink($section->ID); ?>"><?php echo $section->post_title; ?></a>
                                                    </h3>
                                                </li>
                                            <?php endforeach; ?>

                                        </ul>
                                        <?php //endforeach; ?>
                                    </div>
                                </li>
                            </ul>
                            <?php if ($index % 2 == 0) : ?>
                </ul>
                <ul class="row">
                            <?php endif;?>
                        <?php endif;?>
                    <?php endforeach; ?>
                </ul>
            </li>

        </ul>
    </div>

<?php endif; ?>
