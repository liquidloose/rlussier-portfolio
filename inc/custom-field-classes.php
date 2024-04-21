<?php

class GitHub_Meta_Box {

    private $box_name;

    public function __construct($box_name) {
        $this->box_name = $box_name;
        $this->add_actions();
    }

    private function add_actions() {
        add_action('add_meta_boxes', [$this, 'add']);
        add_action('save_post', [$this, 'save']);
    }

    public function add() {
        $screens = ['post'];
        foreach ($screens as $screen) {
            add_meta_box(
                sanitize_title($this->box_name), // Unique ID
                $this->box_name,                 // Box title
                [$this, 'html'],                 // Content callback, must be of type callable
                $screen                          // Post type
            );
        }
    }

    public function save($post_id) {
        if (array_key_exists(sanitize_title($this->box_name), $_POST)) {
            update_post_meta(
                $post_id,
                sanitize_title($this->box_name),
                sanitize_text_field($_POST[sanitize_title($this->box_name)])
            );
        }
    }

    public function html($post) {
        $value = get_post_meta($post->ID, sanitize_title($this->box_name), true);
?>
        <label for="<?php echo sanitize_title($this->box_name); ?>"><?php echo esc_html($this->box_name); ?>:</label>
        <input type="text" id="<?php echo sanitize_title($this->box_name); ?>" name="<?php echo sanitize_title($this->box_name); ?>" required minlength="4" maxlength="50" size="50" value="<?php echo esc_attr($value); ?>" />
<?php
    }
}

// Instantiate the class with the name of the meta box
$github = new GitHub_Meta_Box('GitHub Link');
