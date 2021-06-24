<?php
/*------------------------------------
* Theme: Dirty Martini Theme by Dirty Martini
* File: Main functions file
* Author: Maxwell Kirwin
* URI: https://dirty-martini.com/
*------------------------------------
*
* We've moved all of the theme functions to this single
* file to keep things tidy. 
*
* Extra development and debugging functions can be found
* in plate.php. Uncomment the below require_once below.
*
*/

/* Plate development and debug functions
(not required but helper stuff for debugging and development)
*/
// require_once( 'library/plate.php' );

/* WordPress Admin functions (for customizing the WP Admin)
(also not required so comment it out if you don't need it)
*/
require_once('library/admin.php');

// WordPress Customizer functions and enqueues
// include( get_template_directory_uri() . '/library/customizer.php' );

require_once('library/customizer.php');



/************************************
 * PLATE LUNCH
 * 
 * Let's get everything on the plate. Mmmmmmmm.
 * 
 ************************************/

add_action('after_setup_theme', 'plate_lunch');

function plate_lunch()
{

    // let's get language support going, if you need it
    load_theme_textdomain('dmtheme', get_template_directory() . '/library/translation');

    // cleanup the <head>
    add_action('init', 'plate_head_cleanup');

    // remove WP version from RSS
    add_filter('the_generator', 'plate_rss_version');

    // remove pesky injected css for recent comments widget
    add_filter('wp_head', 'plate_remove_wp_widget_recent_comments_style', 1);

    // clean up comment styles in the head
    add_action('wp_head', 'plate_remove_recent_comments_style', 1);

    // clean up gallery output in wp
    add_filter('gallery_style', 'plate_gallery_style');

    // enqueue the styles and scripts
    add_action('wp_enqueue_scripts', 'plate_scripts_and_styles', 999);

    // Enqueue scripts that use ACF Elements
    add_action('acf/input/admin_enqueue_scripts', 'my_acf_admin_enqueue_scripts', 10, 0);

    // support the theme stuffs
    plate_theme_support();

    // adding sidebars to Wordpress
    add_action('widgets_init', 'plate_register_sidebars');

    // cleaning up <p> tags around images
    add_filter('the_content', 'plate_filter_ptags_on_images');

    // clean up the default WP excerpt
    add_filter('excerpt_more', 'plate_excerpt_more');

    // new body_open() function added in WP 5.2
    // https://generatewp.com/wordpress-5-2-action-that-every-theme-should-use/
    if (!function_exists('wp_body_open')) {
        /**
         * Fire the wp_body_open action.
         *
         * Added for backwards compatibility to support WordPress versions prior to 5.2.0.
         */
        function wp_body_open()
        {
            /**
             * Triggered after the opening <body> tag.
             */
            do_action('wp_body_open');
        }
    }
} /* end plate lunch */


/************* THUMBNAIL SIZE OPTIONS *************/

    // Thumbnail sizes
    add_image_size('plate-image-600', 600, 600, true);
    add_image_size('plate-image-300', 300, 300, true);
    add_image_size('plate-image-150', 150, 150, true);

/*
to add more sizes, simply copy a line from above
and change the dimensions & name. As long as you
upload a "featured image" as large as the biggest
set width or height, all the other sizes will be
auto-cropped.

To call a different size, simply change the text
inside the thumbnail function.

For example, to call the 300 x 100 sized image,
we would use the function:
<?php the_post_thumbnail( 'plate-image-300' ); ?>
for the 600 x 150 image:
<?php the_post_thumbnail( 'plate-image-600' ); ?>

You can change the names and dimensions to whatever
you like. Enjoy!
*/

add_filter('image_size_names_choose', 'plate_custom_image_sizes');

function plate_custom_image_sizes($sizes)
{

return array_merge(
$sizes,
array(

'plate-image-600' => __('600px by 600px', 'dmtheme'),
'plate-image-300' => __('300px by 300px', 'dmtheme'),
'plate-image-150' => __('150px by 150px', 'dmtheme'),

)
);
}

/*
The function above adds the ability to use the dropdown menu to select
the new images sizes you have just created from within the media manager
when you add media to your content blocks. If you add more image sizes,
duplicate one of the lines in the array and name it according to your
new image size.
*/

/************* ACTIVE SIDEBARS ********************/

// Sidebars & Widgetizes Areas
function plate_register_sidebars()
{

register_sidebar(
array(

'id' => 'sidebar-blog',
'name' => __('Sidebar Blog', 'dmtheme'),
'description' => __('The first sidebar. For the blog page', 'dmtheme'),
'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget' => '</div>',
'before_title' => '<h4 class="widgettitle">',
    'after_title' => '</h4>',

)
);

/*
to add more sidebars or widgetized areas, just copy
and edit the above sidebar code. In order to call
your new sidebar just use the following code:

Just change the name to whatever your new
sidebar's id is, for example: */

register_sidebar(
array(

'id' => 'footer-info',
'name' => __('Footer Info', 'dmtheme'),
'description' => __('Input contact information for use in the footer.', 'dmtheme'),
'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget' => '</div>',
'before_title' => '<h4 class="widgettitle">',
    'after_title' => '</h4>',

)
);

/* To call the sidebar in your template, you can just copy
the sidebar.php file and rename it to your sidebar's name.
So using the above example, it would be:
sidebar-sidebar2.php */
} // don't remove this bracket!


/*********************
COMMENTS
Blah blah blah.
*********************/



