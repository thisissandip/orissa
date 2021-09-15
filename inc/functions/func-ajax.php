<?php
/**
* AJAX: Load More Post
*/


function orissa_load_more_pagination(){
    printf("<div class='orissa-pagination-wrapper'>
    <button type='button' id='load-more-post-btn'>Load More</button>
    </div>");
}

function orissa_load_more(){
    
    $next_page_num = $_POST["current_page"] + 1;
    $query = new WP_Query([
        "posts_per_page" => 6,
        "paged" => $next_page_num
    ]);

    if($query->have_posts()):
        ob_start();

        while($query->have_posts()) : $query->the_post();

        get_template_part("template-parts/components/blog-card/blog-card");

        endwhile;

        wp_send_json_success(ob_get_clean() );

    else:

        wp_send_json_error( "No more posts" );
        
    endif;
}

add_action( "wp_ajax_nopriv_orissa_load_more_posts", "orissa_load_more" );
add_action( "wp_ajax_orissa_load_more_posts", "orissa_load_more" );

/**
 * For Archive Posts
 */

function orissa_load_more_archive_pagination(){
    printf("<div class='orissa-pagination-wrapper'>
    <button type='button' id='load-more-archive-post-btn'>Load More</button>
    </div>");
}

function orissa_load_more_archive(){
    
    $next_page_num = $_POST["current_page"] + 1;
    $search_term = $_POST["search_term"];

    $query = new WP_Query([
        "posts_per_page" => 5,
        "paged" => $next_page_num,
        's' => $search_term
    ]);

    if($query->have_posts()):
        ob_start();

        while($query->have_posts()) : $query->the_post();

        get_template_part("template-parts/components/blog-card/blog-card");

        endwhile;

        wp_send_json_success(ob_get_clean() );

    else:

        wp_send_json_error( "No more posts" );
        
    endif;
}

add_action( "wp_ajax_nopriv_orissa_load_more_archive_posts", "orissa_load_more_archive" );
add_action( "wp_ajax_orissa_load_more_archive_posts", "orissa_load_more_archive" );