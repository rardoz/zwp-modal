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
  $options = get_option($this->plugin_name);
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->
<h2><?php esc_attr_e( 'ZWP Modal Settings', 'WpAdminStyle' ); ?></h2>
<form method="post" name="zwp_modal_options" action="options.php">
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
            <option <?php if($options[$page->ID] == $post->ID) { echo 'selected'; }?> value="<?= $post->ID ?>">
              <?= $post->post_title ?>
            </option>
        <?php endforeach?>
      </select>
    </fieldset>
    <hr />
  <?php endforeach ?>

  <?php settings_fields($this->plugin_name); ?>
  <?php submit_button('Save all changes', 'primary','submit', TRUE); ?>
</form>