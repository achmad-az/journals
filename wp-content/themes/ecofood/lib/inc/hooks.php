<?php
/*
* Creating a function to create our CPT and its taxonomy
*/

// define translation domain name variable
$domain = 'ecofood';

add_action('init', 'ecofood_custom_post_type', 0); // add custom post type
add_action('init', 'ecofood_add_custom_taxonomy', 0); // add custom taxonomy


/*
* Creating a function to create our CPT and its taxonomy
*/

// define translation domain name variable
$domain = 'ecofood';

function ecofood_custom_post_type()
{
    $domain_name = $GLOBALS['domain'];
    $custom_post_type_items = [
        [
            'name'          => 'Custom Post Type',
            'singular_name' => 'Custom Post Type',
            'plural_name'   => 'Custom Post Types',
            'slug'          => 'custom-post-1',
            'description'   => '',
            'dash_icon'     => 'dashicons-universal-access',
            'supports'      => ['title', 'excerpt', 'thumbnail'],
        ]
    ];

    foreach ($custom_post_type_items as $cpt_item) {
        // Set options for Custom Post Type
        $cpt_args = array(
            'label'               => sprintf(__('%s', $domain_name), $cpt_item['plural_name']),
            'description'         => sprintf(__('%s', $domain_name), $cpt_item['description']),
            'labels'              => array(
                'name'                => sprintf(__('%s', $domain_name), $cpt_item['name']),
                'singular_name'       => sprintf(__('%s', $domain_name), $cpt_item['singular_name']),
                'menu_name'           => sprintf(__('%s', $domain_name), $cpt_item['plural_name']),
                'parent_item_colon'   => sprintf(__('Parent %s', $domain_name), $cpt_item['singular_name']),
                'all_items'           => sprintf(__('All %s', $domain_name), $cpt_item['plural_name']),
                'view_item'           => sprintf(__('View %s', $domain_name), $cpt_item['singular_name']),
                'add_new_item'        => sprintf(__('Add %s', $domain_name), $cpt_item['singular_name']),
                'add_new'             => __('Add New', $domain_name),
                'edit_item'           => sprintf(__('Edit %s', $domain_name), $cpt_item['singular_name']),
                'update_item'         => sprintf(__('Update %s', $domain_name), $cpt_item['singular_name']),
                'search_items'        => sprintf(__('Search %s', $domain_name), $cpt_item['singular_name']),
                'not_found'           => __('Not Found', $domain_name),
                'not_found_in_trash'  => __('Not found in Trash', $domain_name),
            ),

            'hierarchical'          => true,
            'public'                => true,
            'show_ui'               => true,
            'show_in_menu'          => true,
            'menu_position'         => 10,
            'menu_icon'             => sprintf(__('%s', $domain_name), $cpt_item['dash_icon']),
            'show_in_nav_menus'     => true,
            'publicly_queryable'    => true,
            'exclude_from_search'   => false,
            'has_archive'           => false, // does it need an arhive?
            'query_var'             => true,
            'can_export'            => true,
            'rewrite'               => array(
                'slug' => sprintf(__('%s', $domain_name), $cpt_item['slug']),
                'with_front' => FALSE
            ),
            'capability_type'       => 'post',
            'supports'              => $cpt_item['supports'],
            'show_in_rest'          => true,

        );

        // Register Custom Post Type with abouve arguments
        register_post_type(sprintf(__('%s', $domain_name), $cpt_item['slug']), $cpt_args);
        flush_rewrite_rules();
    }
}


/**
 *
 * Add Custom taxonoy to products
 *
 */
