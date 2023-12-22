<?php

/**
 * Class MetaBox_ExampleVideoUrl
 *
 * A specific implementation of a meta box for handling video URLs in WordPress posts.
 */
class MetaBox_ExampleVideoUrl extends BaseMetaBox
{
    /**
     * Constructor for the class.
     *
     * Sets up the meta box properties and calls the parent constructor.
     */
    public function __construct()
    {
        $this->ID = 'video_url_meta_box';
        $this->title = 'لینک ویدیو';
        $this->screen = ['post'];
        parent::__construct();
    }

    /**
     * Method to define the layout of the meta box content.
     *
     * @param WP_Post $post The WordPress post object.
     */
    public function layout(WP_Post $post)
    {
        // TODO: Implement layout() method.

        // Add a nonce field to check for verification on form submission
        wp_nonce_field('video_url_nonce_action', 'video_url_nonce');

        // Retrieve the current value of the video URL from post meta
        $video_url = get_post_meta($post->ID, '_oop_video_url', true);
        ?>
        <!-- HTML markup for the video URL input field -->
        <label for="video_url" class="form-label">لینک ویدیو</label>
        <input class="form-control" type="text" id="video_url" name="video_url" value="<?php echo esc_attr($video_url); ?>"
               placeholder="لینک ویدیو را وارد نمایید">
        <?php
    }

    /**
     * Method to save the meta box data when the post is saved.
     *
     * @param int $post_id The ID of the post being saved.
     */
    public function save(int $post_id)
    {
        // TODO: Implement save() method.

        // Name of the nonce field
        $nonce_name = $_POST['video_url_nonce'] ?? '';
        $nonce_action = 'video_url_nonce_action';

        // Check if the nonce is set and valid
        if (!isset($nonce_name) || !wp_verify_nonce($nonce_name, $nonce_action)) {
            return;
        }

        // Check if the current user has permissions to save data for the specified screen
        foreach ($this->screen as $item) {
            if (!current_user_can('edit_' . $item, $post_id)) {
                return;
            }
        }

        // Check if this is an AutoSave, as form submission may not have occurred
        if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
            return;
        }

        // Data is safe to save now, sanitize the video URL and update post meta
        $video_url = sanitize_text_field($_POST['video_url']);
        update_post_meta($post_id, '_oop_video_url', $video_url);
    }
}