// Comment Layout
function plate_comments($comment, $args, $depth)
{

$GLOBALS['comment'] = $comment; ?>

<div id="comment-<?php comment_ID(); ?>" <?php comment_class('comment-wrap'); ?>>

    <article class="article-comment">

        <header class="comment-author vcard">

            <?php
                    /*
                  this is the new responsive optimized comment image. It used the new HTML5 data-attribute to display comment gravatars on larger screens only. What this means is that on larger posts, mobile sites don't have a ton of requests for comment images. This makes load time incredibly fast! If you'd like to change it back, just replace it with the regular wordpress gravatar call:
                  echo get_avatar($comment,$size='32',$default='<path_to_url>' );
                */
                    ?>

            <?php // custom gravatar call 
                    ?>

            <?php
                    // create variable
                    $bgauthemail = get_comment_author_email();
                    ?>

            <!-- <img data-gravatar="//www.gravatar.com/avatar/<?php echo md5($bgauthemail); ?>?s=256"
                class="load-gravatar avatar avatar-48 photo" height="64" width="64"
                src="<?php echo get_theme_file_uri(); ?>/library/images/custom-gravatar.png" /> -->

            <?php // end custom gravatar call 
                    ?>

            <div class="comment-meta">

                <?php printf(__('<cite class="fn">%1$s</cite> %2$s', 'dmtheme'), get_comment_author_link(), edit_comment_link(__('(Edit)', 'dmtheme'), '  ', '')) ?>

                <time datetime="<?php echo comment_time('Y-m-j'); ?>">

                    <a href="<?php echo htmlspecialchars(get_comment_link($comment->comment_ID)) ?>"><?php comment_time(__('F jS, Y', 'dmtheme')); ?>
                    </a>

                </time>

            </div>

        </header>

        <?php if ($comment->comment_approved == '0') : ?>

        <div class="alert alert-info">

            <p><?php _e('Your comment is awaiting moderation.', 'dmtheme') ?></p>

        </div>

        <?php endif; ?>

        <section class="comment-content">

            <?php comment_text() ?>

        </section>

        <div class="comment-reply">

            <?php comment_reply_link(array_merge($args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>

        </div>

    </article>

    <?php // </li> is added by WordPress automatically 
            ?>

    <?php } // don't remove this bracket!


        /*
Use this to add Google or other web fonts.
*/

        // add_action( 'wp_enqueue_scripts', 'plate_fonts' );

        // function plate_fonts() {

        //     wp_enqueue_style( 'plate-fonts', '//fonts.googleapis.com/css?family=Open+Sans:400,600,400italic,' );

        // }


        /****************************************
         * SCHEMA *
http://www.longren.io/add-schema-org-markup-to-any-wordpress-theme/
         ****************************************/

        function html_schema()
        {

            $schema = 'https://schema.org/';

            // Is single post
            if (is_single()) {
                $type = "Article";
            }

            // Is blog home, archive or category
            else if (is_home() || is_archive() || is_category()) {
                $type = "Blog";
            }

            // Is static front page
            else if (is_front_page()) {
                $type = "Website";
            }

            // Is a general page
            else {
                $type = 'WebPage';
            }

            echo 'itemscope="itemscope" itemtype="' . $schema . $type . '"';
        }



        /*********************************
        WP_HEAD CLEANUP
        The default wordpress head is a mess. 
        Let's clean it up by removing all 
        the junk we don't need.
         **********************************/

        function plate_head_cleanup()
        {

            // category feeds
            remove_action('wp_head', 'feed_links_extra', 3);

            // post and comment feeds
            remove_action('wp_head', 'feed_links', 2);

            // EditURI link
            remove_action('wp_head', 'rsd_link');

            // windows live writer
            remove_action('wp_head', 'wlwmanifest_link');

            // previous link
            remove_action('wp_head', 'parent_post_rel_link');

            // start link
            remove_action('wp_head', 'start_post_rel_link');

            // links for adjacent posts
            remove_action('wp_head', 'adjacent_posts_rel_link_wp_head');

            // WP version
            remove_action('wp_head', 'wp_generator');

            // remove WP version from css
            add_filter('style_loader_src', 'plate_remove_wp_ver_css_js', 9999);

            // remove WP version from scripts
            add_filter('script_loader_src', 'plate_remove_wp_ver_css_js', 9999);
        } /* end plate head cleanup */


        // remove WP version from RSS
        function plate_rss_version()
        {

            return ''; // it's as if it is not even there

        }

        // remove WP version from scripts
        function plate_remove_wp_ver_css_js($src)
        {

            if (strpos($src, 'ver='))

                $src = remove_query_arg('ver', $src);

            return $src;
        }

        // remove injected CSS for recent comments widget
        function plate_remove_wp_widget_recent_comments_style()
        {

            if (has_filter('wp_head', 'wp_widget_recent_comments_style')) {

                remove_filter('wp_head', 'wp_widget_recent_comments_style');
            }
        }

        // remove injected CSS from recent comments widget
        function plate_remove_recent_comments_style()
        {

            global $wp_widget_factory;

            if (isset($wp_widget_factory->widgets['WP_Widget_Recent_Comments'])) {

                remove_action('wp_head', array($wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style'));
            }
        }

        // remove injected CSS from gallery
        function plate_gallery_style($css)
        {

            return preg_replace("!<style type='text/css'>(.*?)</style>!s", '', $css);
        }




/*********************
SCRIPTS & ENQUEUEING
*********************/

        // loading modernizr and jquery, comment reply and custom scripts
        function plate_scripts_and_styles()
        {

            global $wp_styles; // call global $wp_styles variable to add conditional wrapper around ie stylesheet the WordPress way

            if (!is_admin()) {


                // STYLES
                /*********************/


                // register main stylesheet
               // wp_enqueue_style('plate-stylesheet', get_theme_file_uri() . '/library/css/style.css', array(), '', 'all');
               wp_enqueue_style('styles', get_theme_file_uri() . '/build/styles/style.css', array(), '', 'all');



                // SCRIPTS
                /*********************/

  
                // comment reply script for threaded comments
                if (is_singular() and comments_open() and (get_option('thread_comments') == 1)) {
                    wp_enqueue_script('comment-reply');
                }
                
                // // adding scripts file in the footer
                // wp_enqueue_script('plate-js', get_theme_file_uri() . '/library/js/scripts.js', array('jquery'), '', true);

                // // accessibility (a11y) scripts
                // wp_enqueue_script('plate-a11y', get_theme_file_uri() . '/library/js/a11y.js', array('jquery'), '', true);


                // JavaScript
                /*********************/
                wp_enqueue_script('javascript', get_template_directory_uri() . '/build/js/index-min.js', array(), false, true);

            //     // Barba Scripts
            //     // wp_enqueue_script('barba', get_template_directory_uri() . '/library/js/barba/barba.js', array(), '', true);

            //     // MODAL -> THEME SETTINGS
            //     wp_enqueue_script('modal', get_template_directory_uri() . '/library/js/modal.js', array(), false, '1.0.0' );

            //     // locomotive scroll
            //     wp_enqueue_script('loco', 'https://cdn.jsdelivr.net/npm/locomotive-scroll@4.0.6/dist/locomotive-scroll.min.js', array(), false, true );

            //     // GSAP Scripts
            //      wp_enqueue_script('gsap', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.6.0/gsap.min.js', array(), false, true);

            //   //   wp_enqueue_script('custom-ease', get_template_directory_uri() . '/library/js/customEase.js', array(), false, true);
            //      // Scroll Trigger
            //      wp_enqueue_script('gsap-scrolltrigger', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.6.0/ScrollTrigger.min.js', array(), false, true);
            //      wp_enqueue_script('homepage-animation', get_template_directory_uri() . '/library/js/homepage-animation.js', array(), false, true);

            //      // Class Components

            //   //  wp_enqueue_script('faq', get_template_directory_uri() . '/blocks/NS-blocks/js/min/faqs-min.js', array(), false, true);
            //   //  wp_enqueue_script('portfolio-slider', get_template_directory_uri() . '/blocks/NS-blocks/js/min/portfolio-min.js', array(), false, true);

            //     // Header
            //     wp_enqueue_script('header', get_template_directory_uri() . '/library/js/header.js', array(), '', true );


            //      wp_enqueue_script('gsap-user', get_template_directory_uri() . '/library/js/min/gsap-user-min.js', array(), false, true);
              





                 



                $wp_styles->add_data('plate-ie-only', 'conditional', 'lt IE 9'); // add conditional wrapper around ie stylesheet


  

            }
        }


/*********************
ACF SCRIPTS
*********************/

        function my_acf_admin_enqueue_scripts() {

           

        }



        // Remove the p from around imgs (http://css-tricks.com/snippets/wordpress/remove-paragraph-tags-from-around-images/)
        // This only works for the main content box, not using ACF or other page builders.
        // Added small bit of javascript in scripts.js that will work everywhere. 
        // Keeping this in in case people are still using it.
        add_filter('the_content', 'plate_filter_ptags_on_images');

        function plate_filter_ptags_on_images($content)
        {

            return preg_replace('/<pp>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
        }


        // Simple function to remove the [...] from excerpt and add a 'Read More �' link.
        function plate_excerpt_more($more)
        {
            global $post;
            // edit here if you like
            return '...  <a class="excerpt-read-more" href="' . get_permalink($post->ID) . '" title="' . __('Read ', 'dmtheme') . esc_attr(get_the_title($post->ID)) . '">' . __('Read more &raquo;', 'dmtheme') . '</a>';
        }



        /*********************
THEME SUPPORT
         *********************/

        // support all of the theme things
        function plate_theme_support()
        {

            // wp thumbnails (see sizes above)
            add_theme_support('post-thumbnails');

            // default thumb size
            set_post_thumbnail_size(125, 125, true);

            // wp custom background (thx to @bransonwerner for update)
            add_theme_support(
                'custom-background',
                array(

                    'default-image' => '',    // background image default
                    'default-color' => '',    // background color default (dont add the #)
                    'wp-head-callback' => '_custom_background_cb',
                    'admin-head-callback' => '',
                    'admin-preview-callback' => '',

                )
            );

            // Custom Header Image
            add_theme_support(
                'custom-header',
                array(

                    'default-image'      => get_template_directory_uri() . '/library/images/header-image.png',
                    'default-text-color' => '000',
                    'width'              => 1440,
                    'height'             => 220,
                    'flex-width'         => true,
                    'flex-height'        => true,
                    'header-text'        => true,
                    'uploads'            => true,
                    'wp-head-callback'   => 'plate_style_header',

                )
            );

            // Custom Logo
            add_theme_support(
                'custom-logo',
                array(

                    'height'      => 100,
                    'width'       => 100,
                    'flex-height' => true,
                    'flex-width'  => true,
                    'header-text' => array('site-title', 'site-description'),

                )
            );

            // rss thingy
            add_theme_support('automatic-feed-links');

            // To add another menu, uncomment the second line and change it to whatever you want. You can have even more menus.
            register_nav_menus(
                array(

                    'main-nav' => __('The Main Menu', 'dmtheme'),   // main nav in header
                    'footer-links' => __('Footer Links', 'dmtheme') // secondary nav in footer. Uncomment to use or edit.

                )
            );

            // Title tag. Note: this still isn't working with Yoast SEO
            add_theme_support('title-tag');

            // Add theme support for selective refresh for widgets.
            add_theme_support('customize-selective-refresh-widgets');

            // Enable support for HTML5 markup.
            add_theme_support(
                'html5',
                array(

                    'comment-list',
                    'comment-form',
                    'search-form',
                    'gallery',
                    'caption'

                )
            );

            /* 
    * POST FORMATS
    * Ahhhh yes, the wild and wonderful world of Post Formats. 
    * I've never really gotten into them but I could see some
    * situations where they would come in handy. Here's a few
    * examples: https://www.competethemes.com/blog/wordpress-post-format-examples/
    * 
    * This theme doesn't use post formats per se but we need this 
    * to pass the theme check.
    * 
    * We may add better support for post formats in the future.
    * 
    * If you want to use them in your project, do so by all means. 
    * We won't judge you. Ok, maybe a little bit.
    *
    */

            add_theme_support(
                'post-formats',
                array(

                    'aside',             // title less blurb
                    'gallery',           // gallery of images
                    'link',              // quick link to other site
                    'image',             // an image
                    'quote',             // a quick quote
                    'status',            // a Facebook like status update
                    'video',             // video
                    'audio',             // audio
                    'chat'               // chat transcript

                )
            );



        } /* end plate theme support */


        /** 
         * $content_width.
         * 
         * We need this to pass the theme check. Massive eye roll.
         * IT DOESN'T MAKE SENSE WITH RESPONSIVE LAYOUTS.
         * I'm looking at you, WordPress Trac peoples.
         * 
         * Probably best to not touch this unless you really want to
         * assign a maximum content width.
         * 
         * https://codex.wordpress.org/Content_Width
         * 
         */

        if (!isset($content_width)) {
            $content_width = '100%';
        }


        /* 


        /*********************
        RELATED POSTS FUNCTION
         *********************/

        /**
         * Plate Related Posts.
         * 
         * Adapted from this gist:
         * https://gist.github.com/claudiosanches/3167825
         * 
         * Replaced old related posts function from Bones.
         * Added: 2018-05-03
         *
         * Usage:
         * To show related by categories:
         * Add in single.php <?php plate_related_posts(); ?>.
    * To show related by tags:
    * Add in single.php <?php plate_related_posts('tag'); ?>.
    *
    * @global array $post
    * WP global post.
    * @param string $display
    * Set category or tag.
    * @param int $qty
    * Number of posts to be displayed.
    * @param bool $images
    * Enable or disable displaying images.
    * @param string $title
    * Set the widget title.
    */

    function plate_related_posts($display = 'category', $qty = 5, $images = true, $title = 'Related Posts')
    {
    global $post;
    $show = false;
    $post_qty = (int) $qty;
    switch ($display):
    case 'tag':
    $tags = wp_get_post_tags($post->ID);
    if ($tags) {
    $show = true;
    $tag_ids = array();
    foreach ($tags as $individual_tag) {
    $tag_ids[] = $individual_tag->term_id;
    }
    $args = array(
    'tag__in' => $tag_ids,
    'post__not_in' => array($post->ID),
    'posts_per_page' => $post_qty,
    'ignore_sticky_posts' => 1
    );
    }
    break;
    default:
    $categories = get_the_category($post->ID);
    if ($categories) {
    $show = true;
    $category_ids = array();
    foreach ($categories as $individual_category) {
    $category_ids[] = $individual_category->term_id;
    }
    $args = array(
    'category__in' => $category_ids,
    'post__not_in' => array($post->ID),
    'showposts' => $post_qty,
    'ignore_sticky_posts' => 1
    );
    }
    endswitch;
    if ($show == true) {
    $related = new wp_query($args);
    if ($related->have_posts()) {
    $layout = '<div class="related-posts">';
        $layout .= '<h3>' . strip_tags($title) . '</h3>';
        $layout .= '<ul class="nostyle related-posts-list">';
            while ($related->have_posts()) {
            $related->the_post();
            $layout .= '<li class="related-post">';
                if ($images == true) {
                $layout .= '<span class="related-thumb">';
                    $layout .= '<a href="' . get_permalink() . '" title="' . get_the_title() . '">' .
                        get_the_post_thumbnail() . '</a>';
                    $layout .= '</span>';
                }
                $layout .= '<span class="related-title">';
                    $layout .= '<a href="' . get_permalink() . '" title="' . get_the_title() . '">' . get_the_title() .
                        '</a>';
                    $layout .= '</span>';
                $layout .= '</li>';
            }
            $layout .= '</ul>';
        $layout .= '</div>';
    echo $layout;
    }
    wp_reset_query();
    }
    }


    /*********************
    PAGE NAVI
    *********************/

    /*
    * Numeric Page Navi (built into the theme by default).
    * (Updated 2018-05-17)
    *
    * If you're using this with a custom WP_Query, make sure
    * to add your query variable as an argument and this
    * function will play nice. Example:
    *
    * plate_page_navi( $query );
    *
    * Also make sure your query has pagination set, e.g.:
    * $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
    * (or something similar)
    * See the codex: https://codex.wordpress.org/Pagination
    *
    */

    function plate_page_navi($wp_query)
    {
    $pages = $wp_query->max_num_pages;
    $big = 999999999; // need an unlikely integer

    if ($pages > 1) {
    $page_current = max(1, get_query_var('paged'));

    echo '<nav class="pagination">';

        echo paginate_links(array(
        'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
        'format' => '?paged=%#%',
        'current' => $page_current,
        'total' => $pages,
        'prev_text' => '&larr;',
        'next_text' => '&rarr;',
        'type' => 'list',
        'end_size' => 3,
        'mid_size' => 3
        ));

        echo '</nav>';
    }
    }


    /*
    ****************************************
    * PLATE SPECIAL FUNCTIONS *
    ****************************************
    */

    // Body Class functions
    // Adds more slugs to body class so we can style individual pages + posts.
    add_filter('body_class', 'plate_body_class');

    function plate_body_class($classes)
    {

    // Adds new classes for blogroll page (list of blog posts)
    // good for containing full-width images from Gutenberg
    // Added: 2018-12-07
    global $wp_query;

    if (isset($wp_query) && (bool) $wp_query->is_posts_page) {
    $classes[] = 'blogroll page-blog';
    }

    global $post;

    if (isset($post)) {

    /* Un comment below if you want the post_type-post_name body class */
    /* $classes[] = $post->post_type . '-' . $post->post_name; */

    $pagetemplate = get_post_meta($post->ID, '_wp_page_template', true);
    $classes[] = sanitize_html_class(str_replace('.', '-', $pagetemplate), '');
    $classes[] = $post->post_name;
    }

    if (is_page()) {

    global $post;

    if ($post->post_parent) {

    // Parent post name/slug
    $parent = get_post($post->post_parent);
    $classes[] = $parent->post_name;

    // Parent template name
    $parent_template = get_post_meta($parent->ID, '_wp_page_template', true);

    if (!empty($parent_template))
    $classes[] = 'template-' . sanitize_html_class(str_replace('.', '-', $parent_template), '');
    }

    // If we *do* have an ancestors list, process it
    // http://codex.wordpress.org/Function_Reference/get_post_ancestors
    if ($parents = get_post_ancestors($post->ID)) {

    foreach ((array) $parents as $parent) {

    // As the array contains IDs only, we need to get each page
    if ($page = get_page($parent)) {
    // Add the current ancestor to the body class array
    $classes[] = "{$page->post_type}-{$page->post_name}";
    }
    }
    }

    // Add the current page to our body class array
    $classes[] = "{$post->post_type}-{$post->post_name}";
    }

    if (is_page_template('single-full.php')) {
    $classes[] = 'single-full';
    }

    return $classes;
    }


    /*
    * QUICKTAGS
    *
    * Let's add some extra Quicktags for clients who aren't HTML masters
    * They are pretty handy for HTML masters too.
    *
    * Hook into the 'admin_print_footer_scripts' action
    *
    */
    add_action('admin_print_footer_scripts', 'plate_custom_quicktags');

    function plate_custom_quicktags()
    {

    if (wp_script_is('quicktags')) { ?>

    <script type="text/javascript">
    QTags.addButton('qt-p', 'p', '<p>', '</p>', '', '', 1);
    QTags.addButton('qt-br', 'br', '<br>', '', '', '', 9);
    QTags.addButton('qt-span', 'span', '<span>', '</span>', '', '', 11);
    QTags.addButton('qt-h2', 'h2', '<h2>', '</h2>', '', '', 12);
    QTags.addButton('qt-h3', 'h3', '<h3>', '</h3>', '', '', 13);
    QTags.addButton('qt-h4', 'h4', '<h4>', '</h4>', '', '', 14);
    QTags.addButton('qt-h5', 'h5', '<h5>', '</h5>', '', '', 15);
    </script>

    <?php }
        }

        // Load dashicons on the front end
        // To use, go here and copy the css/html for the dashicon you want: https://developer.wordpress.org/resource/dashicons/
        // Example: <span class="dashicons dashicons-wordpress"></span>

        add_action( 'wp_enqueue_scripts', 'template_load_dashicons' );

        function template_load_dashicons() {

            wp_enqueue_style( 'dashicons' );

        }


        // Post Author function (from WP Twenty Seventeen theme)
        // We use this in the byline template part but included here in case you want to use it elsewhere.
        if (!function_exists('plate_posted_on')) :
            /**
             * Prints HTML with meta information for the current post-date/time and author.
             */
            function plate_posted_on()
            {

                // Get the author name; wrap it in a link.
                $byline = sprintf(

                    /* translators: %s: post author */
                    __('by %s', 'dmtheme'),
                    '<span class="author vcard"><a class="url fn n" href="' . esc_url(get_author_posts_url(get_the_author_meta('ID'))) . '">' . get_the_author() . '</a></span>'

                );

                // Finally, let's write all of this to the page.
                echo '<span class="posted-on">' . plate_time_link() . '</span><span class="byline"> ' . $byline . '</span>';
            }
        endif;


        // Post Time function (from WP Twenty Seventeen theme)
        if (!function_exists('plate_time_link')) :
            /**
             * Gets a nicely formatted string for the published date.
             */
            function plate_time_link()
            {

                $time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
                // if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
                //   $time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
                // }

                $time_string = sprintf(
                    $time_string,
                    get_the_date(DATE_W3C),
                    get_the_date(),
                    get_the_modified_date(DATE_W3C),
                    get_the_modified_date()
                );

                // Wrap the time string in a link, and preface it with 'Posted on'.
                return sprintf(

                    /* translators: %s: post date */
                    __('<span class="screen-reader-text">Posted on</span> %s', 'dmtheme'),
                    '<a href="' . esc_url(get_permalink()) . '" rel="bookmark">' . $time_string . '</a>'

                );
            }
        endif;


        /** 
         * Dashboard Widget
         * 
         * Add a widget to the dashboard in the WP Admin.
         * Great to add instructions or info for clients.
         *  
         * If you don't need/want this, just remove it or 
         * comment it out.
         * 
         * Customize it...yeaaaahhh...but don't criticize it.
         * 
         * 
         */

        function plate_add_dashboard_widgets()
        {

            // Call the built-in dashboard widget function with our callback
            wp_add_dashboard_widget(
                'plate_dashboard_widget', // Widget slug. Also the HTML id for styling in admin.scss.
                __('Welcome to your Website!', 'dirtymartini'), // Title.
                'plate_dashboard_widget_init' // Display function (below)
            );
        }
        add_action('wp_dashboard_setup', 'plate_add_dashboard_widgets');

        // Create the function to output the contents of our Dashboard Widget.
        function plate_dashboard_widget_init()
        {

            // helper vars for links and images and stuffs.
            $url = get_admin_url();
            $img = get_theme_file_uri() . '/library/images/Dirty-Martini-Logo.png';

            echo '<div class="dashboard-image"><img src=' . $img . '" width="96" height="96" /></div>';
            echo '<h3>You\'ve arrived at your WordPress Dashboard aka the \'Site Admin\' or \'WordPress Admin\'.</h3>';
            echo '<p><strong>Thank you for using the <a href="https://dirty-martini.com/" target="_blank">Dirty Martini</a> theme';
        }


        // Live Reload for Grunt during development
        // If your site is running locally it will load the livereload js file into the footer. This makes it possible for the browser to reload after a change has been made. 
        // if (in_array($_SERVER['REMOTE_ADDR'], array('127.0.0.1', '::1'))) {

        //     function livereload_script()
        //     {

        //         wp_register_script('livereload', 'http://localhost:35729/livereload.js?snipver=1', null, false, true);
        //         wp_enqueue_script('livereload');
        //     }

        //     add_action('wp_enqueue_scripts', 'livereload_script');
        // }




         /** 
        * TGM_Plugin_Activation class.
        * 
        * 
        */

        /**
         * Include the TGM_Plugin_Activation class.
         */

        include_once dirname(__FILE__) . '/library/class-tgm-plugin-activation.php';

        add_action('tgmpa_register', 'dmtheme_register_required_plugins');

        /**
         * Register the required plugins for this theme.
         *
         * In this example, we register five plugins:
         * - one included with the TGMPA library
         * - two from an external source, one from an arbitrary source, one from a GitHub repository
         * - two from the .org repo, where one demonstrates the use of the `is_callable` argument
         *
         * The variables passed to the `tgmpa()` function should be:
         * - an array of plugin arrays;
         * - optionally a configuration array.
         * If you are not changing anything in the configuration array, you can remove the array and remove the
         * variable from the function call: `tgmpa( $plugins );`.
         * In that case, the TGMPA default settings will be used.
         *
         * This function is hooked into `tgmpa_register`, which is fired on the WP `init` action on priority 10.
         */
        function dmtheme_register_required_plugins()
        {
            /*
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
            $plugins = array(

                // Including ACF PRO with the theme
                array(
                    'name'               => 'Advanced Custom Fields Pro', // The plugin name.
                    'slug'               => 'advanced-custom-fields-pro', // The plugin slug (typically the folder name).
                    'source'             => get_template_directory() . '/library/_plugins/advanced-custom-fields-pro.zip', // The plugin source.
                    'required'           => false, // If false, the plugin is only 'recommended' instead of required.
                    'version'            => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.
                    'force_activation'   => true, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
                    'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
                    'external_url'       => '', // If set, overrides default API URL and points to an external URL.
                    'is_callable'        => '', // If set, this callable will be be checked for availability to determine if a plugin is active.
                ),

                // Including All in One Wp Migration with the theme
                array(
                    'name'               => 'All-in-One WP Migration', // The plugin name.
                    'slug'               => 'all-in-one-wp-migration', // The plugin slug (typically the folder name).
                    'source'             => get_template_directory() . '/library/_plugins/all-in-one-wp-migration.zip', // The plugin source.
                    'required'           => false, // If false, the plugin is only 'recommended' instead of required.
                    'version'            => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.
                    'force_activation'   => true, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
                    'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
                    'external_url'       => '', // If set, overrides default API URL and points to an external URL.
                    'is_callable'        => '', // If set, this callable will be be checked for availability to determine if a plugin is active.
                ),


                // how to include a plugin from the WordPress Plugin Repository.
                // Lazy load Images
                array(
                    'name'      => 'Lazy Load by WP Rocket',
                    'slug'      => 'rocket-lazy-load',
                    'required'  => true,
                ),

                // Duplicate Post
                array(
                    'name'      => 'Duplicate Post',
                    'slug'      => 'duplicate-post',
                    'required'  => false,
                ),

                // Contact Form 7
                array(
                    'name'      => 'Contact Form 7',
                    'slug'      => 'contact-form-7',
                    'required'  => true,
                ),

                // Advanced Custom Fields: Font Awesome Field
                array(
                    'name'      => 'Advanced Custom Fields: Font Awesome Field',
                    'slug'      => 'advanced-custom-fields-font-awesome',
                    'required'  => true,
                ),

                // SVG Support
                array(
                    'name'      => 'SVG Support',
                    'slug'      => 'svg-support',
                    'required'  => true,
                ),

                // ACF Menu Field
                array(
                    'name'      => 'LuckyWP ACF Menu Field',
                    'slug'      => 'luckywp-acf-menu-field/',
                    'required'  => true,
                ),

                // This is an example of the use of 'is_callable' functionality. A user could - for instance -
                // have WPSEO installed *or* WPSEO Premium. The slug would in that last case be different, i.e.
                // 'wordpress-seo-premium'.
                // By setting 'is_callable' to either a function from that plugin or a class method
                // `array( 'class', 'method' )` similar to how you hook in to actions and filters, TGMPA can still
                // recognize the plugin as being installed.
                array(
                    'name'        => 'WordPress SEO by Yoast',
                    'slug'        => 'wordpress-seo',
                    'is_callable' => 'wpseo_init',
                ),

                // ACF Content Analysis

                array(
                    'name'      => 'ACF Content Analysis for Yoast SEO',
                    'slug'      => 'acf-content-analysis-for-yoast-seo',
                    'required'  => false,
                ),

            );

            /*
	 * Array of configuration settings. Amend each line as needed.
	 *
	 * TGMPA will start providing localized text strings soon. If you already have translations of our standard
	 * strings available, please help us make TGMPA even better by giving us access to these translations or by
	 * sending in a pull-request with .po file(s) with the translations.
	 *
	 * Only uncomment the strings in the config array if you want to customize the strings.
	 */
            $config = array(
                'id'           => 'dmtheme',                 // Unique ID for hashing notices for multiple instances of TGMPA.
                'default_path' => '',                      // Default absolute path to bundled plugins.
                'menu'         => 'tgmpa-install-plugins', // Menu slug.
                'parent_slug'  => 'themes.php',            // Parent menu slug.
                'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
                'has_notices'  => true,                    // Show admin notices or not.
                'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
                'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
                'is_automatic' => false,                   // Automatically activate plugins after installation or not.
                'message'      => '',                      // Message to output right before the plugins table.

            );

            tgmpa($plugins, $config);
        }


        // ACF OPTIONS PAGE


        if( function_exists('acf_add_options_page') ) {
	
            acf_add_options_page(array(
                'page_title' 	=> 'Theme Settings',
                'menu_title'	=> 'Theme Settings',
                'menu_slug' 	=> 'theme-general-settings',
                'capability'	=> 'edit_posts',
                'redirect'		=> false
            ));
            
            acf_add_options_sub_page(array(
                'page_title' 	=> 'Theme Header Settings',
                'menu_title'	=> 'Header',
                'parent_slug'	=> 'theme-general-settings',
            ));
            
            acf_add_options_sub_page(array(
                'page_title' 	=> 'Theme Footer Settings',
                'menu_title'	=> 'Footer',
                'parent_slug'	=> 'theme-general-settings',
            ));
            
        }





/*********************
GUTENBERG 
*********************/

// REMOVE ALL BLOCK PATTERNS

remove_theme_support( 'core-block-patterns' );

     //ADDING CUSTOM STYLESHEET FOR ALL BLOCKS


     add_action( 'after_setup_theme', 'gutenberg_css' );
 
        function gutenberg_css(){
         
         add_theme_support( 'editor-styles' ); // if you don't add this line, your stylesheet won't be added
         add_editor_style( 'build/styles/editor-styles.css' ); // tries to include style-editor.css directly from your theme folder
       }

       // JS FILES TO INCLUDE ON ALL BLOCKS IN DASHBOARD EDITOR

       function myguten_enqueue() {
        // Slick Scripts
     //   wp_enqueue_script('swiper', 'https://cdnjs.cloudflare.com/ajax/libs/Swiper/6.4.11/swiper-bundle.min.js', '', true);

    }

    add_action( 'enqueue_block_editor_assets', 'myguten_enqueue' );

    // Enqueue javascript on the frontend as well
    add_action('wp_enqueue_scripts', 'myguten_enqueue');

        // ALLOW WIDE IN GUTENBERG

        add_theme_support( 'align-wide' );
        


        // FILTER GUTENBERG BLOCKS WE DONT NEED



        add_filter( 'allowed_block_types', 'dirtymartini_allowed_block_types' );
 
        function dirtymartini_allowed_block_types( $allowed_blocks ) {
        
            return array(
               // 'core/image',
               // 'core/heading',
               // 'core/list',
               // Post Blocks
               'acf/author',
               'acf/quote',
               'acf/display-posts',
               //page blocks
                'acf/socials',
                'acf/title-section',
                'acf/button-section',
                'acf/blog-section',
                'acf/card-section',
                'acf/content-section',
                'acf/image-section',
                'acf/slideshow',
                'acf/contact-section',
                'acf/list-section',
                // NEW SPACE Page Blocks
                'acf/ns-intro',
                'acf/ns-faqs',
                'acf/ns-services',
                'acf/ns-portfolio',
                'acf/ns-testimonials',
                'acf/ns-meet-the-team',
                'acf/ns-intro-text',
                'acf/ns-timeline',
                'acf/ns-hero-services',
                'acf/ns-boxed-hero',
                'acf/ns-parallax',
                'acf/ns-basic-hero',
                'acf/ns-paragraph-sections',
                'acf/ns-overview-section',
                'acf/ns-our-team-grid',
                'acf/ns-lookbook-download',
                'acf/ns-welcome-scroll-section',
                'acf/ns-page-navigator',
                'acf/ns-gallery-slider',
                'acf/ns-map-section',
                // Hero Blocks
                'acf/hero-collage',
                'acf/hero-fullwidth',
                'acf/hero-textside-imageside',
                'acf/hero-video',
            );
        
        }


        // CUSTOM BLOCK CATEGORY

        function my_category( $categories, $post ) {
            return array_merge(
                $categories,
                array(
                    array(
                        'slug' => 'page-blocks',
                        'title' => __( 'Page Blocks', 'page-blocks' ),
                    ),
                    array(
                        'slug' => 'newspace-blocks',
                        'title' => __( 'Newspace Blocks', 'newspace-blocks' ),
                    ),
                    array(
                        'slug' => 'post-blocks',
                        'title' => __( 'Post Blocks', 'post-blocks' ),
                    ),
                    array(
                        'slug' => 'hero-blocks',
                        'title' => __( 'Hero Blocks', 'hero-blocks' ),
                    ),
                    array(
                        'slug' => 'experimental-blocks',
                        'title' => __( 'Experimental Blocks', 'experimental-blocks' ),
                    ),
                )
            );
        }
        add_filter( 'block_categories', 'my_category', 10, 2);


        // REGISTER GUTENBERG BLOCKS

        add_action('acf/init', 'my_acf_init_block_types');


        function my_acf_init_block_types() {

            // Check function exists.
            if( function_exists('acf_register_block_type') ) {

                //* NEWSPACE BLOCKS
                // *********************/


                // Register a Intro block.
                acf_register_block_type(array(
                    'name'              => 'ns-intro',
                    'title'             => __('Newspace Intro Block'),
                    'description'       => __('A Custom Newspace Intro Block.'),
                    'render_template'   => 'blocks/NS-Blocks/ns-intro.php',
                    'category'          => 'newspace-blocks',
                    'icon'              => 'align-right',
                    'keywords'          => array( 'title', 'text', 'intro' ),
                    'align' => 'full',
                    'supports'          => [
                      // customize alignment toolbar
                    'align' => array( 'full' ),

                    ]      
                ));

                // Register a Map Section.
                acf_register_block_type(array(
                    'name'              => 'ns-map-section',
                    'title'             => __('Newspace Map Section Block'),
                    'description'       => __('A Custom Newspace Map Section Block.'),
                    'render_template'   => 'blocks/NS-Blocks/ns-map-section.php',
                    'category'          => 'newspace-blocks',
                    'icon'              => 'pressthis',
                    'keywords'          => array( 'contact', 'visiting', 'map', 'section' ),
                    'align' => 'full',
                    'supports'          => [
                        // customize alignment toolbar
                    'align' => array( 'full' ),

                    ]      
                ));

                // Register a Gallery Slider.
                acf_register_block_type(array(
                    'name'              => 'ns-gallery-slider',
                    'title'             => __('Newspace Gallery Slider Block'),
                    'description'       => __('A Custom Newspace Gallery Slider Block.'),
                    'render_template'   => 'blocks/NS-Blocks/ns-gallery-slider.php',
                    'category'          => 'newspace-blocks',
                    'icon'              => 'align-right',
                    'keywords'          => array( 'title', 'text', 'gallery', 'slider' ),
                    'align' => 'full',
                    'supports'          => [
                        // customize alignment toolbar
                    'align' => array( 'full' ),

                    ]      
                ));

                // welcome scroll section
                acf_register_block_type(array(
                    'name'              => 'ns-welcome-scroll-section',
                    'title'             => __('Newspace Welcome Scroll Section'),
                    'description'       => __('A Custom Newspace scroll Block.'),
                    'render_template'   => 'blocks/NS-Blocks/ns-welcome-scroll-section.php',
                    'category'          => 'newspace-blocks',
                    'icon'              => 'fullscreen-exit-alt',
                    'keywords'          => array( 'welcome', 'scroll', 'intro' ),
                    'align' => 'full',
                    'supports'          => [
                      // customize alignment toolbar
                    'align' => array( 'full' ),

                    ]      
                ));

                // Page Navigator Section
                acf_register_block_type(array(
                    'name'              => 'ns-page-navigator',
                    'title'             => __('Newspace Page Navigator Section'),
                    'description'       => __('A Custom Page Navigator Block.'),
                    'render_template'   => 'blocks/NS-Blocks/ns-page-navigator.php',
                    'category'          => 'newspace-blocks',
                    'icon'              => 'tablet',
                    'keywords'          => array( 'navigator', 'boxes', 'links' ),
                    'align' => 'full',
                    'supports'          => [
                        // customize alignment toolbar
                    'align' => array( 'full' ),

                    ]      
                ));

                // Register a Basic Hero block.
                acf_register_block_type(array(
                    'name'              => 'ns-basic-hero',
                    'title'             => __('Newspace Basic Hero Block'),
                    'description'       => __('A Custom Newspace basic hero block.'),
                    'render_template'   => 'blocks/NS-Blocks/ns-basic-hero.php',
                    'category'          => 'newspace-blocks',
                    'icon'              => 'desktop',
                    'keywords'          => array( 'hero', 'basic', 'block' ),
                    'align' => 'full',
                    'supports'          => [
                        // customize alignment toolbar
                    'align' => array( 'full' ),

                    ]      
                ));

                // Register a Paragraph Sections Block.
                acf_register_block_type(array(
                    'name'              => 'ns-paragraph-sections',
                    'title'             => __('Newspace Paragraph Sections Block'),
                    'description'       => __('A Custom Newspace Paragraph Sections Block.'),
                    'render_template'   => 'blocks/NS-Blocks/ns-paragraph-sections.php',
                    'category'          => 'newspace-blocks',
                    'icon'              => 'editor-alignleft',
                    'keywords'          => array( 'paragraph', 'sections', 'block' ),
                    'align' => 'full',
                    'supports'          => [
                        // customize alignment toolbar
                    'align' => array( 'full' ),

                    ]      
                ));

                // Register a Overview Section Block.
                acf_register_block_type(array(
                    'name'              => 'ns-overview-section',
                    'title'             => __('Newspace Overview Section Block'),
                    'description'       => __('A Custom Newspace Overview Section Block.'),
                    'render_template'   => 'blocks/NS-Blocks/ns-overview-section.php',
                    'category'          => 'newspace-blocks',
                    'icon'              => 'table-row-after',
                    'keywords'          => array( 'overview', 'images', 'block' ),
                    'align' => 'full',
                    'supports'          => [
                        // customize alignment toolbar
                    'align' => array( 'full' ),

                    ]      
                ));

                // Register a Our Team Grid Block.
                acf_register_block_type(array(
                    'name'              => 'ns-our-team-grid',
                    'title'             => __('Newspace Our Team Grid Block'),
                    'description'       => __('A Custom Newspace Our Team Grid Block.'),
                    'render_template'   => 'blocks/NS-Blocks/ns-our-team-grid.php',
                    'category'          => 'newspace-blocks',
                    'icon'              => 'layout',
                    'keywords'          => array( 'team', 'grid', 'block' ),
                    'align' => 'full',
                    'supports'          => [
                        // customize alignment toolbar
                    'align' => array( 'full' ),

                    ]      
                ));

                // Register a Lookbook Download Block.
                acf_register_block_type(array(
                    'name'              => 'ns-lookbook-download',
                    'title'             => __('Newspace Lookbook Download Block'),
                    'description'       => __('A Custom Newspace Lookbook Download Block.'),
                    'render_template'   => 'blocks/NS-Blocks/ns-lookbook-download.php',
                    'category'          => 'newspace-blocks',
                    'icon'              => 'download',
                    'keywords'          => array( 'lookbook', 'download', 'block' ),
                    'align' => 'full',
                    'supports'          => [
                        // customize alignment toolbar
                    'align' => array( 'full' ),

                    ]      
                ));

                // Register a Intro block.
                acf_register_block_type(array(
                    'name'              => 'ns-parallax',
                    'title'             => __('Parallax Image Block'),
                    'description'       => __('A Custom Newspace Image Block.'),
                    'render_template'   => 'blocks/NS-Blocks/ns-parallax.php',
                    'category'          => 'newspace-blocks',
                    'icon'              => 'images-alt2',
                    'keywords'          => array( 'image', 'text', 'parallax' ),
                    'align' => 'full',
                    'supports'          => [
                        // customize alignment toolbar
                    'align' => array( 'full' ),

                    ]      
                ));

                          // Register a Intro Text block.
                          acf_register_block_type(array(
                            'name'              => 'ns-intro-text',
                            'title'             => __('Newspace Intro Text Block'),
                            'description'       => __('A Custom Newspace Intro Block.'),
                            'render_template'   => 'blocks/NS-Blocks/ns-intro-text.php',
                            'category'          => 'newspace-blocks',
                            'icon'              => 'editor-paragraph',
                            'keywords'          => array( 'title', 'text', 'intro' ),
                            'align' => 'full',
                            'supports'          => [
                                // customize alignment toolbar
                            'align' => array( 'full' ),
        
                            ]      
                        ));

                        // Register a FAQ block.
                        acf_register_block_type(array(
                        'name'              => 'ns-faqs',
                        'title'             => __('Newspace FAQ Block'),
                        'description'       => __('A Custom Newspace FAQ Block.'),
                        'render_template'   => 'blocks/NS-Blocks/ns-faqs.php',
                        'category'          => 'newspace-blocks',
                        'icon'              => 'admin-comments',
                        'keywords'          => array( 'faq', 'question', 'faqs' ),
                        'align' => 'full',
                        'supports'          => [
                            // customize alignment toolbar
                        'align' => array( 'full' ),
    
                        ]      
                    ));

        
                        // Hero Services
                        acf_register_block_type(array(
                            'name'              => 'ns-hero-services',
                            'title'             => __('Hero for Service Pages'),
                            'description'       => __('A Custom Hero Section.'),
                            'render_template'   => 'blocks/NS-Blocks/ns-hero-service.php',
                            'category'          => 'newspace-blocks',
                            'icon'              => 'desktop',
                            'keywords'          => array( 'hero', 'service', 'full', 'full-width' ),
                            'align' => 'full',
                            'supports'          => [
                                // customize alignment toolbar
                            'align' => array( 'full' ),
                                // This property allows the block to be added multiple times. Defaults to true.
                                'multiple'      => false,
        
                            ]
                    ));

                    // boxed Hero
                    acf_register_block_type(array(
                        'name'              => 'ns-boxed-hero',
                        'title'             => __('Boxed Hero'),
                        'description'       => __('A Custom Hero Section.'),
                        'render_template'   => 'blocks/NS-Blocks/ns-boxed-hero.php',
                        'category'          => 'newspace-blocks',
                        'icon'              => 'desktop',
                        'keywords'          => array( 'hero', 'service', 'boxed' ),
                        'align' => 'full',
                        'supports'          => [
                            // customize alignment toolbar
                        'align' => array( 'full' ),
                            // This property allows the block to be added multiple times. Defaults to true.
                            'multiple'      => false,
    
                        ]
                ));
        
                        // register a Timeline block.
                        acf_register_block_type(array(
                            'name'              => 'ns-timeline',
                            'title'             => __('Newspace Timeline'),
                            'description'       => __('A Custom Case Kit.'),
                            'render_template'   => 'blocks/NS-Blocks/ns-timeline.php',
                            'category'          => 'newspace-blocks',
                            'icon'              => 'table-col-after',
                            'keywords'          => array( 'case', 'work', 'details', 'timeline' ),
                            'supports'          => [
                                'align' => ['full'],
                            ]
                        ));
        

                // Register a Services block.
                acf_register_block_type(array(
                    'name'              => 'ns-services',
                    'title'             => __('Newspace Services Block'),
                    'description'       => __('A Custom Newspace Services Block.'),
                    'render_template'   => 'blocks/NS-Blocks/ns-services.php',
                    'category'          => 'newspace-blocks',
                    'icon'              => 'images-alt',
                    'keywords'          => array( 'services' ),
                    'align' => 'full',
                    'supports'          => [
                      // customize alignment toolbar
                    'align' => array( 'full' ),

                    ],
                    'enqueue_assets' => function(){ 
                      //  wp_enqueue_script('services-slider', get_template_directory_uri() . '/library/js/blocks/services.js', array('jquery'), '', true);
                      }      
                ));


                // Register a Portfolio block.
                acf_register_block_type(array(
                    'name'              => 'ns-portfolio',
                    'title'             => __('Newspace Portfolio Block'),
                    'description'       => __('A Custom Newspace Portfolio Block.'),
                    'render_template'   => 'blocks/NS-Blocks/ns-portfolio.php',
                    'category'          => 'newspace-blocks',
                    'icon'              => 'table-col-after',
                    'keywords'          => array( 'portfolio' ),
                    'align' => 'full',
                    'supports'          => [
                        // customize alignment toolbar
                    'align' => array( 'full' ),

                    ]      
                ));


                // Register a testimonials block.
                acf_register_block_type(array(
                    'name'              => 'ns-testimonials',
                    'title'             => __('Newspace testimonials Block'),
                    'description'       => __('A Custom Newspace testimonials Block.'),
                    'render_template'   => 'blocks/NS-Blocks/ns-testimonials.php',
                    'category'          => 'newspace-blocks',
                    'icon'              => 'image-filter',
                    'keywords'          => array( 'testimonials' ),
                    'align' => 'full',
                    'supports'          => [
                        // customize alignment toolbar
                    'align' => array( 'full' ),

                    ]      
                ));

                // Register a meet-the-team block.
                acf_register_block_type(array(
                    'name'              => 'ns-meet-the-team',
                    'title'             => __('Newspace Meet the Team Block'),
                    'description'       => __('A Custom Newspace Meet the Team Block.'),
                    'render_template'   => 'blocks/NS-Blocks/ns-meet-the-team.php',
                    'category'          => 'newspace-blocks',
                    'icon'              => 'admin-users',
                    'keywords'          => array( 'team' ),
                    'align' => 'full',
                    'supports'          => [
                        // customize alignment toolbar
                    'align' => array( 'full' ),

                    ]      
                ));

                //* PAGE BLOCKS
                // *********************/

                // Register a title Section block.
                acf_register_block_type(array(
                    'name'              => 'title-section',
                    'title'             => __('Title Section'),
                    'description'       => __('A Custom Title Section.'),
                    'render_template'   => 'blocks/page/title-section.php',
                    'category'          => 'page-blocks',
                    'icon'              => 'editor-textcolor',
                    'keywords'          => array( 'title', 'text' ),
                    'align' => 'full',
                    'supports'          => [
                      // customize alignment toolbar
                    'align' => array( 'full' ),

                    ],
                    'example'           => array(
                        'attributes' => array(
                            'mode' => 'preview',
                            'data' => array(
                                'title'   => "Enter your title",
                                'sub_title' => "Enter your sub title",
                                'description'  => "Enter your description",
                                'position' => 'middle__title',
                                'is_preview'    => true
                            )
                        )
                            )
                            
                ));


                // Register a Blog Section block.
                acf_register_block_type(array(
                    'name'              => 'blog-section',
                    'title'             => __('Blog Section'),
                    'description'       => __('A Custom Blog Section.'),
                    'render_template'   => 'blocks/page/blog-section.php',
                    'category'          => 'page-blocks',
                    'icon'              => 'editor-paragraph',
                    'keywords'          => array( 'blog', 'text' ),
                    'align' => 'full',
                    'supports'          => [
                        // customize alignment toolbar
                      'align' => array( 'full' ),
  
                      ],
                    'example'           => array(
                        'attributes' => array(
                            'mode' => 'preview',
                            'data' => array(
                                'b_title'   => "Enter your title",
                                'is_preview'    => true
                            )
                        )
                            )
                ));

                // Register a Contact Section block.
                acf_register_block_type(array(
                    'name'              => 'contact-section',
                    'title'             => __('Contact Section'),
                    'description'       => __('A Custom contact Section.'),
                    'render_template'   => 'blocks/page/contact-section.php',
                    'category'          => 'page-blocks',
                    'icon'              => 'admin-comments',
                    'align' => 'full',
                    'supports'          => [
                        // customize alignment toolbar
                      'align' => array( 'full' ),
  
                      ],
                    'example'           => array(
                        'attributes' => array(
                            'mode' => 'preview',
                            'data' => array(
                                'form_title'   => "Enter your title",
                                'form_desc'  => "Enter your description",
                                'contact_form_id' => '[contact-form-7 id="5" title="Contact form 1"]',
                                'is_preview'    => true
                            )
                        )
                            ),
                    'keywords'          => array( 'contact', 'form' )
                ));

                // Register a Slideshow block.
                acf_register_block_type(array(
                    'name'              => 'slideshow',
                    'title'             => __('Slideshow'),
                    'description'       => __('A Custom Slideshow.'),
                    'render_template'   => 'blocks/page/slideshow.php',
                    'category'          => 'page-blocks',
                    'icon'              => 'slides',
                    'align' => 'full',
                    'supports'          => [
                        // customize alignment toolbar
                      'align' => array( 'full' ),
  
                      ],
                      'example' => [
                        'attributes' => [
                            'mode' => false,
                            'data' => ['is_example' => true],
                        ]
                        ],
                    'keywords'          => array( 'slideshow', 'slides', 'carousel' ),
                    'enqueue_assets' => function(){ 
                      //  wp_enqueue_script('user-slick', get_template_directory_uri() . '/library/js/blocks/user-slick.js', array('jquery'), '', true);
                      }
                ));

                // Register a Content Section block.
                acf_register_block_type(array(
                    'name'              => 'content-section',
                    'title'             => __('Content Section'),
                    'description'       => __('A Custom Content Section.'),
                    'render_template'   => 'blocks/page/content-section.php',
                    'category'          => 'page-blocks',
                    'icon'              => 'editor-contract',
                    'keywords'          => array( 'content', 'text', 'html', 'raw' ),
                    'example'           => array(
                        'attributes' => array(
                            'mode' => 'preview',
                            'data' => array(
                                'content_area'   => "Enter your title",
                                'is_preview'    => true
                            )
                        )
                            ),
                    'align' => 'full',
                    'supports'          => [
                        // customize alignment toolbar
                      'align' => array( 'full' ),
  
                      ],
                ));

                // Register a List Section block.
                acf_register_block_type(array(
                    'name'              => 'list-section',
                    'title'             => __('List Section'),
                    'description'       => __('A Custom List Section.'),
                    'render_template'   => 'blocks/page/list-section.php',
                    'category'          => 'page-blocks',
                    'icon'              => 'list-view',
                    'keywords'          => array( 'List', 'text' ),
                    'enqueue_assets' => function(){ 
                     //   wp_enqueue_script('user-list', get_template_directory_uri() . '/library/js/blocks/list.js', array('jquery'), '', true);
                      },
                      'example'           => array(
                        'attributes' => array(
                            'mode' => false,
                            'data' => array(                        
                                'is_preview'    => true
                            )
                        )
                        ),
                    'align' => 'full',
                    'supports'          => [
                        // customize alignment toolbar
                      'align' => array( 'full' ),
  
                      ]
                ));

                // register a Card Section block.
                acf_register_block_type(array(
                    'name'              => 'card-section',
                    'title'             => __('Card Section'),
                    'description'       => __('A Custom Card Section.'),
                    'render_template'   => 'blocks/page/card-section.php',
                    'category'          => 'page-blocks',
                    'icon'              => 'admin-page',
                    'keywords'          => array( 'card', 'section', 'options' ),
                    'example'           => array(
                        'attributes' => array(
                            'mode' => 'preview',
                            'data' => array(                        
                                'is_preview'    => true
                            )
                        )
                        ),
                    'align' => 'full',
                    'supports'          => [
                        // customize alignment toolbar
                      'align' => array( 'full' ),
  
                      ],
                ));

                // register a Image Section block.
                acf_register_block_type(array(
                    'name'              => 'image-section',
                    'title'             => __('Image Section'),
                    'description'       => __('A Custom Image Section.'),
                    'render_template'   => 'blocks/page/image-section.php',
                    'category'          => 'page-blocks',
                    'icon'              => 'images-alt2',
                    'keywords'          => array( 'image', 'section', 'images' ),
                    'example'           => array(
                        'attributes' => array(
                            'mode' => 'preview',
                            'data' => array(                        
                                'is_preview'    => true
                            )
                        )
                        ),
                    // make sure image is always on top if paired with text next to it on mobile
                    'enqueue_script' => get_template_directory_uri() . '/library/js/blocks/min/image-section-min.js',
                    
                    'align' => 'full',
                    'supports'          => [
                        // customize alignment toolbar
                      'align' => array( 'full' ),
  
                      ],
                ));

                // register a Gallery Section block.
                acf_register_block_type(array(
                    'name'              => 'gallery',
                    'title'             => __('Gallery'),
                    'description'       => __('A Custom Gallery Section.'),
                    'render_template'   => 'blocks/page/gallery.php',
                    'category'          => 'page-blocks',
                    'icon'              => 'embed-photo',
                    'keywords'          => array( 'image', 'section', 'images', 'gallery' ),
                    'example'           => array(
                        'attributes' => array(
                            'mode' => 'preview',
                            'data' => array(                        
                                'is_preview'    => true
                            )
                        )
                    ),
                    'enqueue_assets' => function(){ 
                    //    wp_enqueue_script('gallery', get_template_directory_uri() . '/library/js/blocks/min/gallery-min.js', array(), '', true);
                        },
                    'align' => 'full',
                    'supports'          => [
                        // customize alignment toolbar
                        'align' => array( 'full' ),
                        ],
                ));

                // register a Button Section block.
                acf_register_block_type(array(
                    'name'              => 'button-section',
                    'title'             => __('Button Section'),
                    'description'       => __('A Custom Button Section.'),
                    'render_template'   => 'blocks/page/button-section.php',
                    'category'          => 'page-blocks',
                    'icon'              => 'admin-links',
                    'keywords'          => array( 'title', 'text' ),
                                        'example'           => array(
                        'attributes' => array(
                            'mode' => 'preview',
                            'data' => array(                        
                                'is_preview'    => true
                            )
                        )
                        ),
                    
                    'align' => 'full',
                    'supports'          => [
                        // customize alignment toolbar
                      'align' => array( 'full' ),
  
                      ],
                ));

                // register a Socials block.
                acf_register_block_type(array(
                    'name'              => 'socials',
                    'title'             => __('Socials'),
                    'description'       => __('A Custom Social Icon Section.'),
                    'render_template'   => 'blocks/page/socials.php',
                    'category'          => 'page-blocks',
                    'icon'              => 'instagram',
                    'keywords'          => array( 'social', 'socials', 'facebook', 'twitter', 'instagram' ),
                                        'example'           => array(
                        'attributes' => array(
                            'mode' => 'preview',
                            'data' => array(                        
                                'is_preview'    => true
                            )
                        )
                        ),
                    
                    'align' => 'full',
                    'supports'          => [
                        // customize alignment toolbar
                      'align' => array( 'full' ),
  
                      ],
                ));


                 //* HERO BLOCKS
                // *********************/


                // Hero Full Width
                    acf_register_block_type(array(
                        'name'              => 'hero-fullwidth',
                        'title'             => __('Hero Full-Width'),
                        'description'       => __('A Custom Hero Section.'),
                        'render_template'   => 'blocks/hero/hero-fullwidth.php',
                        'category'          => 'hero-blocks',
                        'icon'              => 'desktop',
                        'keywords'          => array( 'hero', 'fullwidth', 'full', 'full-width' ),
                                              'example'           => array(
                        'attributes' => array(
                            'mode' => 'preview',
                            'data' => array(                        
                                'is_preview'    => true
                            )
                        )
                        ),
                         'align' => 'full',
                         'supports'          => [
                             // customize alignment toolbar
                           'align' => array( 'full' ),
                             // This property allows the block to be added multiple times. Defaults to true.
                             'multiple'      => false,
       
                           ]
                ));

                // Hero Text Side Image Side 
                    acf_register_block_type(array(
                        'name'              => 'hero-textside-imageside',
                        'title'             => __('Hero Text Side Image Side'),
                        'description'       => __('A Custom Hero Section.'),
                        'render_template'   => 'blocks/hero/hero-imageside-textside.php',
                        'category'          => 'hero-blocks',
                        'icon'              => 'desktop',
                        'keywords'          => array( 'hero', 'text', 'image', '50-50' ),
                                                 'example'           => array(
                        'attributes' => array(
                            'mode' => 'preview',
                            'data' => array(                        
                                'is_preview'    => true
                            )
                        )
                        ),
                            'align' => 'full',
                            'supports'          => [
                                // customize alignment toolbar
                              'align' => array( 'full' ),
                                // This property allows the block to be added multiple times. Defaults to true.
                                'multiple'      => false,
          
                              ]
                ));

                // Hero Video 
                acf_register_block_type(array(
                    'name'              => 'hero-video',
                    'title'             => __('Hero Video'),
                    'description'       => __('A Custom Hero Section.'),
                    'render_template'   => 'blocks/hero/hero-video.php',
                    'category'          => 'hero-blocks',
                    'icon'              => 'desktop',
                    'keywords'          => array( 'hero', 'video' ),
                                             'example'           => array(
                        'attributes' => array(
                            'mode' => 'preview',
                            'data' => array(                        
                                'is_preview'    => true
                            )
                        )
                        ),
                        'align' => 'full',
                        'supports'          => [
                            // customize alignment toolbar
                          'align' => array( 'full' ),
                            // This property allows the block to be added multiple times. Defaults to true.
                            'multiple'      => false,
      
                          ],
            ));


                // Hero Collage
                    acf_register_block_type(array(
                        'name'              => 'hero-collage',
                        'title'             => __('Hero Collage'),
                        'description'       => __('A Custom Hero Section.'),
                        'render_template'   => 'blocks/hero/hero-collage.php',
                        'category'          => 'hero-blocks',
                        'icon'              => 'desktop',
                        'keywords'          => array( 'hero', 'collage' ),
                                              'example'           => array(
                        'attributes' => array(
                            'mode' => 'preview',
                            'data' => array(                        
                                'is_preview'    => true
                            )
                        )
                        ),
                         'align' => 'full',
                         'supports'          => [
                             // customize alignment toolbar
                           'align' => array( 'full' ),
                             // This property allows the block to be added multiple times. Defaults to true.
                             'multiple'      => false,
       
                           ]
                    
                    ));



                //* POST BLOCKS
                // *********************/


                // register Author block.
                acf_register_block_type(array(
                    'name'              => 'author',
                    'title'             => __('Author'),
                    'description'       => __('A Custom Author Block.'),
                    'render_template'   => 'blocks/post/author.php',
                    'category'          => 'post-blocks',
                    'icon'              => 'admin-users',
                    'keywords'          => array( 'author', 'post' ),
                    'example'           => array(
                        'attributes' => array(
                            'mode' => 'preview',
                            'data' => array(                        
                                'is_preview'    => true
                            )
                        )
                        ),
                    'align' => 'full',
                    'supports'          => [
                        // customize alignment toolbar
                      'align' => array( 'full' ),  
                      ],
                ));
                
                // register Quote block.
                acf_register_block_type(array(
                    'name'              => 'quote',
                    'title'             => __('Quote'),
                    'description'       => __('A Custom Quote Block.'),
                    'render_template'   => 'blocks/post/quote.php',
                    'category'          => 'post-blocks',
                    'icon'              => 'format-quote',
                    'keywords'          => array( 'quote', 'post' ),
                    'example'           => array(
                        'attributes' => array(
                            'mode' => 'preview',
                            'data' => array(                        
                                'is_preview'    => true
                            )
                        )
                        ),
                    'align' => 'full',
                    'supports'          => [
                        // customize alignment toolbar
                      'align' => array( 'full' ),  
                      ],
                ));

                // register Display Post block.
                acf_register_block_type(array(
                    'name'              => 'display-posts',
                    'title'             => __('Display Posts'),
                    'description'       => __('Displays all of your chosen articles.'),
                    'render_template'   => 'blocks/post/post-display.php',
                    'category'          => 'post-blocks',
                    'icon'              => 'admin-post',
                    'keywords'          => array( 'display', 'post', 'blogs', 'article' ),
                    // 'enqueue_script' => get_template_directory_uri() . '/template-parts/blocks/testimonial/testimonial.js',
                    'align' => 'full',
                    'supports'          => [
                        // customize alignment toolbar
                      'align' => array( 'full' ),  
                      ],
                ));

                
                //* EXPERIMENTAL BLOCKS
                // *********************/

            }
        }



        // REMOVE P TAGS FROM CONTACT FORM 7

        add_filter('wpcf7_autop_or_not', '__return_false'); 

        // remove gutenberg for certain post types

        function mgc_gutenberg_filter( $use_block_editor, $post_type ) {
            if ( 'our-portfolio' === $post_type ) {
                return false;
            }
            return $use_block_editor;
        }
        add_filter( 'use_block_editor_for_post_type', 'mgc_gutenberg_filter', 10, 2 );


        /**
         * Templates and Page IDs without editor
         *
         */
        function ea_disable_editor( $id = false ) {

            $excluded_templates = array(
                'page-our-projects.php'
            );

            $excluded_ids = array(
                // get_option( 'page_on_front' )
            );

            if( empty( $id ) )
                return false;

            $id = intval( $id );
            $template = get_page_template_slug( $id );

            return in_array( $id, $excluded_ids ) || in_array( $template, $excluded_templates );
        }


        /**
        * Disable Gutenberg by template
        *
        */

        function ea_disable_gutenberg( $can_edit, $post_type ) {

            if( ! ( is_admin() && !empty( $_GET['post'] ) ) )
                return $can_edit;

            if( ea_disable_editor( $_GET['post'] ) )
                $can_edit = false;

            return $can_edit;

        }
        add_filter( 'gutenberg_can_edit_post_type', 'ea_disable_gutenberg', 10, 2 );
        add_filter( 'use_block_editor_for_post_type', 'ea_disable_gutenberg', 10, 2 );

        ?>