function ecofood_add_custom_taxonomy()
{
    $domain_name = $GLOBALS['domain'];
    // Assign the Business Category [custom taxonomy] to Post, Video and Podcast
    $custom_taxonomy = [
        [
            'name'          => 'Custom Taxonmy 1',
            'singular_name' => 'Custom Taxonmy 1',
            'plural_name'   => 'Custom Taxonmy 1',
            'slug'          => 'custom-taxonomy-1'
        ],
        [
            'name'          => 'Custom Taxonomy 2',
            'singular_name' => 'Custom Taxonomy 2',
            'plural_name'   => 'Custom Taxonomy 2',
            'slug'          => 'custom-taxonomy-2'
        ],
    ];
    //set the post types for the taxonomy
    $post_to_assign = ['custom-post-1'];

    foreach ($custom_taxonomy as $ctax) {
        $tax_args = array(
            'hierarchical'      => true,
            'labels'            => array(
                'name'              => sprintf(__('%s', $domain_name), $ctax['plural_name']),
                'singular_name'     => sprintf(__('%s', $domain_name), $ctax['singular_name']),
                'search_items'      =>  sprintf(__('Search %s', $domain_name), $ctax['singular_name']),
                'all_items'         => sprintf(__('All %s', $domain_name), $ctax['plural_name']),
                'parent_item'       => sprintf(__('Parent %s', $domain_name), $ctax['singular_name']),
                'parent_item_colon' => sprintf(__('Parent %s', $domain_name), $ctax['singular_name']),
                'edit_item'         => sprintf(__('Edit  %s', $domain_name), $ctax['singular_name']),
                'update_item'       => sprintf(__('Update  %s', $domain_name), $ctax['singular_name']),
                'add_new_item'      => sprintf(__('Add New  %s', $domain_name), $ctax['singular_name']),
                'new_item_name'     => sprintf(__('New %s', $domain_name), $ctax['singular_name']),
                'menu_name'         => sprintf(__('%s', $domain_name), $ctax['plural_name']),
            ),
            'show_ui'           => true,
            'show_in_rest'      => true,
            'show_admin_column' => true,
            'query_var'         => true,
            'rewrite'           => array('slug' => $ctax['slug']),
        );

        //call the register_taxonomy function
        register_taxonomy($ctax['slug'], $post_to_assign, $tax_args);
    }
}

//DATA VIEWS

function track_post_views($post_id) {
    if (!is_single()) return;

    if (empty($post_id)) {
        global $post;
        $post_id = $post->ID;
    }

    $views = get_post_meta($post_id, 'views', true);
    if (empty($views)) {
        $views = 0;
    }
    $views++;

    update_post_meta($post_id, 'views', $views);
}

add_action('wp_head', 'track_post_views');

// Data Views Widget

class Trending_Posts_Widget extends WP_Widget {

    public function __construct() {
        $widget_options = array(
            'classname' => 'trending_posts_widget',
            'description' => 'Displays trending posts by view count',
        );
        parent::__construct('trending_posts_widget', 'Trending Posts', $widget_options);
    }

    public function widget($args, $instance) {
        $title = apply_filters('widget_title', $instance['title']);
        $number_of_posts = !empty($instance['number_of_posts']) ? $instance['number_of_posts'] : 5;

        echo $args['before_widget'];
        if (!empty($title)) echo $args['before_title'] . $title . $args['after_title'];

        $query_args = array(
            'post_type' => 'post',
            'posts_per_page' => $number_of_posts,
            'meta_key' => 'views',
            'orderby' => 'meta_value_num',
            'order' => 'DESC',
        );
        $query = new WP_Query($query_args);

        if ($query->have_posts()) {
            echo '<ol class="trending">';
            while ($query->have_posts()) {
                $query->the_post();
                echo '<li><a href="' . get_permalink() . '">' . get_the_title() . '</a></li>';
            }
            echo '</ol>';
        }

        echo $args['after_widget'];
    }

    public function form($instance) {
        // Form for the widget options in the admin area
        $title = !empty($instance['title']) ? $instance['title'] : 'Trending Posts';
        $number_of_posts = !empty($instance['number_of_posts']) ? $instance['number_of_posts'] : 5;
        ?>
        <p>
        <label for="<?php echo $this->get_field_id('title'); ?>">Title:</label>
        <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
        </p>
        <p>
        <label for="<?php echo $this->get_field_id('number_of_posts'); ?>">Number of posts:</label>
        <input class="widefat" id="<?php echo $this->get_field_id('number_of_posts'); ?>" name="<?php echo $this->get_field_name('number_of_posts'); ?>" type="number" value="<?php echo esc_attr($number_of_posts); ?>" />
        </p>
        <?php
    }

    public function update($new_instance, $old_instance) {
        $instance = array();
        $instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : '';
        $instance['number_of_posts'] = (!empty($new_instance['number_of_posts'])) ? strip_tags($new_instance['number_of_posts']) : '';

        return $instance;
    }
}

function register_trending_posts_widget() {
    register_widget('Trending_Posts_Widget');
}

add_action('widgets_init', 'register_trending_posts_widget');

// The Exerpt Length Custom

function mytheme_custom_excerpt_length( $length ) {
	return 20;
	}
	add_filter( 'excerpt_length', 'mytheme_custom_excerpt_length', 10 );



