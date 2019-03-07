<?php
/**
 * The template for displaying search forms in Underscores.me
 *
 * @package alexander
 */

?>
<form method="get" id="searchform" action="<?php echo esc_url(home_url('/')); ?>" role="search">
	<h5 class="sidebar-title special-title" for="s"><?php esc_html_e('Search', 'understrap'); ?></h5>
	<div class="sidebar-separator"></div>
	<div class="input-group form-group">
		<input class="field form-control" id="s" name="s" type="text"
					 placeholder="<?php esc_attr_e('Search &hellip;', 'understrap'); ?>" value="<?php the_search_query(); ?>">
		<span class="input-group-btn">
      <button type="submit" name="submit" class=" smaller common-button" id="searchsubmit">
        <i class="fa fa-search" aria-hidden="true"></i>
      </button>
    </span>
	</div>
</form>
