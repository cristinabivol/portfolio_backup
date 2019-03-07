<?php
/**
 * The template for displaying search forms in Underscores.me
 *
 * @package wedding
 */

?>
<h5 class="sidebar-title"><?php esc_attr_e( 'Search', 'magnolia-wedding' ); ?></h5>
<div class="sidebar-separator"></div>
<form method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search">
	<div class="input-group input-group-lg form-group">
		<input type="text" name="s" class="form-control field" id="s"
					 placeholder="<?php esc_attr_e( 'Search &hellip;', 'magnolia-wedding' ); ?>" required=""
					 data-validation-required-message="Please enter your email address.">
		<p class="help-block text-danger"></p>
		<span class="input-group-btn">
      <button type="submit" name="submit" class="btn" id="searchsubmit">
        <i class="fa fa-search" aria-hidden="true"></i>
      </button>
    </span>
	</div>
</form>
