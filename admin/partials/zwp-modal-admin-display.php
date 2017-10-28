<?php
  /**
   * Provide a admin area view for the plugin
   *
   * This file is used to markup the admin-facing aspects of the plugin.
   *
   * @link       http://zardozcs.com
   * @since      1.0.0
   *
   * @package    Zwp_Modal
   * @subpackage Zwp_Modal/admin/partials
   */
  $pages = get_pages(); 
  $posts = get_posts( ['posts_per_page' => 1000]); 
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->
<h2><?php esc_attr_e( 'ZWP Modal Settings', 'WpAdminStyle' ); ?></h2>

<!-- select a post to render in the modal

for each page
render out it as an uneditable text field with the page id
and then each page will have the option to select a post from the dropdown
then we will save each key value pair in the db
ie pageID => postID.

 -->


 <form method="post" name="cleanup_options" action="options.php">
    <?php foreach($pages as $page): ?>
      <fieldset>
        <legend class="screen-reader-text"><span>Clean WordPress head section</span></legend>
        <label for="<?= $this->plugin_name ?>-<?= $page->ID ?>">
          <a href="<?= get_page_link( $page->ID ) ?>" target="_blank"><?= $page->post_title ?></a>
        </label>
        <br />
        <select
          id="<?= $this->plugin_name ?>-<?= $page->ID ?>"
          name="<?= $this->plugin_name ?>[pages][<?= $page->ID ?>]"
        >
          <option value="">Select post</option>
          <?php foreach($posts as $post): ?>
              <option value="<?= $post->ID ?>">
                <?= $post->post_title ?>
              </option>
          <?php endforeach?>
        </select>
      </fieldset>
      <hr />
    <?php endforeach ?>

    <?php submit_button('Save all changes', 'primary','submit', TRUE); ?>
</form>
