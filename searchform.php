<form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
	<input type="text" class="search-field" placeholder="<?php echo esc_attr_x( 'Enter Keyword', 'placeholder' ) ?>" value="<?php echo get_search_query() ?>" name="s" title="<?php echo esc_attr_x( 'Search for:', 'label' ) ?>" />
	<button type="submit" class="search-submit" value="<?php echo esc_attr_x( 'Search', 'submit button' ) ?>"><span class="fa fa-search"></span></button>
</form>