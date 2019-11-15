<?php 
    $moiety_cat_ids = [];
    $moiety_tags_ids = [];
    $moiety_posttype = get_post_type($post->ID);

    $moiety_categories = get_the_category( $post->ID );
    $moiety_tags = wp_get_post_tags($post->ID);

    $moiety_query_args = array( 
        'post_type'      => $moiety_posttype,
        'post_not_in'    => array($post->ID),
        'posts_per_page'  => '4',
    );

    // Prepair the cat_ids array
    if( is_array($moiety_categories) && count($moiety_categories) > 0):
        foreach ($moiety_categories as $moiety_category):
            array_push($moiety_cat_ids, $moiety_category->term_id);
        endforeach;
    endif;

    // Prepair the tags_ids array
    if( is_array($moiety_tags) && count($moiety_tags) > 0):
        foreach ($moiety_tags as $moiety_tag):
            array_push($moiety_tags_ids, $moiety_tag->term_id);
        endforeach;
    endif;



    // Prepair the tax query paramiter for wp_query argument
    if( count($moiety_cat_ids) > 0 && count($moiety_tags_ids) > 0 ){
        // if post have both categories and tags selected        
        
        $moiety_query_args['category__in'] = $moiety_cat_ids;
        $moiety_query_args['tag__in'] = $moiety_tags_ids;

    }elseif ( count($moiety_cat_ids) > 0 && count($moiety_tags_ids) ==  0  ) {
        // if only categories present

        $moiety_query_args['category__in'] = $moiety_cat_ids;
        
    }elseif ( count($moiety_cat_ids) == 0 && count($moiety_tags_ids) >  0  ) {
        // if only tags present

        $moiety_query_args['tag__in'] = $moiety_tags_ids;
    }



    $moiety_related_posts = new WP_Query( $moiety_query_args );

    // print_r($moiety_related_posts);

    if($moiety_related_posts->have_posts()): ?>
        <div class="related-posts-section">
            <h2><?php _e("Related Posts", "moiety") ?></h2>
            <div class="post-posts-wrapper">
                <div class="items">
                    <?php while($moiety_related_posts->have_posts()) :  $moiety_related_posts->the_post() ?>
                        <div class="item">
                            <?php echo moiety_post_template(get_the_ID()); ?>
                        </div>
                    <?php endwhile;?>
                </div>
            </div>
        </div>
        <?php
        // Restore original Post Data
        wp_reset_postdata();
    endif;

