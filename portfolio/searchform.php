<form role="search" method="get" id="searchform" action="<?php echo home_url( '/' ) ?>" >
	<input type="text" value="<?php echo get_search_query() ?>" name="s" id="s" class="form-control" placeholder="Search and hit enter..." />
	<button type="submit" id="searchsubmit">Search</button>
</form>