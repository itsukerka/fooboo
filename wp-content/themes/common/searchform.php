<form role="search" method="get" id="searchform" action="<?php echo home_url( '/' ) ?>" >
    <div class="field <?php has_content(get_search_query()); ?>">
        <input type="text"  value="<?php echo get_search_query() ?>" name="s" id="s">
        <label>Search</label>
    </div>
	<input type="hidden" name="post_type" value="product" />
    <div class="submit">
        <button type="submit" id="searchsubmit" class="icon"><span class="icon--search"></span></button>
    </div>
</form>
