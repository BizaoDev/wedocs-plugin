<?php if ($docs) : ?>

    <div class="wedocs-shortcode-wrap">
        <ul class="wedocs-docs-list col-<?php echo $col; ?>">
            <?php foreach ($docs as $main_doc) : ?>

                <!--Display only docs with sections-->
                <?php if ($main_doc['sections']) : ?>

                    <li class="wedocs-docs-single">
                        <h2>
                            <a href="<?php echo get_permalink($main_doc['doc']->ID); ?>"><?php echo $main_doc['doc']->post_title; ?></a>
                        </h2>
                        <div class="inside container-fluid">
                            <!--Separate sections in chunks-->
                            <?php
                            $chunkSize = 3;
                            $arrayChunks = array_chunk($main_doc['sections'], $chunkSize)
                            ?>

                            <!--Print new row for each chunk-->
                            <?php foreach ($arrayChunks as $i => $chunk) : ?>
                                <ul class="wedocs-doc-sections row justify-content-around align-items-center">

                                    <!--Print new card for each section-->
                                    <?php foreach ($chunk as $section) : ?>
                                        <li class="card col-md-3">
                                            <?php if (has_post_thumbnail($section->ID)) : ?><?php $url = wp_get_attachment_url(get_post_thumbnail_id($section->ID), 'thumbnail'); ?>
                                                <div class="row justify-content-center">
                                                    <div class="card-img-top">
                                                        <img src="<?php echo $url ?>"/>
                                                    </div>
                                                </div>
                                            <?php endif; ?>
                                            <div class="card-body">
                                                <a href="<?php echo get_permalink($section->ID); ?>"><?php echo $section->post_title; ?></a>
                                            </div>
                                        </li>
                                    <?php endforeach; ?>

                                </ul>
                            <?php endforeach; ?>
                        </div>
                    </li>
                <?php endif; ?>

            <?php endforeach; ?>
        </ul>
    </div>

<?php endif; ?>
