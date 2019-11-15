<?php 

function moiety_post_template($id){
    
    $title = get_the_title($id);

    $post_img_url = get_the_post_thumbnail_url( $id , 'large' );
    $title = moiety_equal_the_title (get_the_title($id));
    $link = get_permalink($id);
    $time = get_the_date( '',  $id );
    $cats = get_the_category($id);
    $tags = get_the_tags($id);
    $cats_html = '';
    $tags_html = '';

    if( (is_array($tags) || is_object($tags)) && count($tags)>0){
        $tags_html = "<div class='tags'>";
            foreach($tags as $item):
                $tags_html .= "<a href='".filter_var(get_tag_link($item->term_id),FILTER_SANITIZE_URL)."'>".strip_tags($item->name)."</a>";
            endforeach; 
        $tags_html .= "</div>";
    }

    if( (is_array($cats) || is_object($cats)) && count($cats)>0){

        if( count($cats)==1 && $cats[0]->name == 'Uncategorized'){
            $cats_html = '';
        }else{
            $cats_html = "<div class='cats'>";
                foreach($cats as $item):
                    $cats_html .= "<a href='".filter_var(get_category_link($item->term_id), FILTER_SANITIZE_URL)."'>".strip_tags($item->name)."</a>";
                endforeach;
            $cats_html .= "</div>";
        }

    }


    $html = '';

    $html .= '<div class="post-card">';
        $html .= '<div class="img-section" style="background-image:url('.$post_img_url.')">';

            $html .= $tags_html;

            $html .= '<img src="'.$post_img_url.'" alt="'.$title.'" />';

        $html .= '</div>';

        
        
        $html .= '<div class="text-section">';
            $html .= '<h3 class="title">'.strip_tags($title).'</h3>';

            $html .= '<div class="meta-section">';
                $html .= '<p class="date">'.$time.'</p>';
                $html .= $cats_html;
            $html .= '</div>';

            $html .= "<p class='detail'>".get_the_excerpt($id)."</p>";
            
            $html .= '<a href="'.$link.'" class="btn btn-text read-more-link">'.__("Read More", "moiety").'</a>';
        $html .= '</div>';
    $html .= '</div>';

    return $html;


}