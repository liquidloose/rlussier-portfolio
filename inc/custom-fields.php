<?php

class GitHub_Meta_Box {

    /**
     * Set up and add the meta box.
     */
    public static function add() {
        $screens = ['post'];
        foreach ($screens as $screen) {
            add_meta_box(
                'github_link',           // Unique ID
                'GitHub Link',           // Box title
                [self::class, 'html'],   // Content callback, must be of type callable
                $screen                  // Post type
            );
        }
    }

    /**
     * Save the meta box data.
     *
     * @param int $post_id The post ID.
     */
    public static function save($post_id) {
        if (array_key_exists('github_link', $_POST)) {
            update_post_meta(
                $post_id,
                'github_link',
                sanitize_text_field($_POST['github_link'])
            );
        }
    }

    /**
     * Display the meta box HTML.
     *
     * @param WP_Post $post Post object.
     */
    public static function html($post) {
        $value = get_post_meta($post->ID, 'github_link', true);
?>
        <label for="github-link">GitHub Link:</label>
        <input type="text" id="github-link" name="github_link" required minlength="4" maxlength="50" size="50" value="<?php echo esc_attr($value); ?>" />
<?php
    }
}

// Add meta box
add_action('add_meta_boxes', ['GitHub_Meta_Box', 'add']);

// Save meta box data
add_action('save_post', ['GitHub_Meta_Box', 'save']);
