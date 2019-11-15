<?php 
    // gather some post information

    $moiety_cats_html = '';
    $moiety_tags_html = '';

    $moiety_tags = get_the_tags( $post->ID );
    $moiety_cats = get_the_category( $post->ID );



    if( (is_array($moiety_tags) || is_object($moiety_tags)) && count($moiety_tags)>0){
        $moiety_tags_html = "<div class='tags'>Tags: ";
            foreach($moiety_tags as $item):
                $moiety_tags_html .= "<a href='".filter_var(get_tag_link($item->term_id),FILTER_SANITIZE_URL)."'>#".strip_tags($item->name)."</a>";
            endforeach;
        $moiety_tags_html .= "</div>";
    }

    if( (is_array($moiety_cats) || is_object($moiety_cats)) && count($moiety_cats)>0){

        if( count($moiety_cats)==1 && $moiety_cats[0]->name == 'Uncategorized'){
            // skip the Uncategorized from printing
            $moiety_cats_html = '';
        }else{
            $moiety_cats_html = "<div class='cats'> Category: ";
                foreach($moiety_cats as $item):
                    $moiety_cats_html .= "<a href='".get_category_link($item->term_id)."'>{$item->name}</a>";
                endforeach;
            $moiety_cats_html .= "</div>";
        }
    }

?>
        
<div class="single-header">
    <h1><?php echo esc_html( get_the_title() ) ?></h1>
    <p class="date"><?php echo get_the_date() ?> | <?php  echo get_the_author_meta("nickname")  ?> </p>

    <div class="img-section" style="background-image:url(<?php echo get_the_post_thumbnail_url($post->ID, 'large') ?>)">
        <img src="<?php echo get_the_post_thumbnail_url($post->ID, 'large') ?>" alt="<?php echo $title ?>">
    </div>
    <?php if( $moiety_cats_html || $moiety_tags_html ):  ?>
    <div class="meta">
        <?php echo  $moiety_cats_html  ?>
        <?php echo  $moiety_tags_html  ?>
    </div>    
    <?php endif;  ?>
</div>