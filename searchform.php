<form class="search-from" action="/" method="GET">
    <input id="search-box" value="<?php the_search_query();?>" name="s"
        placeholder=<?php echo esc_attr_x( 'Search', 'placeholder', 'orissa' ) ?> aria-label=" Search" />
    <input hidden type="submit" class="search-submit"
        value="<?php echo esc_attr_x( 'Search', 'submit button', 'orissa' ); ?>" />
</form>