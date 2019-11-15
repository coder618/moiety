<?php
/**
 * Search results partial template.
 *
 * @package moiety
 */
$moiety_arrow = '<svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd"><path d="M4 .755l14.374 11.245-14.374 11.219.619.781 15.381-12-15.391-12-.609.755z"/></svg>';
?>

<article class="search-item" <?php post_class(); ?> id="post-<?php the_ID(); ?>">
	<h3><a href="<?php echo get_the_permalink()?>"><?php echo esc_html(get_the_title()) .  $moiety_arrow?>  </a></h3>
</article><!-- #post-## -->