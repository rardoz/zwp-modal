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
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->
<h2><?php esc_attr_e( 'ZWP Modal Settings', 'WpAdminStyle' ); ?></h2>
<form method="post" name="zwp_modal_options" action="options.php">
  <?php foreach($this->pages as $this->current_page): ?>
    <?php
      $options = $this->options[$this->current_page->ID] ?: [];
    ?>
    <fieldset>
      <label for="<?= $this->plugin_name ?>-<?= $this->current_page->ID ?>-select">
        <a href="<?= get_page_link( $this->current_page->ID ) ?>" target="_blank"><?= $this->current_page->post_title ?></a>
      </label>
      <br />
      <select
        id="<?= $this->plugin_name ?>-<?= $this->current_page->ID ?>-select"
        name="<?= $this->plugin_name ?>[pages][<?= $this->current_page->ID ?>][post_id]"
      >
        <option value="">Select post</option>
        <?php foreach($this->posts as $post): ?>
            <option <?php if($options['post_id'] == $post->ID) { echo 'selected'; }?> value="<?= $post->ID ?>">
              <?= $post->post_title ?>
            </option>
        <?php endforeach?>
      </select>
    </fieldset>
    
    <? include('zwp-modal-settings.php') ?>
    <hr />
  <?php endforeach ?>

  <?php settings_fields($this->plugin_name); ?>
  <?php submit_button('Save all changes', 'primary','submit', TRUE); ?>
</form>