<?php

/**
 * Provide a public-facing view for the plugin
 *
 * This file is used to markup the public-facing aspects of the plugin.
 *
 * @link       http://zardozcs.com
 * @since      1.0.0
 *
 * @package    Zwp_Modal
 * @subpackage Zwp_Modal/public/partials
 */
  $options = $this->zwp_modal_options ?: [];
  $page_object = get_queried_object();
  $page_id     = get_queried_object_id();
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->

<?php if($options[$page_id]): ?>
  <?php $post = get_post( $options[$page_id] ); ?>
  <div id="<?= $this->plugin_name ?>" style="display: none" class="<?= $this->plugin_name ?>">
    <div class="<?= $this->plugin_name ?>-container">
      <div class="<?= $this->plugin_name ?>-content">
        <? include('zwp-modal-close-button.php') ?>
        <h2 class="entry-title">
          <?= $post->post_title ?>
        </h2>
        <div class="post-content">
          <?= $post->post_content ?>
        </div>
      </div>
    </div>
  </div>
<?php endif ?>