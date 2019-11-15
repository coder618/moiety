<div class="single-header">
    <h1><?php echo esc_html( get_the_title() ) ?></h1>
    <p class="date"><?php echo get_the_date() ?></p>

    <div class="img-section" style="background-image:url(<?php echo get_the_post_thumbnail_url($post->ID, 'large') ?>)">
        <img src="<?php echo get_the_post_thumbnail_url($post->ID, 'large') ?>" alt="<?php echo echo esc_html( get_the_title() ) ?>">
    </div>
</div>

<div class="single-content generic-style">
    <?php the_content() ?>
</div>