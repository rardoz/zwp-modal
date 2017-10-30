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
<table class="widefat">
  <? include('zwp-modal-autocomplete.php') ?>
</table>
<br />
<form  autocomplete="off" id="<?= $this->plugin_name ?>-pages-form" method="post" name="zwp_modal_options" action="options.php">
  <?php foreach($this->pages as $this->current_page): ?>
    <? include('zwp-modal-settings.php') ?>
  <?php endforeach ?>

  <?php settings_fields($this->plugin_name); ?>
  <?php submit_button('Save all changes', 'primary','submit', TRUE); ?>
</form>